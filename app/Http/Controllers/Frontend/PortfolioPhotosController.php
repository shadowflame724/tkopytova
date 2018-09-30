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
            ->with('photos', 'portfolioCategory')
            ->firstOrFail();

        return view('frontend.portfolio-photos')
            ->withActivePortfolioCategory($portfolio->portfolioCategory)
            ->withPortfolioCategories(PortfolioCategory::all())
            ->withPortfolio($portfolio);
    }
}
