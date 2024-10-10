@extends('adminlte::page')
@section('title', 'Calendario')

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.js"></script>
    <script src="{{ asset('js/calendario.js') }}" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendario');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: "es",
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,listWeek',
                },
                events: [
                        @foreach($cheques as $cheque)
                        @php
                            // Verifica si existe la relación 'facturas' y 'empresa' antes de acceder a ellas
                            $empresaNombre = optional($cheque->facturas)->empresa->nombre_empresa ?? 'Sin empresa';
                            $monto = optional($cheque->facturas)->monto ?? 'Sin monto';
                            $estadoCheque = $cheque->estados_id;
                            $className = ($estadoCheque == 2) ? 'cheque-tachado' : '';
                        @endphp
                    {
                            title: '{{ $empresaNombre }} - Q.{{ $monto }}',
                            start: '{{ $cheque->fecha_cobro }}',
                            url: '{{ route('cheques.index', ['search' => $cheque->no_cheque]) }}',
                            className: '{{ $className }}',
                            rendering: 'background'
                    },
                    @endforeach
                ],
                eventRender: function(info) {
                    // Agregar estilo directamente al elemento del evento
                    info.el.classList.add(info.event.className);
                },
            });
            calendar.render();
        });
    </script>
@endsection

@section('content')
    <div id='calendar-container'>
        <div id='calendario'></div>
    </div>
    <style>
        .cheque-tachado {
            text-decoration: line-through;
            color: #d9534f;
            background-color: #f2dede;
            border-color: #d9534f;
        }
    </style>
@endsection
