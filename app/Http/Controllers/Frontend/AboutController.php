<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;

/**
 * Class AboutController.
 */
class AboutController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $headerImg = 'header_background.jpg';

        return view('frontend.about')
            ->withHeaderImg($headerImg)
            ->withAboutActive(true);
    }

}
