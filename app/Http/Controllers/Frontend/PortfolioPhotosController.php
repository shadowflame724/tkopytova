<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;

/**
 * Class PortfolioPhotosController.
 */
class PortfolioPhotosController extends Controller
{
    /**
     *
     * @return \Illuminate\View\View
     */
    public function index($categorySlug, $portfolioSlug)
    {
        $portfolio = Portfolio::whereSlug($portfolioSlug)
            ->with(['photos' => function($query) {
                $query->orderBy('order_by', 'ASC');
            }, 'portfolioCategory'])
            ->firstOrFail();
        $headerImg = 'header_background.jpg';
        $category = $portfolio->portfolioCategory;
        if(isset($category) && $category->slug == 'painting') $headerImg = 'painting_header.png';

        return view('frontend.portfolio-photos')
            ->withActivePortfolioCategory($category)
            ->withHeaderImg($headerImg)
            ->withPortfolio($portfolio);
    }
}
