@extends('layout')
@section('contenido')
<br>
<div class="br-pagebody mg-t-5 pd-x-30">
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <select  data-placeholder="Seleccione un paciente..." class="chosen-select form-control" id="chosenPacientes" name="chosenPacientes">
        <option></option>
          @foreach( $Pacientes as $pac )
            <option value="{{$pac->idpacientes}}">
              {{$pac->Nombres. ' ' . $pac->Apellidos}}
            </option>
          @endforeach
      </select>
    </div>
  </div>
  <div class="row row-sm mg-t-20">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card bd-0 shadow-base">

      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link  active" href="#datos_personales" role="tab" data-toggle="tab" aria-selected="true"><i class="far fa-user"></i> Datos personales</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#Anamnesis" role="tab" data-toggle="tab" aria-selected="true"><i class="far fa-question-circle"></i> Anamnesis General</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#consultasTab" role="tab" data-toggle="tab" aria-selected="true"><i class="fas fa-tooth"></i> Consultas</a>
        </li>
        <li class="nav-item" id="navOdontograma">
          <a class="nav-link" href="#odontogramaTab" role="tab" data-toggle="tab"><i class="fas fa-teeth-open"></i> Odontogramas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#references" role="tab" data-toggle="tab"><i class="fas fa-band-aid"></i> Tratamientos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#references" role="tab" data-toggle="tab">Presupuestos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#recipes" role="tab" data-toggle="tab"><i class="fas fa-tablets"></i> Recipes / Examenes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#Imagenes" role="tab" data-toggle="tab"><i class="far fa-images"></i> Imagenes</a>
        </li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">

        <div role="tabpanel" class="tab-pane active" id="datos_personales">
          @include('consultaMedica.datos_personales')
        </div>
        <div role="tabpanel" class="tab-pane" id="Anamnesis">
          @include('consultaMedica.Anamnesis_general')
        </div>
        <div role="tabpanel" class="tab-pane fade" id="consultasTab">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              @include('consultaMedica.consultasPaciente')
            </div>            
          </div>          
        </div>
        <div role="tabpanel" class="tab-pane" id="odontogramaTab">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              @include('consultaMedica.odontogramaPaciente')
            </div>            
          </div>          
        </div>
        <div role="tabpanel" class="tab-pane fade" id="buzz">bbb</div>
        <div role="tabpanel" class="tab-pane fade" id="Imagenes">
          @include('consultaMedica.galeriaImagenes')
        </div>
        <div role="tabpanel" class="tab-pane fade" id="recipes">
          @include('consultaMedica.recipesPaciente')
        </div>
        
      </div>

    </div>
  </div>
  <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    @include('consultaMedica.fichaPaciente')
  </div> -->
  
</div>
</div>
@include('pdf.modal-recipe')

@include('consultaMedica.modal-newRecipe')

@endsection

@section('javascript')
  <script src="{{ asset('jsApp/odontCanvas/core/engine.js') }}"></script>
  <script src="{{ asset('jsApp/odontCanvas/util/constants.js') }}"></script>
  <script src="{{ asset('jsApp/odontCanvas/util/settings.js') }}"></script>
  <script src="{{ asset('jsApp/odontCanvas/models/rect.js') }}"></script>
  <script src="{{ asset('jsApp/odontCanvas/models/damage.js') }}"></script>
  <script src="{{ asset('jsApp/odontCanvas/models/textBox.js') }}"></script>
  <script src="{{ asset('jsApp/odontCanvas/models/tooth.js') }}"></script>
  <script src="{{ asset('jsApp/odontCanvas/core/renderer.js') }}"></script>
  <script src="{{ asset('jsApp/odontCanvas/core/odontogramaGenerator.js') }}"></script>
  <script src="{{ asset('jsApp/odontCanvas/core/collisionHandler.js') }}"></script>
  <script src="{{ asset('jsApp/tableroPaciente.js') }}"></script>  
@stop



