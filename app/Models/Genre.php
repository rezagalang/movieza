<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $guarded = ['id'];
    
    public function movie()
    {
        return $this->belongsTo(Genre::class);
    }
}
