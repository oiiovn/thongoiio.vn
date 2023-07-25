<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Request\Auth\RegisterRequest;
use App\Services\User\UserServiceInterface;
use App\Repositories\User\UserRepositoryInterface;

class RegisterController extends Controller
{
    public function __construct(
        UserRepositoryInterface $repository,
        UserServiceInterface $service
    ) {
        parent::__construct();

        $this->repository = $repository;

        $this->service = $service;
    }

    public function getView()
    {
        return [
            'index' => 'auth.register',
            'login' => 'auth.login'
        ];
    }

    public function index()
    {
        return view($this->view['index']);
    }

    public function register(RegisterRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('login.index')->with('success', __('notifySuccess'));
    }
}
