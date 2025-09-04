<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    protected $fillable = ['cinema_id', 'name'];

    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }

    public function price()
    {
        return $this->hasOne(CinemaPrice::class);
    }
}
