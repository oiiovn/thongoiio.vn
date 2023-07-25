<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Services\User\UserServiceInterface;
use App\Repositories\User\UserRepositoryInterface;

class ContactController extends Controller
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
            'index' => 'user.contact.index',
        ];
    }

    public function index()
    {
        return view($this->view['index'], [
            'user' => $this->repository->findOrFail(auth()->user()->id)->load('contact')->contact,
        ]);
    }

    public function update(Request $request) {
        $this->service->updateContact($request);
        return redirect()->route('user.index')->with('success', __('Cập nhật thông tin liên hệ thành công'));
    }
}
