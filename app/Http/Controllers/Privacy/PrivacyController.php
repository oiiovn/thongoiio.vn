<?php

namespace App\Http\Controllers\Privacy;

use App\Http\Controllers\Controller;
use App\Repositories\Privacy\PrivacyRepositoryInterface;
use App\Models\Privacy;

class PrivacyController extends Controller
{
    public function __construct(
        PrivacyRepositoryInterface $repository,
    ) {
        parent::__construct();

        $this->repository = $repository;

    }

    public function getView()
    {
        return [
            'index' => 'help.index',
            'sidebar' => 'privacy.layout.include.sidebar',
            'detail' => 'privacy.pages.detail',
        ];
    }

    public function index()
    {
        $listPrivacy = Privacy::orderBy('id', 'ASC')->get();
        return view($this->view['index'], ['listPrivacy' => $listPrivacy]);
    }

    public function detail($slug)
    {
        $listPrivacy = Privacy::orderBy('id', 'ASC')->get();
        $privacy = \App\Models\Privacy::where('slug', $slug)->get();

        return view($this->view['detail'], [
            'privacy' => $privacy,
            'listPrivacy' => $listPrivacy,
        ]);
    }
}
