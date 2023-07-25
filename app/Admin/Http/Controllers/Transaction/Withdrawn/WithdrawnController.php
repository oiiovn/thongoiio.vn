<?php

namespace App\Admin\Http\Controllers\Transaction\Withdrawn;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\User\UserRequest;
use App\Enums\Transaction\Withdrawn\WithdrawnStatus;
use App\Admin\DataTables\Transaction\Withdrawn\WithdrawnDataTable;
use App\Admin\Http\Requests\Transaction\Withdrawn\WithdrawnRequest;
use App\Repositories\Transactions\Withdrawn\WithdrawnRepositoryInterface;
use App\Services\Transactions\Withdrawn\WithdrawnServiceInterface;

class WithdrawnController extends Controller
{
    public function __construct(
        WithdrawnRepositoryInterface $repository, 
        WithdrawnServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;
        
        $this->service = $service;
        
    }

    public function getView(){
        return [
            'index' => 'admin.transaction.withdrawn.index',
            'edit' => 'admin.transaction.withdrawn.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.transaction.withdrawn.index',
            'edit' => 'admin.transaction.withdrawn.edit',
        ];
    }
    public function index(WithdrawnDataTable $dataTable){
        return $dataTable->render($this->view['index'], [
        ]);
    }

    public function create(){
        return view($this->view['create'], [
            'status' => WithdrawnStatus::asSelectArray(),
        ]);
    }

    public function edit($id){
        
        $instance = $this->repository->findbyIDwithRelation($id, ['user.bankAccount', 'bankAccount']);
        return view(
            $this->view['edit'], 
            [
                'withdrawn' => $instance, 
                'status' => WithdrawnStatus::asSelectArray(),
            ], 
        );

    }

    public function update(WithdrawnRequest $request){
        $this->service->update($request);
        return back()->with('success', __('notifySuccess'));

    }

   
}