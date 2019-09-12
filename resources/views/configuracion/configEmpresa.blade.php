@extends('layout')
@section('contenido')
<br>
<div class="br-pagebody mg-t-5 pd-x-30">
  <div style="padding: 1em;" class="card bd-0 shadow-base">
    <div id="config_empresa" class="sub_menu_tab">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12- col-xs-12">
          <div class="barra_titulo ">
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
              <button type="button" class="btn btn-secondary"><i class="fas fa-plus"></i></button>
              <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sucursales
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                  <a class="dropdown-item" href="#">Sucursal 1</a>
                  <a class="dropdown-item" href="#">Sucursal 2</a>
                </div>
              </div>
            </div>
          </div>          
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12- col-xs-12">
          <div class="menu_acciones" style="float: right;">        
            <button class="btn btn-outline-primary btn-oblong bd-2 pd-x-30 pd-y-10 tx-uppercase tx-bold tx-spacing-6 tx-12">
              <i class="fa-2x far fa-save"></i> Guardar
            </button>
          </div>
        </div>
      </div>
      <br>
      <form>
        <div class="row">
          <div class="col-lg-7 ">
            <input type="hidden" id="id_sucursal" value="">
            <div class="form-group" id="empresa_config_group">
                <div class="form-label-group">
                    <input type="text" class="form-control input-sm" id="nombre_clinica" placeholder="Nombre de la Clínica" style="border: 1px solid #7FB3D5;background-color: #EAF2F8;">
                    <label for="nombre_clinica"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre de la Clínica</font></font></label>
                </div>
            </div>
            <div class="row margin_row_top">
            <div class="col-lg-6">
              <div class="form-label-group">
                <input type="text" class="form-control input-sm" id="nroDocFiscal" placeholder="# Documento fiscal">
                <label for="nroDocFiscal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"># Documento fiscal</font></font></label>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-label-group">
                <input type="text" class="form-control input-sm" id="nombre_corto_config" placeholder="Nombre corto sucursal" value="">
                <label for="Nombre corto sucursal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre corto sucursal</font></font></label>
              </div>
            </div>
            </div>
            <div class="form-group margin_row_top">
              <div class="form-label-group">
                    <input type="text" class="form-control input-sm" id="sucursal_config" placeholder="Nombre Sucursal">
                    <label for="sucursal_config"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre Sucursal</font></font></label>
                </div>
            </div>
            <div class="form-group margin_row_top">
              <label for="direccion_config">Dirección</label>
               <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-signs"></i></span>
                  </div>
                  <input type="text" class="form-control input-sm" id="direccion1" placeholder="Dirección" value="">
                </div>
            </div>
            <div class="form-group margin_row_top">
              <label for="direccion2_config">Dirección 2</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-signs"></i></span>
                  </div>
                  <input type="text" class="form-control input-sm" id="direccion2" placeholder="Dirección 2" value="">
                </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="fono1_config">Teléfono Principal</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" class="form-control input-sm" id="fono1_config" placeholder="Teléfono Principal" value="">
                </div>
              </div>
              <div class="col-md-6">
                <label for="fono1_config">Teléfono Secundario</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" class="form-control input-sm" id="fono2_config" placeholder="Teléfono Secundario" value="">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="fono1_config">Correo de contacto</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                  </div>
                  <input type="email" class="form-control input-sm" id="email" placeholder="Email contacto" value="">
                </div>
              </div>
              <div id="config_pagina_web" class="col-md-6">
                <label for="pagina_web_config">Página Web</label>
                <input type="text" class="form-control input-sm" id="pagina_web_config" placeholder="Página Web" value="">
              </div>
            </div>
            <div class="row">
              
              <!-- <div class="col-md-6 row_agenda_online">
                <label>¿Agendamiento Online? </label><br>
                <div class="btn-group" data-toggle="buttons">
                  <label class="btn btn-radio btn-success active">
                    <input type="radio" name="agendamiento_online" value="1" checked=""> Activo
                  </label>
                  <label class="btn btn-radio btn-success ">
                    <input type="radio" name="agendamiento_online" value="0"> Inactivo
                  </label>
                </div>
              </div> -->
            </div>
            

            </div>
            <div class="col-lg-4">              
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12- col-xs-12">
                  <label for="formControlRange"># sillones (boxes)</label>
                    <input type="text" id="sillones" name="sillones" value="0" />
                </div>
              </div>
              <br><br>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12- col-xs-12 img-thumbnail" style="text-align: center;">
                  <h6>Presiona aquí para agregar el Logo.</h6>
                  <a href="">            
                      <i class="img-thumbnail fa-10x far fa-hospital" data-toggle="popover" data-placement="bottom"  title="Logo." data-content="Click para agregar el logo de tu Clínica." data-trigger="hover"></i>
                      <br>
                      <label>Logo de tu Clínica</label>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@section('javascript')
  <script src="{{ asset('jsApp/configuracion.js') }}"></script>  
@stop