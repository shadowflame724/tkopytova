@extends('frontend.layouts.app')

@section('content')
    <div class="album py-5">
        <div class="container">
            <div class="row">
                @foreach($portfolios as $portfolio)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <a href="{{ route('frontend.portfolio.photos', [
                               'category_slug' => $portfolio->portfolioCategory->slug,
                               'portfolio_slug' => $portfolio->slug,
                            ]) }}">
                                <img class="card-img-top"
                                     data-src="{{ asset('storage/portfolio/thumb_'.$portfolio->path) }}"
                                     alt="{{ $portfolio->title }}" style="max-height: 100%; width: 100%; display: block;"
                                     src="{{ asset('storage/portfolio/thumb_'.$portfolio->path) }}"
                                     data-holder-rendered="true">
                            </a>
                            <div class="card-body">
                                <p class="card-text text-center">{{ $portfolio->title }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
