<div class="row mt-4">
    <div class="col">
        <div class="form-group row">
            {{ html()->label('Категория')
                ->class('col-md-2 form-control-label')
                ->for('portfolio_category_id') }}

            <div class="col-md-10">
                {{ html()->select('portfolio_category_id', $portfolioCategories)
                    ->class('form-control')
                    ->placeholder('Категория')
                    ->required() }}
            </div><!--col-->
        </div><!--form-group-->

        <div class="form-group row">
            {{ html()->label('Заголовок')
                ->class('col-md-2 form-control-label')
                ->for('title') }}

            <div class="col-md-10">
                {{ html()->text('title')
                    ->class('form-control')
                    ->placeholder('Заголовок')
                    ->attribute('maxlength', 191)
                    ->required()
                    ->autofocus() }}
            </div><!--col-->
        </div><!--form-group-->

        <div class="form-group row">
            {{ html()->label('Описание')
                ->class('col-md-2 form-control-label')
                ->for('description') }}

            <div class="col-md-10">
                {{ html()->textarea('description')
                    ->class('form-control')
                    ->placeholder('Описание')
                    ->autofocus() }}
            </div><!--col-->
        </div><!--form-group-->

        <div class="form-group row">
            {{ html()->label('Изображение')
                ->class('col-md-2 form-control-label required')
                ->for('image') }}

            <div class="col-md-10">
                {{ html()->file('image')
                    ->class('form-control')
                    ->attribute('accept', '.png, .jpg, .jpeg')
                    ->autofocus() }}
            </div><!--col-->
        </div><!--form-group-->

        <div class="form-group row">
            {{ html()->label('For sale?')
                ->class('col-md-2 form-control-label required')
                ->for('for_sale') }}

            <div class="col-md-2">
                {{ html()->checkbox('for_sale')
                    ->class('form-control')
                    ->autofocus() }}
            </div><!--col-->
        </div><!--form-group-->
        @if(isset($portfolio) && $portfolio->path)
            <div class="form-group row">
                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                    <img src="{{ asset('storage/portfolio/thumb_'.$portfolio->path) }}" alt=""
                         style="max-height: 150px">
                </div>
            </div>
        @endif
        <div class="form-group row">
            {{ html()->label('Фото')
                ->class('col-md-2 form-control-label required')
                ->for('photos') }}

            <div class="col-md-10">
                {{ html()->file('photos[]')
                    ->multiple()
                    ->attribute('accept', '.png, .jpg, .jpeg')
                    ->class('form-control')
                    ->autofocus() }}
            </div><!--col-->
        </div><!--form-group-->
        @if(isset($portfolio) && $portfolio->photos)
            <div class="form-group row">
                <div class="col-md-2">
                </div>
                @foreach($portfolio->photos as $photo)
                    <div class="col-md-2 d-flex flex-column">
                        <a href="{{ route('admin.portfolio.photo.destroy', $photo->id)}}"
                           data-method="delete"
                           data-trans-button-cancel="@lang('buttons.general.cancel')"
                           data-trans-button-confirm="@lang('buttons.general.crud.delete')"
                           data-trans-title="@lang('strings.backend.general.are_you_sure')"
                           class="btn btn-danger"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top"
                                                     title="@lang('buttons.general.crud.delete')"></i></a>

                        <img src="{{ asset('storage/portfolio-photos/'.$photo->path) }}" alt=""
                             style="
                             max-height: 150px;
                             max-width: 100%;
                             object-fit: contain;
                                "
                        >

                        <div class="form-group row">
                            <div class="col-md-10">
                                {{ html()->text("photo_{$photo->id}_order_by")
                                    ->class('form-control')
                                    ->value($photo->order_by)
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->
                    </div>
                @endforeach
            </div>
        @endif
    </div><!--col-->
</div><!--row-->

