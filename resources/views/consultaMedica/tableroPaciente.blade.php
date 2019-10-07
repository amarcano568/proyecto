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
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
      <div class="dropdown">
            <a style="float: right;" href="./index.html" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down">Inf. Paciente</span>
              <i style="font-size: 18px;" class="fas fa-caret-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-header" style="margin-top: -1em;">
              <div class="col-sm-12 col-lg-12">
              <div class="card shadow-base bd-0 ht-100p ">
                <figure class="mg-b-0 bg-reef ht-150 overflow-hidden rounded-top wd-300">
                  <img src="{{ asset('img/fondo2.jpg')}}" class="img-fluid rounded-top op-3" alt="">
                </figure>
                <div class="card-body tx-center">
                  <div class="pos-relative">
                    <div class="pos-absolute x-0 t--60">
                      <a href="#"><img src="{{ asset('img/img12.jpg')}}" class="wd-100 ht-100 rounded-circle" alt=""></a>
                    </div><!-- pos-relative -->
                  </div>
                  <h4 class="tx-normal tx-roboto mg-t-60 mg-b-5 tx-inverse"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><span id="nombrePaciente"></span></font></font></h4>
                  <p class="tx-14 mg-b-25"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><span id="otrosDatosPaciente"></span></font></font></p>
                  
                </div><!-- card-body -->
                <div class="card-footer bg-transparent pd-0 bd-gray-200 mg-t-auto">
                  <div class="row no-gutters tx-center">
                    <div class="col pd-y-15">
                      <a href="#" class="tx-24 tx-bold tx-lato d-block tx-gray-800 hover-info"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0.00 </font></font></a>
                      <small class="tx-10 tx-mont tx-uppercase tx-medium"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-money-check-alt"></i> Saldo</font></font></small>
                    </div><!-- col -->
                    <div class="col pd-y-15 bd-l bd-gray-200">
                      <a href="#" class="tx-24 tx-bold tx-lato d-block tx-gray-800 hover-info"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0.00 </font></font></a>
                      <small class="tx-10 tx-mont tx-uppercase tx-medium"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-money-check-alt"></i> Crédito</font></font></small>
                    </div><!-- col -->
                    <div class="col pd-y-15 bd-l bd-gray-200">
                      <a href="#" class="tx-24 tx-bold tx-lato d-block tx-gray-800 hover-info"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0 </font></font></a>
                      <small class="tx-10 tx-mont tx-uppercase tx-medium"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Visitas</font></font></small>
                    </div><!-- col -->
                  </div><!-- row -->
                </div><!-- card-footer -->
              </div><!-- card -->
            </div>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
    </div>
  </div>
  <div class="row row-sm mg-t-20">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card bd-0 shadow-base">

      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link  active" href="#datos_personales" role="tab" data-toggle="tab" aria-selected="true"><i class="far fa-user"></i> Inf.</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#Anamnesis" role="tab" data-toggle="tab" aria-selected="true"><i class="far fa-question-circle"></i> Anamnesis</a>
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
<!--         <li class="nav-item">
          <a class="nav-link" href="#recipes" role="tab" data-toggle="tab"><i class="fas fa-tablets"></i> Recipes / Examenes</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="#Imagenes" role="tab" data-toggle="tab"><i class="far fa-images"></i> Imagenes</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Más opciones</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#recipes"  role="tab" data-toggle="tab"><i class="fas fa-tablets"></i> Recipes</a>
            <a class="dropdown-item" href="#"><i class="fas fa-file-medical-alt"></i> Examenes</a>
            <a class="dropdown-item" href="#"><i class="fas fa-notes-medical"></i> Informes</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Otros</a>
          </div>
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
  
  
</div>
</div>
@include('pdf.modal-recipe')
@include('consultaMedica.modal-Gral')
<!-- @include('consultaMedica.modal-newRecipe') -->

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



