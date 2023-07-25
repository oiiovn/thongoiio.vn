<?php

namespace App\Repositories\Reviews;

use App\Admin\Repositories\EloquentRepository;
use App\Repositories\Reviews\ReviewsRepositoryInterface;
use App\Models\Review;
use App\Models\Job;
use App\Models\User;

class ReviewsRepository extends EloquentRepository implements ReviewsRepositoryInterface
{
    protected $select = [];

    public function getModel()
    {
        return Review::class;
    }

    public function searchAllLimit($keySearch = '', $meta = [], $select = ['id'], $limit = 10)
    {
        $this->instance = $this->model->select($select);
        $this->getQueryBuilderFindByKey($keySearch);

        foreach ($meta as $key => $value) {
            $this->instance = $this->instance->where($key, $value);
        }
        return $this->instance->limit($limit)->get();
    }

    protected function getQueryBuilderFindByKey($key)
    {
        $this->instance = $this->instance->where(function ($query) use ($key) {
            return $query->where('username', 'LIKE', '%' . $key . '%')
                ->orWhere('phone', 'LIKE', '%' . $key . '%')
                ->orWhere('email', 'LIKE', '%' . $key . '%')
                ->orWhere('fullname', 'LIKE', '%' . $key . '%');
        });
    }

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC')
    {
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }


    public function getUniqueIdsAndData()
    {
        $uniqueIds = [];
        $jobs = Job::whereNotNull('worker_id')->get();
        foreach ($jobs as $job) {
            $ids = explode(',', $job->worker_id);

            foreach ($ids as $id) {
                $id = trim($id);
                if (!empty($id) && $id != auth()->user()->id && !in_array($id, $uniqueIds)) {
                    $uniqueIds[] = $id;
                }
            }
        }
        
        $userData = User::with('reviews', 'jobs')->whereIn('id', $uniqueIds)->get();
        // dd($userData->first()->jobs->where('worker_id', 2)->count());
        return $userData;
    }


    public function getUniqueIdsAndDataShop()
    {
        $uniqueIds = [];
        $jobs = Job::whereNotNull('shop_id')->get();
        foreach ($jobs as $job) {
            $ids = explode(',', $job->shop_id);
            
            foreach ($ids as $id) {
                $id = trim($id);
                if (!empty($id) && $id != auth()->user()->id && !in_array($id, $uniqueIds)) {
                    $uniqueIds[] = $id;
                }
            }
        }
        
        $userData = User::with('reviews', 'jobCreateds')->whereIn('id', $uniqueIds)->get();
        return $userData;
    }
}
