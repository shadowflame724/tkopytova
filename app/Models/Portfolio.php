<?php

namespace App\Models;

use App\Models\Traits\Attribute\PortfolioAttribute;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use PortfolioAttribute;

    protected $fillable = [
        'portfolio_category_id',
        'title',
        'description',
        'path'
    ];

    public function portfolioCategory()
    {
        return $this->belongsTo(PortfolioCategory::class);
    }
}
