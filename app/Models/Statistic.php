<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Enums\Statistic\StatisticKey;

class Statistic extends Model
{
    use HasFactory;
    protected $table = 'statistics';

    protected $guarded = [];

    protected $casts = [
        'statistic_key' => StatisticKey::class
    ];
    
    public function getByBetweenDate(array $date){
        return self::select('statistic_key', DB::raw('SUM(statistic_number) as total'))
        ->whereBetween('statistic_date', $date)
        ->groupBy('statistic_key')
        ->get();
    }

    public static function updateWithKey($amount = 0, StatisticKey $statisticKey){
        $statistic = self::where('statistic_key', $statisticKey)
        ->where('statistic_date', now()->toDateString())
        ->first();
        if($statistic){
            $statistic->update([
                'statistic_number' => DB::raw("statistic_number + {$amount}")
            ]);
        }else{
            self::create([
                'statistic_key' => $statisticKey,
                'statistic_number' => $amount,
                'statistic_date' => now()->toDateString()
            ]);
        }
        return $statistic;
    }
}
