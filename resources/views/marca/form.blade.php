<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-row">
            <div class="col-md-6 mb-4 ">
            {{ Form::label('nombre_marca') }}
            {{ Form::text('nombre_marca', $marca->nombre_marca, ['class' => 'form-control' . ($errors->has('nombre_marca') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Marca']) }}
            {!! $errors->first('nombre_marca', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="box-footer mt-4 text-center">
                <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
            </div>
        </div>
    </div>

</div>
