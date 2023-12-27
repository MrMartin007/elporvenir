<div class="box box-info padding-1">
    <div class="box-body">


        <div class="form-row">
            <input type="hidden" name="factura_id" value="{{ $factura->id }}">
        </div>

        <div class="form-row">
            <div class="col-md-5 mb-4">
                {{ Form::label('numero_factura') }}
                {{ Form::text('numero_factura', $factura->numero_factura, [
                    'class' => 'form-control' . ($errors->has('numero_factura') ? ' is-invalid' : ''),
                    'placeholder' => 'Numero Factura',
                    'readonly' => 'readonly', // Añade este atributo
                ]) }}
                {!! $errors->first('numero_factura', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-5 mb-4 ">
                {{ Form::label('Empresa') }}
                {{ Form::select('empresas_id', $empresa, $factura->empresas_id, ['class' => 'form-control' . ($errors->has('empresas_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione','disabled' => 'disabled']) }}
                {!! $errors->first('empresas_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-5 mb-4">
                {{ Form::label('monto') }}
                {{ Form::text('monto', $factura->monto, [
                    'class' => 'form-control' . ($errors->has('monto') ? ' is-invalid' : ''),
                    'placeholder' => 'Monto',
                    'readonly' => 'readonly', // Añade este atributo
                ]) }}
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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-row">
                    <div class="col-md-12">
                        @if($cheque->foto_ch)
                            <img src="{{ asset('storage/' . $cheque->foto_ch) }}" alt="Foto del la Factura" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                        @else

                        @endif
                        <img id="foto-preview" src="#" alt="Vista previa de la foto" style="max-width: 200px; max-height: 200px; display: none;">
                        {!! $errors->first('foto_ch', '<div class="invalid-feedback">:message</div>') !!}
                        <div class="custom-file mb-3">
                            {{ Form::file('foto_ch', ['class' => 'custom-file-input', 'id' => 'foto_ch']) }}
                            <label class="custom-file-label" for="foto_ch">Foto del Cheque</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-5 mb-4 ">
            {{ Form::label('no_cheque') }}
            {{ Form::number('no_cheque', $cheque->no_cheque, ['class' => 'form-control' . ($errors->has('no_cheque') ? ' is-invalid' : ''), 'placeholder' => 'No Cheque']) }}
            {!! $errors->first('no_cheque', '<div class="invalid-feedback">:message</div>') !!}
        </div>
            <div class="col-md-5 mb-4 ">
            {{ Form::label('fecha_cobro') }}
            {{ Form::date('fecha_cobro', $cheque->fecha_cobro, ['class' => 'form-control' . ($errors->has('fecha_cobro') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Cobro']) }}
            {!! $errors->first('fecha_cobro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
            <div class="form-group">
                {{ Form::hidden('estados_id', 1) }}
                {!! $errors->first('estados_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-row">
                <input type="hidden" name="facturas_id" value="{{ $factura->id }}">
            </div>

        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Agrega estos enlaces en la sección de encabezado de tu HTML -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function mostrarVistaPrevia(input) {
            var archivoSeleccionado = input.files[0];
            var lector = new FileReader();

            lector.onload = function (e) {
                document.getElementById('foto-preview').src = e.target.result;
                document.getElementById('foto-preview').style.display = 'block';
            };

            lector.readAsDataURL(archivoSeleccionado);
        }

        var inputFoto = document.getElementById('foto_ch');
        if (inputFoto) {
            inputFoto.addEventListener('change', function() {
                mostrarVistaPrevia(this);
            });
        }
    });
</script>
