@extends('frontend.layouts.app')

@section('content')
    <main>
        <div class="main-portfolio-container" id="portfolios">
            @foreach($portfolios as $portfolio)
                <div class="portfolio-container">
                    <img
                            data-original="{{ asset('storage/portfolio/'.$portfolio->path) }}"
                            src="{{ asset('storage/portfolio/thumb_'.$portfolio->path) }}"
                            alt="{{ $portfolio->title }}">
                </div>
            @endforeach
        </div>
    </main>
@endsection
