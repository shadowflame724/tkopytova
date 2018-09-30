<?php

namespace App\Models;

use App\Models\Traits\Attribute\PortfolioAttribute;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use PortfolioAttribute;
    use Sluggable;

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

    public function photos()
    {
        return $this->hasMany(Photo::class);
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
