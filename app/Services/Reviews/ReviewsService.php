<?php

namespace App\Services\Reviews;

use App\Services\Reviews\ReviewsServiceInterface;
use App\Repositories\Reviews\ReviewsRepositoryInterface;
use App\Services\File\FileService;
use Illuminate\Http\Request;
use App\Admin\Traits\Setup;

class ReviewsService implements ReviewsServiceInterface
{

    use Setup;
    protected $repository;
    protected $serviceFile;
    protected $data;

    public function __construct(
        ReviewsRepositoryInterface $repository,
        FileService $serviceFile
    ) {
        $this->repository = $repository;
        $this->serviceFile = $serviceFile;
    }

    public function store(Request $request)
    {
        $this->data = $request->validated();
        
        return $this->repository->create($this->data);
    }

    public function update(Request $request)
    {
        return $this->repository->update($this->data['id'], $this->data);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
