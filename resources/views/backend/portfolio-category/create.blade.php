@extends('backend.layouts.app')

@section('title', 'Управление категориями . ' | ' .Добавить категорию'))

@section('content')
    {{ html()->form('POST', route('admin.portfolio-category.store'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Управление категориями
                        <small class="text-muted">Добавить категорию</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            @include('backend.portfolio-category.includes._form')
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.portfolio-category.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->form()->close() }}
@endsection
