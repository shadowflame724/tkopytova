<?php

namespace App\Models;

use App\Models\Traits\Attribute\PortfolioCategoryAttribute;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class PortfolioCategory extends Model
{
    use PortfolioCategoryAttribute;
    use Sluggable;

    protected $fillable = [
        'title'
    ];

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
