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
    </div><!--col-->
</div><!--row-->

