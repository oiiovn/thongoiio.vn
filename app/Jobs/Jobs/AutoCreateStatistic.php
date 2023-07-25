<?php

namespace App\Jobs\Jobs;

use App\Enums\Statistic\StatisticKey;
use App\Models\Statistic;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class AutoCreateStatistic implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $statisticKey;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->statisticKey = StatisticKey::cases();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $nowDate = now()->toDateString();
        foreach($this->statisticKey as $item){
            Statistic::where('statistic_date', $nowDate)
            ->where('statistic_key', $item)
            ->firstOrCreate([
                'statistic_key' => $item,
                'statistic_number' => 0,
                'statistic_date' => $nowDate,
            ]);
        }
    }
}
