<?php

namespace App\Http\Controllers\Wallet;

use App\Http\Controllers\Controller;
use App\Repositories\Wallet\WalletRepositoryInterface;
use App\Services\Wallet\WalletServiceInterface;

class WalletController extends Controller
{
    public function __construct(
        WalletRepositoryInterface $repository,
        WalletServiceInterface $service
    ) {
        parent::__construct();

        $this->repository = $repository;

        $this->service = $service;
    }

    public function getView()
    {
        return [
            'show' => 'user.wallet.show',
        ];
    }


    public function show()
    {
        $user = auth()->user();
        $user = $user->load('wallet');
        return view($this->view['show'], [
            'user' => $user,
        ]);
    }

 
}
