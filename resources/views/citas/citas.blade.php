@extends('layout')
@section('contenido')
<br>
<div class="br-pagebody mg-t-5 pd-x-30">
    <div style="padding: 1em;" class="card bd-0 shadow-base">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h4 style="color:#18A4B2;text-align: center;">Modulo de Control de Citas</h4></div>
                        <div class="panel-body" style="align-items: center;">
                            {!! $calendar->calendar() !!}                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('citas.modal-AddCita')
    </div>
</div>
@endsection

@section('javascript')
    <script src="{{ asset('js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('js/lang-all.js') }}"></script>
    <script src="{{ asset('jsApp/citas.js') }}"></script>
    {!! $calendar->script() !!}
@endsection