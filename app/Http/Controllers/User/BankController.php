<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\Bank\BankServiceInterface;
use App\Repositories\Bank\BankRepositoryInterface;
use App\Http\Request\Bank\BankRequest;
use App\Repositories\User\UserRepositoryInterface;

class BankController extends Controller
{
    protected $repositoryUser;

    public function __construct(
        UserRepositoryInterface $repositoryUser,
        BankRepositoryInterface $repository,
        BankServiceInterface $service
    ) {
        parent::__construct();

        $this->repositoryUser = $repositoryUser;

        $this->repository = $repository;

        $this->service = $service;
    }

    public function getView()
    {
        return [
            'index' => 'user.bank.index',
            'createStore' => 'user.info.createStore',
        ];
    }

    public function index()
    {
        return view($this->view['index'], [
            'user' => $this->repositoryUser->findOrFail(auth()->user()->id)->load('bankAccount'),
        ]);
    }

    public function create(BankRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('user.bank.index')->with('success', __('Thêm tài khoản thành công'));
    }

    public function delete($id)
    {
        $this->service->delete($id);
        return redirect()->route('user.bank.index')->with('success', __('Xóa tài khoản thành công'));
    }
}
