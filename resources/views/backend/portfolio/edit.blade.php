@extends('backend.layouts.app')

@section('title', 'Управление портфолио . ' | ' .Редактировать портфолио'))

@section('content')
    {{ html()->modelForm($portfolio, 'PATCH', route('admin.portfolio.update', $portfolio))->attribute('enctype', 'multipart/form-data')->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Управление портфолио
                        <small class="text-muted">Редактировать портфолио</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->
            <!--row-->

            <hr/>

            @include('backend.portfolio.includes._form')

        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.portfolio.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->closeModelForm() }}
@endsection
