<?php

namespace App\Services\Transactions\Deposit;

use App\Admin\Traits\Setup;
use Illuminate\Http\Request;
use App\Enums\Transaction\TransactionType;
use App\Enums\Transaction\TransactionStatus;
use App\Traits\Transactions\Deposit\Payment;
use App\Repositories\Wallet\WalletRepositoryInterface;
use App\Repositories\Setting\SettingRepositoryInterface;
use App\Services\Transactions\Deposit\DepositServiceInterface;
use App\Repositories\Transactions\TransactionRepositoryInterface;
use App\Repositories\Transactions\Deposit\DepositRepositoryInterface;

class DepositService implements DepositServiceInterface
{
    use Setup;
    use Payment;

    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;

    protected $repository;

    protected $walletRepository;

    protected $settingRepository;

    protected $transactionRepository;

    public function __construct(DepositRepositoryInterface $repository, WalletRepositoryInterface $walletRepository, SettingRepositoryInterface $settingRepository, TransactionRepositoryInterface $transactionRepository)
    {
        $this->repository = $repository;
        $this->walletRepository = $walletRepository;
        $this->settingRepository = $settingRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function store($request)
    {
        $this->data = $request->validated();
        $this->data['fee'] = $this->data['amount'] * $this->settingRepository->getValueByKey('transaction_deposit_fee') / 100;
        $instance =  $this->repository->create($this->data);
        $this->createPayment($instance);
    }
    public function storeWithoutPayment($request)
    {
        $this->data = $request->validated();
        $this->data['fee'] = $this->data['amount'] * $this->settingRepository->getValueByKey('transaction_deposit_fee') / 100;
        $this->data['code_vnpay'] = 'OIIO nạp';
        $this->data['bank_code'] = 'OIIO';
        $this->data['bank'] = 'OIIO';
        $this->data['status'] = 1;
        $instance =  $this->repository->create($this->data);
        $user = $instance->user()->with('wallet')->first();
        $user->wallet->amount += $instance->amount - $instance->fee;
        $wallet = $user->wallet->toArray();
        $this->walletRepository->update($wallet['id'], $wallet);
        $transaction = [
            'user_id' => $instance->user_id,
            'type_id' => $instance->id,
            'type' => TransactionType::Deposit->value,
            'amount' => $instance->amount,
            'fee' => $instance->amount * $instance->fee / 100,
            'status' => TransactionStatus::Approved->value,
            'detail' => json_encode($instance),
        ];
        $this->transactionRepository->create($transaction);
        return $instance;
    }

    public function ipnUrl($request){
        $result = $this->IPN($request->all());
        return $result;
    }

    public function result($request)
    {   
        $this->data = $request->all();
        $obj = $this->repository->findbyCode($this->data['vnp_TxnRef'])->load('user');
        $result = $this->processResult($this->data);
        if ($result['status'] == 1 && $obj->status->value == 1) {
           
            $transaction = [
                'user_id' => $obj->user_id,
                'type_id' => $obj->id,
                'type' => TransactionType::Deposit->value,
                'amount' => $obj->amount,
                'fee' => $obj->amount * $obj->fee / 100,
                'status' => TransactionStatus::Approved->value,
                'detail' => json_encode($obj),
            ];
            $this->transactionRepository->create($transaction);
        }
        return $this->repository->update($obj->id, $result);
    }

    public function update(Request $request)
    {

        $this->data = $request->validated();

        return $this->repository->update($this->data['id'], $this->data);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
