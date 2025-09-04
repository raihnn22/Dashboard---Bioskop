<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    protected $fillable = [
        'cinema_id',
        'name',
        'weekday_price',
        'friday_price',
        'weekend_price'
    ];

    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }

    public function price()
    {
        return $this->hasOne(CinemaPrice::class);
    }
}
