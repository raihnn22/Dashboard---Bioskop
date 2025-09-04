<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CinemaPrice extends Model
{
    protected $fillable = ['studio_id', 'weekday_price', 'friday_price', 'weekend_price'];

    public function studio()
    {
        return $this->belongsTo(Studio::class);
    }
}
