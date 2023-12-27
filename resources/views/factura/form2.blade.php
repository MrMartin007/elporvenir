<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-row">
            <div class="col-md-5 mb-4 ">
            {{ Form::label('numero_factura') }}
            {{ Form::text('numero_factura', $factura->numero_factura, ['class' => 'form-control' . ($errors->has('numero_factura') ? ' is-invalid' : ''), 'placeholder' => 'Numero Factura','disabled' => 'disabled']) }}
            {!! $errors->first('numero_factura', '<div class="invalid-feedback">:message</div>') !!}
        </div>
            <div class="col-md-5 mb-4 ">
                {{ Form::label('Empresa') }}
                {{ Form::select('empresas_id', $empresa, $factura->empresas_id, ['class' => 'form-control' . ($errors->has('empresas_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione','disabled' => 'disabled']) }}
                {!! $errors->first('empresas_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-5 mb-4 ">
            {{ Form::label('monto') }}
            {{ Form::text('monto', $factura->monto, ['class' => 'form-control' . ($errors->has('monto') ? ' is-invalid' : ''), 'placeholder' => 'Monto','disabled' => 'disabled']) }}
            {!! $errors->first('monto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
            <div class="col-md-5 mb-4 ">
            {{ Form::label('Estado') }}
            {{ Form::select('estados_id',$estados, $factura->estados_id, ['class' => 'form-control' . ($errors->has('estados_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el estado de la factura','disabled' => 'disabled']) }}
            {!! $errors->first('estados_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        </div>
        <div class="form-group">
            {{ Form::hidden('estados_id', 3) }}
            {!! $errors->first('estados_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</div>
