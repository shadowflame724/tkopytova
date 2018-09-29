<div class="row mt-4">
    <div class="col">
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

    </div><!--col-->
</div><!--row-->

