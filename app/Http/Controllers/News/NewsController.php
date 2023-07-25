<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Repositories\News\NewsRepositoryInterface;

class NewsController extends Controller
{
    public function __construct(
        NewsRepositoryInterface $repository,
    ) {
        parent::__construct();

        $this->repository = $repository;

    }
    
    public function getView()
    {
        return [
            'index' => 'news.index',
            'detail' => 'news.detail',
        ];
    }

    public function index()
    {
        return view($this->view['index'], [
            'news' => $this->repository->searchAllLimit(),
        ]);
    }

    public function detail($slug)
    {
        return view($this->view['detail'], [
            'news' => \App\Models\News::where('slug', $slug)->first(),
        ]);
    }
}
