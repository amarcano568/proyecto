@extends('layout')
@section('contenido')
<br>
<button style="margin-right: 2em;float: right;" id="nuevoPaciente" type="submit" class="btn btn-info tx-size-xs">
  <i class="fas fa-user-plus"></i>
  Nuevo Paciente
</button>
<br><br>
<div class="align-items-center pd-y-20 pd-x-30 bg-gray-200">
  <table id="tablePacientes" class="table display responsive nowrap">
    <thead>
      <tr>
        <th style="text-align: center;">Id</th>
        <th style="text-align: center;" >Nombres</th>
        <th style="text-align: center;">Apellidos</th>
        <th style="text-align: center;" >Nro. Doc.</th>
        <th style="text-align: center;" >Sexo</th>
        <th style="text-align: center;" >Edad</th>
        <th style="text-align: center;" >Fec. Ult. Consulta</th>
        <th style="text-align: center;" >Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach( $Pacientes as $Pac )

        <tr>
          <td>{{ $Pac->idpacientes}}</td>
          <td>{{ $Pac->Nombres}}</td>
          <td>{{ $Pac->Apellidos}}</td>
          <td>{{ $Pac->nroDoc}}</td>
          <td>{{ $Pac->sexo == 'M' ? 'Masculino':'Femenino'}}</td>
          <td>{{  $Pac->edad }}</td>
          <td></td>
          <td>
            <a idPaciente="{{ $Pac->idpacientes}}" data-accion="editar-paciente" data-trigger="hover" data-toggle="popover" title="Editar Paciente." data-content="Esta opción permite editar los datos basicos del Paciente." href="#" class="btn btn-outline-primary btn-icon mg-r-5"><div><i class="fas fa-user-edit"></i></div></a>
            <a data-trigger="hover" data-toggle="popover" title="Saldo." data-content="Esta opción permite ver el estado de cuenta del Paciente." href="#" class="btn btn-outline-info btn-icon mg-r-5"><div><i class="far fa-money-bill-alt"></i></div></a>
          </td>
        </tr>
      @endforeach
    </tbody>

  </table>
</div>
@endsection

@include('pacientes.modal-pacientes-dat')

@section('javascript')
  <script src="{{ asset('jsApp/pacientes.js') }}"></script>
@stop

