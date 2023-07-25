<?php

namespace App\Services\Transactions\Withdrawn;

use App\Admin\Traits\Setup;
use App\Admin\Traits\Upload;
use Illuminate\Http\Request;
use App\Enums\Transaction\TransactionType;
use App\Enums\Transaction\TransactionStatus;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Setting\SettingRepositoryInterface;
use App\Repositories\Transactions\TransactionRepositoryInterface;
use App\Services\Transactions\Withdrawn\WithdrawnServiceInterface;
use App\Repositories\Transactions\Withdrawn\WithdrawnRepositoryInterface;

class WithdrawnService implements WithdrawnServiceInterface
{
    use Setup;
    use Upload;
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;

    protected $repository;

    protected $userRepository;

    protected $settingRepository;

    protected $transactionRepository;

    public function __construct(WithdrawnRepositoryInterface $repository, UserRepositoryInterface $userRepository, SettingRepositoryInterface $settingRepository, TransactionRepositoryInterface $transactionRepository)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->settingRepository = $settingRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function store(Request $request)
    {
        $this->data = $request->validated();
        $user = $this->userRepository->find($this->data['user_id'])->load('wallet');
        if ($user->wallet->amount < $this->data['amount']) {
            return false;
        } else {
            $user->wallet->amount -= $this->data['amount'];
            $user->wallet->update();
            $this->data['fee'] = $this->settingRepository->getValueByKey('transaction_withdrawn_fee');
            $instance = $this->repository->create($this->data);
            $transaction = [
                'user_id' => $instance->user_id,
                'type_id' => $instance->id,
                'type' => TransactionType::Withdrawn->value,
                'amount' => $instance->amount,
                'fee' =>  $this->data['fee'],
                'status' => TransactionStatus::Approved->value,
                'detail' => json_encode($instance),
            ];
            $this->transactionRepository->create($transaction);
            return true;
        }
        return false;
    }

    public function update(Request $request)
    {

        $this->data = $request->validated();
        if ($request->has('license')) {
            $this->data['license'] = $this->upload($request, 'transaction/withdrawn/', 'license');
        }
        return $this->repository->update($this->data['id'], $this->data);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
