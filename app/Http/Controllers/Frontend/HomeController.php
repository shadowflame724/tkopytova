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
        $category = PortfolioCategory::whereSlug($slug)
            ->with(['portfolios' => function($query) {
                $query->orderBy('created_at', 'DESC');
            }])
            ->firstOrFail();
        $headerImg = 'header_background.jpg';
        if(isset($category) && $category->slug == 'painting') $headerImg = 'painting_header.png';

        return view('frontend.index')
            ->withActivePortfolioCategory($category)
            ->withHeaderImg($headerImg)
            ->withPortfolios($category->portfolios);
    }
}
