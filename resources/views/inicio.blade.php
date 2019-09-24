@extends('layout')
@section('contenido')
<div class="d-sm-flex align-items-center pd-y-20 pd-x-30 bg-gray-200">
  <i class="icon ion-ios-home-outline tx-70 lh-0 tx-gray-800"></i>
  <div class="pd-sm-l-20 pd-t-2 mg-t-10 mg-sm-t-0">
    <h4 class="tx-gray-800 mg-b-5">Tablero</h4>
    <p class="mg-b-0">Sistema para el Control de Pacientes Odontológicos.</p>
  </div>
  </div><!-- d-flex -->
  <div class="br-pagebody mg-t-5 pd-x-30">
    <div class="row row-sm">
      <div class="col-sm-6 col-xl-3">
        <div class="bg-info rounded overflow-hidden">
          <div class="pd-x-20 pd-t-20 d-flex align-items-center">
            <i style="color: #ffffff" class="fa-4x fas fa-users"></i>
            <div class="mg-l-20" style="text-align: center;">
              <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Pacientes para Hoy</p>
              <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
            </div>
          </div>
          <div id="ch1" class="ht-50 tr-y-1"></div>
        </div>
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
          <div class="bg-purple rounded overflow-hidden">
            <div class="pd-x-20 pd-t-20 d-flex align-items-center">
              <i style="color: #ffffff"  class="fa-4x fas fa-user-check"></i>
              <div class="mg-l-20">
                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Pacientes Atendidos</p>
                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
              </div>
            </div>
            <div id="ch3" class="ht-50 tr-y-1"></div>
          </div>
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-teal rounded overflow-hidden">
              <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="ion ion-monitor tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">% Unique Visits</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">54.45%</p>
                  <span class="tx-11 tx-roboto tx-white-8">23% average duration</span>
                </div>
              </div>
              <div id="ch2" class="ht-50 tr-y-1"></div>
            </div>
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
              <div class="bg-primary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  <i class="ion ion-clock tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Bounce Rate</p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">32.16%</p>
                    <span class="tx-11 tx-roboto tx-white-8">65.45% on average time</span>
                  </div>
                </div>
                <div id="ch4" class="ht-50 tr-y-1"></div>
              </div>
          </div><!-- col-3 -->
    </div><!-- row -->
<div class="row row-sm mg-t-20">
  <div class="col-lg-8">
    <div class="card bd-0 shadow-base">
      <div class="d-md-flex pd-25">
        <div style="text-align: center;">
          <h6 style="text-align: center;" class="tx-uppercase tx-inverse tx-semibold tx-spacing-1"><i class="fas fa-book"></i> Pacientes con citas para Hoy</h6>
        </div>
        
        </div><!-- d-flex -->
        <div class="pd-l-25 pd-r-15 pd-b-25">
          <table id="datatable-citasHoy" class="table display responsive nowrap">
          <thead>
            <tr>
              <th class="wd-15p">Id</th>
              <th class="wd-15p">Nombre del Paciente</th>
              <th class="wd-20p">Teléfono</th>
              <th class="wd-15p">Hora</th>
              <th class="wd-15p">Turno</th>
              <th class="wd-10p">Opciones</th>
            </tr>
          </thead>
          <tbody id="body-citasHoy">
            
          </tbody>
        </table>
        </div>
      </div><!-- card -->
        
  </div><!-- col-8 -->
  <div style="margin-top: -1.5em;" class="col-lg-4 mg-t-20 mg-lg-t-0" id="notasAhdesivas">
  </div><!-- col-4 -->
</div><!-- row -->
                          @endsection