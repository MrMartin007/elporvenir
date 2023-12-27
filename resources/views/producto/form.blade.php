<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-row">
                    <div class="col-md-12">
                        @if($producto->foto_producto)
                            <img src="{{ asset('storage/' . $producto->foto_producto) }}" alt="Foto del Producto" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                        @else

                        @endif
                        <img id="foto-preview" src="#" alt="Vista previa de la foto" style="max-width: 200px; max-height: 200px; display: none;">
                        {!! $errors->first('foto_producto', '<div class="invalid-feedback">:message</div>') !!}
                        <div class="custom-file mb-3">
                            {{ Form::file('foto_producto', ['class' => 'custom-file-input', 'id' => 'foto_producto']) }}
                            <label class="custom-file-label" for="foto_producto">Foto del Producto</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4 mb-4 ">
                {{ Form::label('detalle_producto') }}
                {{ Form::text('detalle_producto', $producto->detalle_producto, ['class' => 'form-control' . ($errors->has('detalle_producto') ? ' is-invalid' : ''), 'placeholder' => 'Detalle Producto']) }}
                {!! $errors->first('detalle_producto', '<div class="invalid-feedback">:message</div>') !!}

            </div>
            <div class="col-md-4 mb-4 ">
                {{ Form::label('marcas_id','Marca') }}
                {{ Form::select('marcas_id', $marcas, $producto->marcas_id, ['class' => 'form-control' . ($errors->has('marcas_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una marca']) }}
                {!! $errors->first('marcas_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="col-md-4 mb-4">
                {{ Form::label('precio_costo') }}
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Q</span>
                    </div>
                    {{ Form::text('precio_costo', number_format($producto->precio_costo, 2), ['class' => 'form-control precio-input' . ($errors->has('precio_costo') ? ' is-invalid' : ''), 'placeholder' => 'Precio Costo']) }}
                </div>
                {!! $errors->first('precio_costo', '<div class="invalid-feedback">:message</div>') !!}

            </div>

        </div>
        <div class="form-row">
            <div class="col-md-4 mb-4 ">
                {{ Form::label('precio_venta') }}
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Q</span>
                    </div>
                    {{ Form::text('precio_venta', number_format($producto->precio_venta, 2), ['class' => 'form-control preciov-input' . ($errors->has('precio_venta') ? ' is-invalid' : ''), 'placeholder' => '123.50']) }}
                </div>
                {!! $errors->first('precio_venta', '<div class="invalid-feedback">:message</div>') !!}
            </div>

        <div class="col-md-4 mb-4">
            {{ Form::label('precio_docena') }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Q</span>
                </div>
                {{ Form::text('precio_docena', number_format($producto->precio_docena, 2), ['class' => 'form-control preciod-input' . ($errors->has('precio_docena') ? ' is-invalid' : ''), 'placeholder' => '123.50']) }}
            </div>
            {!! $errors->first('precio_docena', '<div class="invalid-feedback">:message</div>') !!}
        </div>

            <div class="col-md-4 mb-4 ">
                {{ Form::label('codigo_producto') }}
                {{ Form::text('codigo_producto', $producto->codigo_producto, ['class' => 'form-control' . ($errors->has('codigo_producto') ? ' is-invalid' : ''), 'placeholder' => 'Codigo Producto']) }}
                {!! $errors->first('codigo_producto', '<div class="invalid-feedback">:message</div>') !!}


            </div>

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



{{-- Scripts --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Agrega estos enlaces en la sección de encabezado de tu HTML -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var precioCostoInput = document.getElementById('precio_costo');
        var precioVentaInput = document.getElementById('precio_venta');

        if (precioCostoInput && precioVentaInput) {
            precioCostoInput.addEventListener('input', function() {
                // Obtener el valor de Precio Costo
                var precioCosto = parseFloat(this.value);

                // Calcular el 20% y actualizar Precio Venta
                var precioVenta = precioCosto * 12;
                precioVentaInput.value = precioVenta.toFixed(2); // Redondear a dos decimales
            });
        }
    });
</script>
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

        var inputFoto = document.getElementById('foto_producto');
        if (inputFoto) {
            inputFoto.addEventListener('change', function() {
                mostrarVistaPrevia(this);
            });
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var precioInput = document.querySelector('.precio-input');

        if (precioInput) {
            precioInput.addEventListener('input', function () {
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var precioInput = document.querySelector('.preciov-input');

        if (precioInput) {
            precioInput.addEventListener('input', function () {
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var precioInput = document.querySelector('.preciod-input');

        if (precioInput) {
            precioInput.addEventListener('input', function () {
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
