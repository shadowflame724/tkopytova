@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    <div class="album py-5">
        <div class="container">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="row d-flex flex-column about-container justify-content-center align-items-center">
                        <div class="about-image-container d-flex justify-content-center">
                            <img src="/img/frontend/contact.jpg" alt="my photo" style="max-width: 100%!important;
    object-fit: contain;
">
                        </div>
                        <div class="about-description-container flex-column d-flex justify-content-center">
                            <div class="">
                                All requests regarding my illustrations, children books and exist paintings or paintings to order, are welcome at <a
                                        href="mailto:art_inside@ukr.net">art_inside@ukr.net</a>
                            </div>
                            <div class="">
                                Feel free, we can create something beautiful together!
                            </div>
                            <div class="">
                                Also follow me here: <a href="https://www.facebook.com/tetiana.kopytova">Facebook</a> / <a href="https://www.instagram.com/kopytova_tetiana_horse_art">Instagram</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
