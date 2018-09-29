@extends('backend.layouts.app')

@section('title', app_name() . ' | Управление портфолио')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Управление портфолио
                    </h4>
                </div><!--col-->

                <div class="col-sm-7 pull-right">
                    @include('backend.portfolio.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Категория</th>
                                <th>Заголовок</th>
                                <th>Превью</th>
                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($portfolios as $portfolio)
                                <tr>
                                    <td>{{ ucwords($portfolio->portfolioCategory->title) }}</td>
                                    <td>{{ ucwords($portfolio->title) }}</td>
                                    <td>
                                        <img src="{{ asset('storage/portfolio/thumb_'.$portfolio->path) }}" alt=""
                                             style="max-height: 150px">
                                    </td>
                                    <td>{!! $portfolio->action_buttons !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
            <div class="row">
                <div class="col-7">
                    <div class="float-left">
                        {!! $portfolios->total() !!} {{ trans_choice('портфолио', $portfolios->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $portfolios->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
