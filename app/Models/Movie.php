<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded = ['id'];

    public function genre()
    {
        return $this->hasMany(Genre::class);
    }
}
