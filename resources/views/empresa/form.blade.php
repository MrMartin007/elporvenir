<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-row">
            <div class="col-md-5 mb-4 ">
            {{ Form::label('nombre de la empresa') }}
            {{ Form::text('nombre_empresa', $empresa->nombre_empresa, ['class' => 'form-control' . ($errors->has('nombre_empresa') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Empresa']) }}
            {!! $errors->first('nombre_empresa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
            <div class="col-md-5 mb-4 ">
            {{ Form::label('Nombre del proveedor') }}
            {{ Form::text('proveedor', $empresa->proveedor, ['class' => 'form-control' . ($errors->has('proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Proveedor']) }}
            {!! $errors->first('proveedor', '<div class="invalid-feedback">:message</div>') !!}

        </div>
        </div>

    </div>
    <div class="box-footer mt20 offset-4">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
