<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $fillable = ['name', 'photo', 'movie_id'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
