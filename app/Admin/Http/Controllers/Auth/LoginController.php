<?php

namespace App\Admin\Http\Controllers\Auth;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Auth\LoginRequest;
use App\Repositories\Setting\SettingRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    private $login;
    public $repositorySetting;
    public function __construct(SettingRepositoryInterface $repositorySetting)
    {
        parent::__construct();
        $this->repositorySetting = $repositorySetting;
    }

    public function getView(){
        return [
            'index' => 'admin.auth.login'
        ];
    }

    public function index(){
        $logo = $this->repositorySetting->getValueByKey('site_logo');
        return view($this->view['index'], compact('logo'));
    }

    public function login(LoginRequest $request){

        $this->login = $request->validated();
        
        if($this->resolve()){

            $request->session()->regenerate();
            
            return redirect()->intended(route('admin.dashboard'))->with('success', __('Đăng nhập thành công'));

        }
        return back()->with('error', __('Tên đăng nhập hoặc mật khẩu không đúng'));
    }

    protected function resolve(){

        return Auth::guard('admin')->attempt($this->login, true) ? true : false;

    }
}
