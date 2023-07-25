<?php

namespace App\Traits\Transactions\Deposit;

use App\Models\Deposit;

trait Payment
{
  public function createPayment($data)
  {
    $vnp_TxnRef = $data['code']; //Mã giao dịch thanh toán tham chiếu của merchant
    $vnp_Amount = $data['amount']; // Số tiền thanh toán
    $vnp_Locale = config('vnpay.vnp_Lang'); //Ngôn ngữ chuyển hướng thanh toán
    $vnp_HashSecret = config('vnpay.vnp_HashSecret');
    $vnp_BankCode = $data['bank_code']; //Mã phương thức thanh toán
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán
    $inputData = array(
      "vnp_Version" => "2.1.0",
      "vnp_TmnCode" => config('vnpay.vnp_TmnCode'),
      "vnp_Amount" => $vnp_Amount * 100,
      "vnp_Command" => "pay",
      "vnp_CreateDate" => date('YmdHis'),
      "vnp_CurrCode" => "VND",
      "vnp_IpAddr" => $vnp_IpAddr,
      "vnp_Locale" => $vnp_Locale,
      "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
      "vnp_OrderType" => "other",
      "vnp_ReturnUrl" => route(config('vnpay.vnp_Returnurl')),
      "vnp_TxnRef" => $vnp_TxnRef,
      "vnp_ExpireDate" => date('YmdHis', strtotime('+15 minutes', strtotime(now())))
    );
    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
      $inputData['vnp_BankCode'] = $vnp_BankCode;
    }

    ksort($inputData);

    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
      if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
      } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
      }
      $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = config('vnpay.vnp_Url') . "?" . $query;
    if (isset($vnp_HashSecret)) {
      $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
      $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }

    // dd($vnp_Url);
    header('Location: ' . $vnp_Url);
    die();
  }

  public function IPN($data)
  {
    $inputData = array();
    $returnData = array();
    $vnp_HashSecret = config('vnpay.vnp_HashSecret');

    foreach ($data as $key => $value) {
      if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
      }
    }

    $vnp_SecureHash = $inputData['vnp_SecureHash'];
    unset($inputData['vnp_SecureHash']);
    ksort($inputData);
    $i = 0;
    $hashData = "";
    foreach ($inputData as $key => $value) {
      if ($i == 1) {
        $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
      } else {
        $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
        $i = 1;
      }
    }

    $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
    $vnpTranId = $inputData['vnp_TransactionNo']; //Mã giao dịch tại VNPAY
    $vnp_BankCode = $inputData['vnp_BankCode']; //Ngân hàng thanh toán
    $vnp_Amount = $inputData['vnp_Amount'] / 100; // Số tiền thanh toán VNPAY phản hồi

    $Status = 0; // Là trạng thái thanh toán của giao dịch chưa có IPN lưu tại hệ thống của merchant chiều khởi tạo 
    $orderId = $inputData['vnp_TxnRef'];

    try {
      //Check Orderid   
      //Kiểm tra checksum của dữ liệu

      if ($secureHash == $vnp_SecureHash) {
        //Lấy thông tin đơn hàng lưu trong Database và kiểm tra trạng thái của đơn hàng, mã đơn hàng là: $orderId            
        //Việc kiểm tra trạng thái của đơn hàng giúp hệ thống không xử lý trùng lặp, xử lý nhiều lần một giao dịch
        //Giả sử: $order = mysqli_fetch_assoc($result);   

        $order = Deposit::whereCode($orderId)->with('user')->first();
        if ($order != NULL) {
          if ($order->amount == $vnp_Amount) //Kiểm tra số tiền thanh toán của giao dịch: giả sử số tiền kiểm tra là đúng. //$order["Amount"] == $vnp_Amount
          {
            if ($order->status != NULL && $order->status->value == 0) {
              if ($inputData['vnp_ResponseCode'] == '00' || $inputData['vnp_TransactionStatus'] == '00') {
                $Status = 1; // Trạng thái thanh toán thành công
              } else {
                $Status = 2; // Trạng thái thanh toán thất bại / lỗi
              }
              $wallet = $order->user->wallet()->first();
              $wallet->amount += $order->amount - $order->fee;
              $data_wallet = $wallet->toArray();
              $wallet->update($data_wallet);
              $order->update(['status' => $Status]);    
                     
              $returnData['RspCode'] = '00';
              $returnData['Message'] = 'Confirm Success';
            } else {
              $returnData['RspCode'] = '02';
              $returnData['Message'] = 'Order already confirmed';
            }
          } else {
            $returnData['RspCode'] = '04';
            $returnData['Message'] = 'invalid amount';
          }
        } else {
          $returnData['RspCode'] = '01';
          $returnData['Message'] = 'Order not found';
        }
      } else {
        $returnData['RspCode'] = '97';
        $returnData['Message'] = 'Invalid signature';
      }
    } catch (Exception $e) {
      $returnData['RspCode'] = '99';
      $returnData['Message'] = 'Unknow error';
    }
    //Trả lại VNPAY theo định dạng JSON
    return $returnData;
  }
  public function processResult($data)
  {
    $vnp_SecureHash = $data['vnp_SecureHash'];
    $vnp_HashSecret = config('vnpay.vnp_HashSecret');
    $inputData = array();
    foreach ($data as $key => $value) {
      if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
      }
    }

    unset($inputData['vnp_SecureHash']);
    ksort($inputData);
    $i = 0;
    $hashData = "";
    foreach ($inputData as $key => $value) {
      if ($i == 1) {
        $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
      } else {
        $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
        $i = 1;
      }
    }
    $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

    $result = [
      'code_vnpay' => $data['vnp_TransactionNo'],
      'time' => $data['vnp_PayDate'],
      'bank' => $data['vnp_BankCode'],
      'status' => $secureHash == $vnp_SecureHash ? ($data['vnp_ResponseCode'] == '00' ? 1 : 2) : 3,
    ];
    return $result;
  }
}
