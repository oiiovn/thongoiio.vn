<?php

namespace App\Http\Controllers\Transactions\Deposit;

use App\Models\User;
use App\Models\LogVnpay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Request\Transactions\Deposit\DepositRequest;
use App\Services\Transactions\Deposit\DepositServiceInterface;
use App\Repositories\Transactions\Deposit\DepositRepositoryInterface;

class DepositController extends Controller
{
    public function __construct(
        DepositRepositoryInterface $repository,
        DepositServiceInterface $service
    ) {
        parent::__construct();

        $this->repository = $repository;

        $this->service = $service;
    }

    public function getView()
    {
        return [
            'create' => 'user.transactions.deposit.create',
            'show' => 'user.transactions.deposit.show',
        ];
    }
    public function getRoute()
    {
        return [
            'show' => 'transaction.deposit.show',
        ];
    }

    public function create()
    {
        return view($this->view['create'], [
            'user' => auth()->user(),
        ]);
    }

    public function store(DepositRequest $request)
    {
        $this->service->store($request);
    }
    public function result(Request $request)
    {
        $intance = $this->service->result($request);
        return redirect()->route('transaction.deposit.show', ['code' => $intance->code]);
    }

    public function show(Request $request)
    {
        $intance = $this->repository->findbyCode($request->code)->load('user');
        return view($this->view['show'], [
            'data' => $intance,
        ]);
    }

    public function callIPNURL(Request $request)
    {
        $data = $this->service->ipnUrl($request);
        LogVnpay::whereId($request->log_id)->update(['data_ipn' => json_encode($request->all()), 'data_result' => $data]);
        return $data;
    }
    public function delete($id)
    {
    }
}
