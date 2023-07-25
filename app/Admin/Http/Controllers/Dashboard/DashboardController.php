<?php

namespace App\Admin\Http\Controllers\Dashboard;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Repositories\Job\JobRepositoryInterface;
use App\Admin\Repositories\User\UserRepositoryInterface;
use App\Enums\Job\JobStatus;
use App\Enums\Statistic\StatisticKey;
use App\Models\Statistic;
use App\Repositories\Setting\SettingRepositoryInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public $repositoryJob, $repositorySetting, $repositoryUser;
    public $modelStatistic, $statisticKey;
    public function __construct(
        JobRepositoryInterface $repositoryJob,
        UserRepositoryInterface $repositoryUser,
        SettingRepositoryInterface $repositorySetting
    )
    {
        parent::__construct();
        $this->repositoryJob = $repositoryJob;
        $this->repositorySetting = $repositorySetting;
        $this->repositoryUser = $repositoryUser;
        $this->modelStatistic = new Statistic();
    }
    public function getView()
    {
        return [
            'index' => 'admin.dashboard.index'
        ];
    }
    public function index(Request $request){

        $dateBetween = [$request->input('from_date', date('2000-01-01')), $request->input('to_date', now()->addDay()->toDateString())];
        $countJob = $this->repositoryJob->countAll($dateBetween);
        $statisics = $this->modelStatistic->getByBetweenDate($dateBetween);
        $countUser = $this->repositoryUser->countAll($dateBetween);

        $settings = $this->repositorySetting->getAll()->getInstance();
        $data = [
            [
                'icon' => '<i class="ti ti-user"></i>',
                'bg_color' => 'bg-primary',
                'title' => __('Tổng thành viên'),
                'value' => $countUser
            ],
            [
                'icon' => '<i class="ti ti-checklist"></i>',
                'bg_color' => 'bg-primary',
                'title' => __('Tổng đơn'),
                'value' => $countJob->sum('total')
            ],
            [
                'icon' => '<i class="ti ti-checklist"></i>',
                'bg_color' => 'bg-green',
                'title' => __('Đơn hoàn thành'),
                'value' => $countJob->where('status', JobStatus::Completed)->sum('total')
            ],
            [
                'icon' => '<i class="ti ti-checklist"></i>',
                'bg_color' => 'bg-danger',
                'title' => __('Đơn hủy'),
                'value' => $countJob->where('status', JobStatus::Cancelled)->sum('total')
            ],
            [
                'icon' => '<i class="ti ti-currency-dollar"></i>',
                'bg_color' => 'bg-info',
                'title' => __('Tổng doanh thu'),
                'value' => format_price($statisics->where('statistic_key', StatisticKey::Revenue)->sum('total'))
            ],
            [
                'icon' => '<i class="ti ti-currency-dollar"></i>',
                'bg_color' => 'bg-warning',
                'title' => __('Tổng lợi nhuận'),
                'value' => format_price($statisics->where('statistic_key', StatisticKey::Profit)->sum('total'))
            ]
        ];
        return view($this->view['index'], compact('data'));
    }

    public function post() {
        return back()->with('success', __('notifySuccess'));
    }
}
