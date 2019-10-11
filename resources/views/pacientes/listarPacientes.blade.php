@extends('layout')
@section('contenido')
<br>
<div class="br-pagebody mg-t-5 pd-x-30">
  <div style="padding: 1em;" class="card bd-0 shadow-base">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12- col-xs-12">
          <div class="menu_acciones" style="float: right;">        
            <button class="btn btn-outline-primary btn-oblong bd-2 pd-x-30 pd-y-10 tx-uppercase tx-bold tx-spacing-6 tx-12" id="nuevoPaciente" >
              <i class="fa-2x fas fa-user-plus"></i> Nuevo Paciente
            </button>
          </div>
        </div>
      </div>

    <br><br>
    <div class="align-items-center pd-y-20 pd-x-30 bg-gray-200">
      <table id="tablePacientes" class="table display responsive nowrap">
        <thead>
          <tr>
            <th style="text-align: center;">Id</th>
            <th style="text-align: center;">Nombres</th>
            <th style="text-align: center;">Apellidos</th>
            <th style="text-align: center;">Nro. Doc.</th>
            <th style="text-align: center;">Sexo</th>
            <th style="text-align: center;">Edad</th>
            <th style="text-align: center;">Fec. Ult. Consulta</th>
            <th style="text-align: center;">Opciones</th>
          </tr>
        </thead>
        <tbody id="bodyPacientes">
         
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
@include('pacientes.modal-pacientes-dat')
@section('javascript')
<script src="{{ asset('jsApp/pacientes.js') }}"></script>
@stop