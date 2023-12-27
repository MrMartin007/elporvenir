@extends('adminlte::page')
@section('title', 'EL Porvenir')

@section('template_title')
    {{ __('Actualizar') }} CHEQUE
@endsection


@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Cheque</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cheques.update', $cheque->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('cheque.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
