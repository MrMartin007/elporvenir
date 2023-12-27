@extends('layouts.app')

@section('template_title')
    {{ $cheque->name ?? "{{ __('Show') Cheque" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Cheque</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cheques.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>No Cheque:</strong>
                            {{ $cheque->no_cheque }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Cobro:</strong>
                            {{ $cheque->fecha_cobro }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
