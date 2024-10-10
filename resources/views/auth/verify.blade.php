@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-black text-white text-center">{{ __('Verifique su dirección de correo electrónico') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
                            </div>
                        @endif

                        <p class="text-center">
                            {{ __('Antes de continuar, consulte su correo electrónico para obtener un enlace de verificación.') }}
                        </p>

                        <p class="text-center">
                            {{ __('Si no recibiste el correo electrónico!') }}
                            <form class="d-flex justify-content-center" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link ">{{ __('Haga click aquí para solicitar otro') }}</button>
                        </form>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
