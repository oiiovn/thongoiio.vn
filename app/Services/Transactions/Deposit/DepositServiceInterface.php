<?php

namespace App\Services\Transactions\Deposit;

use Illuminate\Http\Request;

interface DepositServiceInterface
{
    /**
     * Tạo mới
     * 
     * @var Illuminate\Http\Request $request
     * 
     * @return mixed
     */
    public function store(Request $request);
    /**
     * Cập nhật
     * 
     * @var Illuminate\Http\Request $request
     * 
     * @return boolean
     */
    public function update(Request $request);
    /**
     * Xóa
     *  
     * @param int $id
     * 
     * @return boolean
     */
    public function delete($id);

    /** 
     * Create deposit without payment
     */
    public function storeWithoutPayment(Request $request);
      /** 
     * Call IPN URL
     */
    public function ipnUrl(Request $request);
    
}
