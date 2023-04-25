<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Price extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'datetime' => 'immutable_datetime',
        'datetime_utc' => 'immutable_datetime',
        'tz_time' => 'immutable_datetime',
    ];

    public static function indate($date)
    {
        return self::where('datetime','like',$date.'%')->get();
    }

    public function scopeNow()
    {
        $date = Carbon::now()->format('Y-m-d H:00:00');
        return self::where([
                ['datetime', $date],
                ['geo_id', 8741]
            ]
        )->get();
    }

    public function getMinDateInPrices()
    {
        $minDate = Self::first()->min('tz_time');
        return Carbon::parse($minDate)->format('Y-m-d');
    }

    public function scopeCeutaMelillaNow()
    {
        $date = Carbon\Carbon::now()->format('Y-m-d H:00:00');
        return self::where([['geo_id', 8744], ['datetime', $date]])
            ->orWhere([['geo_id', 8745], ['datetime', $date]])->get();
    }

    public function scopeToday()
    {
        return $this->where([
            ['datetime', '>=', DB::raw('current_DATE')],
            ['geo_id', 8741]
        ])->get();
    }
}
