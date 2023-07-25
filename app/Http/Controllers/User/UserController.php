<?php

namespace App\Http\Controllers\User;

use App\Enums\User\{UserGender};
use App\Http\Controllers\Controller;
use App\Http\Request\Auth\PasswordRequest;
use App\Http\Request\Auth\UserRequest;
use App\Models\Province;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\User\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(
        UserRepositoryInterface $repository,
        UserServiceInterface    $service,
    )
    {
        parent::__construct();

        $this->repository = $repository;

        $this->service = $service;

    }

    public function getView()
    {
        return [
            'index' => 'user.info.index',
            'create-shop' => 'user.info.create-shop',
            'edit-shop' => 'user.info.edit-shop',
        ];
    }

    public function index()
    {
        return view($this->view['index'], [
            'user' => $this->repository->findOrFail(auth()->user()->id)->load('contact', 'province', 'ward', 'district'),
            'gender' => UserGender::asSelectArray(),
            'province' => Province::all(),
        ]);
    }

    public function createShop()
    {
        if (auth()->user()->name_shop == null) {
            return view($this->view['create-shop']);
        }
        return redirect()->route('user.index')->with('error', __('Bạn đã sỡ hữu cửa hàng rồi'));
    }

    public function addShop() {
        return view('user.info.test');
    }

    public function postStore(Request $request)
    {
        $this->service->shop($request);
        return redirect()->route('user.index')->with('success', __('Gửi yêu cầu đăng ký cửa hàng thành công!'));
    }

    public function editShop()
    {
        if (auth()->user()->name_shop != null) {
            return view($this->view['edit-shop']);
        }
        return redirect()->route('user.index')->with('error', __('Bạn đã đăng ký cửa hàng rồi'));
    }

    public function updateStore(Request $request)
    {
        $this->service->shop($request);
        return redirect()->route('user.edit_shop')->with('success', __('Thay đổi thông tin cửa hàng thành công!'));
    }

    public function updateInfo(UserRequest $request)
    {
        $this->service->update($request);
        return redirect()->route('user.index')->with('success', __('Cập nhật thành công'));
    }

    public function password(PasswordRequest $request)
    {
        $this->service->update($request);
        return redirect()->route('user.index')->with('success', __('Đổi mật khẩu thành công'));
    }
}
