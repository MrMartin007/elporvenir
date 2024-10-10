<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-row">
                    <div class="col-md-12">
                        @if($factura->foto_fac)
                            <img src="{{ asset('storage/' . $factura->foto_fac) }}" alt="Foto del la Factura" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                        @else

                        @endif
                        <img id="foto-preview" src="#" alt="Vista previa de la foto" style="max-width: 200px; max-height: 200px; display: none;">
                        {!! $errors->first('foto_fac', '<div class="invalid-feedback">:message</div>') !!}
                        <div class="custom-file mb-3">
                            {{ Form::file('foto_fac', ['class' => 'custom-file-input', 'id' => 'foto_fac']) }}
                            <label class="custom-file-label" for="foto_fac">Foto de la Factura</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-5 mb-4 ">
            {{ Form::label('numero_factura') }}
            {{ Form::number('numero_factura', $factura->numero_factura, ['class' => 'form-control' . ($errors->has('numero_factura') ? ' is-invalid' : ''), 'placeholder' => 'Numero Factura']) }}
            {!! $errors->first('numero_factura', '<div class="invalid-feedback">:message</div>') !!}
        </div>
            <div class="col-md-5 mb-4 ">
                {{ Form::label('Empresas') }}
            {{ Form::select('empresas_id', $empresa, $factura->empresas_id, ['class' => 'form-control select2' . ($errors->has('empresas_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione']) }}
                {!! $errors->first('empresas_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-5 offset-3 mb-4">
                {{ Form::label('monto') }}
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Q</span>
                    </div>
                    {{ Form::text('monto', number_format($factura->monto, 2), ['class' => 'form-control monto-input' . ($errors->has('monto') ? ' is-invalid' : ''), 'placeholder' => 'Monto']) }}
                </div>
                {!! $errors->first('monto', '<div class="invalid-feedback">:message</div>') !!}

            </div>
            <div class="form-group">
                {{ Form::hidden('estados_id', 1) }}
                {!! $errors->first('estados_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="box-footer mt-4 text-center">
                <button type="submit" class="btn btn-primary">{{ __('Guardar Factura') }}</button>
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

        var inputFoto = document.getElementById('foto_fac');
        if (inputFoto) {
            inputFoto.addEventListener('change', function() {
                mostrarVistaPrevia(this);
            });
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var montoInput = document.querySelector('.monto-input');

        if (montoInput) {
            montoInput.addEventListener('input', function () {
                // Elimina cualquier caracter no numérico
                var inputValue = this.value.replace(/[^\d]/g, '');

                // Formatea el valor con dos decimales y agrega ".00"
                var formattedValue = (parseInt(inputValue) / 100).toFixed(2);

                // Agrega el símbolo "Q" y actualiza el valor del campo
                this.value = formattedValue;
            });
        }
    });
</script>
