@extends('frontend.layouts.app')

@section('content')
    <div class="album py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="header-container text-center">{{ $portfolio->title }}</h3>
                </div>
                <div class="col-md-12">
                    <p class="header-desciption-container text-center">{{ $portfolio->description }}</p>
                </div>
                @if(!count($portfolio->photos))
                    <div class="col-md-12" style="margin-bottom: 20px">
                        <div class="card mb-12 box-shadow">
                            <img class="card-img-top"
                                 data-src="{{ asset('storage/portfolio/'.$portfolio->path) }}"
                                 alt="{{ $portfolio->title }}" style="max-height: 100%; display: block;"
                                 src="{{ asset('storage/portfolio/'.$portfolio->path) }}"
                                 data-holder-rendered="true">
                        </div>
                    </div>
                @else
                    @foreach($portfolio->photos as $photo)
                        <div class="col-md-12" style="margin-bottom: 20px">
                            <div class="card mb-12 box-shadow">
                                <img class="card-img-top"
                                     data-src="{{ asset('storage/portfolio-photos/'.$photo->path) }}"
                                     alt="{{ $portfolio->title }}" style="max-height: 100%; object-fit: contain;"
                                     src="{{ asset('storage/portfolio-photos/'.$photo->path) }}"
                                     data-holder-rendered="true">
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection


