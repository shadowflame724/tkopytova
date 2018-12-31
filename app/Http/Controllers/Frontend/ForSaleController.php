<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;

/**
 * Class ForSaleController.
 */
class ForSaleController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $headerImg = 'painting_header.png';
        $portfolios = Portfolio::where('for_sale', 1)
            ->with('portfolioCategory')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('frontend.for_sale')
            ->withHeaderImg($headerImg)
            ->withPortfolios($portfolios)
            ->withForSaleActive(true);
    }

}
