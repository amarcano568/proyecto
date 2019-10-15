@extends('layout')
@section('contenido')
<br>
<form id="formConfigAgenda" method="post" enctype="multipart/form-data" action="registrar-configAgenda">
  @csrf
<div class="br-pagebody mg-t-5 pd-x-30">
  <div style="padding: 1em;" class="card bd-0 shadow-base">
    <div class="barra_titulo margin_bottom">
      <h5 class="text-info"><i class="menu-item-icon tx-18 fas fa-book"></i> Configuración de la Agenda.</h5>
      <hr>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12- col-xs-12">
        <div class="menu_acciones" style="float: right;">
          <button class="btn btn-outline-primary btn-oblong bd-2 pd-x-30 pd-y-10 tx-uppercase tx-bold tx-spacing-6 tx-12" type="submit" >
          <i class="fa-2x far fa-save"></i> Guardar
          </button>
        </div>
      </div>
    </div>
    <div class="row mg-t-20">
      <label class="col-sm-4 form-control-label">Días laborables de la Semana: <span class="tx-danger">*</span></label>
      <div class="col-sm-8 mg-t-10 mg-sm-t-0">
        <select id="diasTrabajo" name="diasTrabajo[]" class="form-control " multiple style="width: 100%">
         @foreach( $dias as $dia )
            @php $seleccion = ''; @endphp
            @foreach ($diaArray as $diaSelect )
              @php $seleccion = ''; @endphp
              @if( $diaSelect == $dia['id'] )
                @php $seleccion = 'selected'; @endphp                
                @break
              @endif
            @endforeach
            <option value="{{$dia['id']}}" {{$seleccion}}>
              {{$dia['dia']}}
            </option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="row mg-t-20">
      <label class="col-sm-4 form-control-label">Hora laborales: <span class="tx-danger">*</span></label>
      <div class="col-sm-4 mg-t-10 mg-sm-t-0">
        Desde:
        <div class="form-group">
          <div class="input-group date" id="horaDesde" data-target-input="nearest">
            <input id="hora_desde" name="hora_desde" type="text" class="form-control datetimepicker-input" data-target="#horaDesde" value="{{$configAgenda->horaDesde}}"/>
            <div class="input-group-append" data-target="#horaDesde" data-toggle="datetimepicker">
              <div class="input-group-text"><i class="far fa-clock"></i></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 mg-t-10 mg-sm-t-0">
        Hasta
        <div class="form-group">
          <div class="input-group date" id="horaHasta" data-target-input="nearest">
            <input id="hora_hasta" name="hora_hasta"  type="text" class="form-control datetimepicker-input" data-target="#horaHasta" value="{{$configAgenda->horaHasta}}"/>
            <div class="input-group-append" data-target="#horaHasta" data-toggle="datetimepicker">
              <div class="input-group-text"><i class="far fa-clock"></i></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mg-t-20">
      <label class="col-sm-4 form-control-label">Tiempo de atención de citas (Min) <span class="tx-danger">*</span></label>
      <div class="col-sm-8 mg-t-10 mg-sm-t-0">
        <input type="text" id="tiempoMinutos" name="tiempoMinutos" value="{{ $configAgenda->tiempoMinutos}}" />
      </div>
    </div>
    <br>
  </div>
</div>
</form>
@endsection
@section('javascript')
<script src="{{ asset('jsApp/configAgenda.js') }}"></script>
@stop