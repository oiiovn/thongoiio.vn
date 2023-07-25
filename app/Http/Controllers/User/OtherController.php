<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Enums\User\{UserGender, UserVip};
use App\Services\Reviews\ReviewsServiceInterface;
use App\Repositories\Reviews\ReviewsRepositoryInterface;
use App\Http\Request\Review\ReviewRequest;

class OtherController extends Controller
{
    public function __construct(
        ReviewsRepositoryInterface $repository,
        ReviewsServiceInterface $service
    ) {
        parent::__construct();

        $this->repository = $repository;

        $this->service = $service;
    }

    public function getView()
    {
        return [
            'userDetail' => 'user.other.user-detail',
            'userSearch' => 'user.other.user-search',
            'shopDetail' => 'user.other.shop-detail',
            'shopSearch' => 'user.other.shop-search',
        ];
    }

    public function userDetail($slug)
    {
        $users = null;
        if (auth()->check()) {
            $users = $this->repository->getUniqueIdsAndData();
        }
        return view($this->view['userDetail'], [
            'user' => User::where('slug', $slug)->with('contact', 'bankAccount', 'reviews')->first(),
            'gender' => UserGender::asSelectArray(),
            'vip' => UserVip::asSelectArray(),
            'users' => $users
        ]);
    }

    public function userSearch()
    {
        return view($this->view['userSearch']);
    }

    public function userResult(Request $request)
    {
        if ($request->ajax()) {
            $user = User::where('fullname', 'LIKE', '%' . $request->search . '%')->get();
            return response()->json(['user' => $user]);
        }
    }
    
    public function shopDetail($slug)
    {
        $users = null;
        if (auth()->check()) {
            $users = $this->repository->getUniqueIdsAndDataShop();
        }
        return view($this->view['shopDetail'], [
            'user' => User::where('slug', $slug)->first(),
            'gender' => UserGender::asSelectArray(),
            'vip' => UserVip::asSelectArray(),
            'users' => $users
        ]);
    }

    public function shopSearch()
    {
        return view($this->view['shopSearch']);
    }

    public function shopResult(Request $request)
    {
        if ($request->ajax()) {
            $user = User::where('name_shop', 'LIKE', '%' . $request->search . '%')->get();
            return response()->json(['user' => $user]);
        }
    }
}
