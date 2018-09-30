<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'portfolio_id',
        'path'
    ];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }
}
