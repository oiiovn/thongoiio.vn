<?php

namespace App\Repositories\Job;
use App\Admin\Repositories\EloquentRepositoryInterface;
use App\Models\Job;

interface JobRepositoryInterface extends EloquentRepositoryInterface
{
    public function countAll();
    public function getPause();
    public function cancel(Job $job, $desc, $notifyAll = false);
    public function updateHistoryProccess($id, $money_product_addition = 0, $desc = '');
    public function updateProccess($id, $money_product_addition = 0, $desc = '');
    public function findBySlugLoadRelations(string $slug, array $relations = ['details', 'histories', 'worker', 'shop']);
    public function findBySlug($slug);
    public function findByCode($code);
    public function updateByModel(Job $job, $data);
    public function workerReceive(Job $job, $worker_id);
    public function getByCurrentAuthLatestReceive(int $limit = 5);
    public function getByCurrentAuthShopWithRelations($column, $value, $relations = ['details'], $perPage = 10);
    public function getByCurrentAuthWorkerWithRelations($column, $value, $relations = ['details', 'shop'], $perPage = 10);
    public function getByWithRelations($column, $value, $relations = ['details', 'shop'], $limit = 10);
}