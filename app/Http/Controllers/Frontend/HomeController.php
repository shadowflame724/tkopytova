<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     *
     * @return \Illuminate\View\View
     */
    public function index($slug = 'illustration')
    {
        $category = PortfolioCategory::whereSlug($slug)->with('portfolios')->firstOrFail();

        return view('frontend.index')
            ->withActivePortfolioCategory($category)
            ->withPortfolioCategories(PortfolioCategory::all())
            ->withPortfolios($category->portfolios);
    }
}
