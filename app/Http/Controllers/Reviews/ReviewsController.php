<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use App\Services\Reviews\ReviewsServiceInterface;
use App\Repositories\Reviews\ReviewsRepositoryInterface;
use App\Http\Request\Review\ReviewRequest;

class ReviewsController extends Controller
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
            'index' => 'reviews.index',
            'indexShop' => 'reviews.shop',
        ];
    }

    public function index()
    {
        return view($this->view['index'], [
            'user' => $this->repository->getUniqueIdsAndData(),
        ]);
    }

    public function create(ReviewRequest $request) {
        $this->service->store($request);
        return redirect()->back()->with('success', __('Đã bình luận cộng tác viên'));
    }

    public function delete($id)
    {
        $this->service->delete($id);
        return redirect()->back()->with('success', __('Xóa bình luận thành công'));
    }

    public function indexShop()
    {
        return view($this->view['indexShop'], [
            'user' => $this->repository->getUniqueIdsAndDataShop(),
        ]);
    }

    public function createShop(ReviewRequest $request) {
        $this->service->store($request);
        return redirect()->back()->with('success', __('Đã bình luận cộng tác viên'));
    }

    public function deleteShop($id)
    {
        $this->service->delete($id);
        return redirect()->back()->with('success', __('Xóa bình luận thành công'));
    }
}
