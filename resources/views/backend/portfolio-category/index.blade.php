@extends('backend.layouts.app')

@section('title', app_name() . ' | Управление категориями')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Управление категориями
                    </h4>
                </div><!--col-->

                <div class="col-sm-7 pull-right">
                    @include('backend.portfolio-category.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Заголовок</th>
                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($portfolioCategories as $portfolioCategory)
                                <tr>
                                    <td>{{ ucwords($portfolioCategory->title) }}</td>
                                    <td>{!! $portfolioCategory->action_buttons !!}</td>
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
                        {!! $portfolioCategories->total() !!} {{ trans_choice('категорий', $portfolioCategories->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $portfolioCategories->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
