<?php

namespace App\Models;

use App\Models\Traits\Attribute\PortfolioCategoryAttribute;
use Illuminate\Database\Eloquent\Model;

class PortfolioCategory extends Model
{
    use PortfolioCategoryAttribute;

    protected $fillable = [
        'title'
    ];

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
}
