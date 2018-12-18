<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use Illuminate\Support\Facades\Mail;
use App\Mail\Frontend\Contact\SendContact;
use App\Http\Requests\Frontend\Contact\SendContactRequest;

/**
 * Class ContactController.
 */
class ContactController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $headerImg = 'header_background.jpg';

        return view('frontend.contact')
            ->withHeaderImg($headerImg)
            ->withContactActive(true);
    }

    /**
     * @param SendContactRequest $request
     *
     * @return mixed
     */
    public function send(SendContactRequest $request)
    {
        Mail::send(new SendContact($request));

        return redirect()->back()->withFlashSuccess(__('alerts.frontend.contact.sent'));
    }
}
