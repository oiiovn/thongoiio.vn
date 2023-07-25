<?php

namespace App\Http\Controllers\Transactions\Withdrawn;

use App\Http\Controllers\Controller;
use App\Http\Request\Transactions\Withdrawn\WithdrawnRequest;
use App\Repositories\Transactions\Withdrawn\WithdrawnRepositoryInterface;
use App\Services\Transactions\Withdrawn\WithdrawnServiceInterface;

class WithdrawnController extends Controller
{
    public function __construct(
        WithdrawnRepositoryInterface $repository,
        WithdrawnServiceInterface $service
    ) {
        parent::__construct();

        $this->repository = $repository;

        $this->service = $service;
    }

    public function getView()
    {
        return [
            'create' => 'user.transactions.withdrawn.create',
        ];
    }

    public function create()
    {
        return view($this->view['create'], [
            'user' => auth()->user()->load('bankAccount', 'wallet'),
        ]);
    }

    public function store(WithdrawnRequest $request){
        $result = $this->service->store($request);
        if($result){
            return back()->with('success', __('Tạo lệnh rút thành công'));
        }else{
            return back()->with('error', __('Số dư không đủ '));
        }
    }



}
