<?php

namespace App\Admin\Http\Controllers\Transaction\Deposit;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\User\UserRequest;
use App\Admin\Repositories\User\UserRepositoryInterface;
use App\Admin\DataTables\Transaction\Deposit\DepositDataTable;
use App\Services\Transactions\Deposit\DepositServiceInterface;
use App\Admin\Http\Requests\Transaction\Deposit\DepositRequest;
use App\Admin\DataTables\Transaction\Withdrawn\WithdrawnDataTable;
use App\Repositories\Transactions\Deposit\DepositRepositoryInterface;

class DepositController extends Controller
{
    protected $userRepository;
    public function __construct(
        DepositRepositoryInterface $repository,
        DepositServiceInterface $service,
        UserRepositoryInterface $userRepository
    ) {

        parent::__construct();

        $this->repository = $repository;

        $this->service = $service;

        $this->userRepository = $userRepository;
    }

    public function getView()
    {
        return [
            'index' => 'admin.transaction.deposit.index',
            'show' => 'admin.transaction.deposit.show',
            'create' => 'admin.transaction.deposit.create'
        ];
    }

    public function getRoute()
    {
        return [
            'index' => 'admin.transaction.deposit.index',
            'show' => 'admin.transaction.deposit.show',
        ];
    }
    public function index(DepositDataTable $dataTable)
    {
        return $dataTable->render($this->view['index'], []);
    }

    public function show($id)
    {
        $instance = $this->repository->find($id, ['user']);
        return view(
            $this->view['show'],
            [
                'deposit' => $instance,
            ],
        );
    }

    public function create()
    {
        $instance = $this->userRepository->getQueryBuilder()->get();
        return view(
            $this->view['create'],
            [
                'users' => $instance,
            ],
        );
    }

    public function store(DepositRequest $request){
        $instance = $this->service->storeWithoutPayment($request);
        return redirect()->route($this->route['show'],$instance->id)->with('success', __('notifySuccess'));
    }
}
