@extends('layouts.shopapp')
@section('js')

<script>
const zoomImages = document.querySelectorAll('.zoom');

zoomImages.forEach(image => {
    image.addEventListener('mouseover', () => {
        image.style.transform = 'scale(1.5)';
    });

    image.addEventListener('mouseout', () => {
        image.style.transform = 'scale(1)';
    });
});
</script>
@endsection

@section('content')
<div class="container" style="margin-top: 50px">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/shop">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tienda</li>
        </ol>
    </nav>

    @if($productos->count() > 0)
    <div class="row">
        @foreach($productos as $producto)
        <div class="col-lg-3 col-md-4 col-6 mb-3">
            <div class="card border-0" style="margin-bottom: 20px; height: auto;">
                <img src="{{ asset('storage/' . $producto->foto_producto) }}" class="card-img-top mx-auto img-fluid zoom" style="max-height: 150px; width:150px; display: block;" alt="{{ $producto->nombre }}">
                <div class="card-body">
                    <h5 class="card-title">Precio: Q. {{ $producto->precio_venta }}</h5>
                    <p class="card-text">{{ $producto->marca->nombre_marca }}</p>
                    <p class="card-text">{{ $producto->detalle_producto }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p>No se encontraron resultados para la búsqueda.</p>
    @endif
</div>
<style>
.zoom {
    transition: transform 0.2s;
}

.zoom:hover {
    transform: scale(1.5);
}
</style>
@endsection





