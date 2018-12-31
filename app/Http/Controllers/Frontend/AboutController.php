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
        $headerImg = 'painting_header.png';

        return view('frontend.about')
            ->withHeaderImg($headerImg)
            ->withAboutActive(true);
    }

}
