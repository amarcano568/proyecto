@extends('layout')
@section('contenido')
<br>
<div class="br-pagebody mg-t-5 pd-x-30">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card bd-0 shadow-base">
        <div id="config_empresa" class="sub_menu_tab">
        <div class="menu_acciones">
            <button id="btn_nva_sucursal" class="btn btn-link btn_big_circle">
                <i class="pointer_circle"></i>
                <p class="btn_text">Nueva Sucursal</p>
            </button>
        </div>
        <div class="barra_titulo ">
            <h5 id="titulo_sucursal" class="color_dd_title">Datos de Alejandro Marcan S. (Sucursal Principal)</h5>
        </div>
    <form>
      <div class="col-lg-7 ">
        <input type="hidden" id="id_sucursal" value="879">
        
        <div class="form-group" id="empresa_config_group">
            <label for="empresa_config" style="color: #337ab7; font-size: 14px;">Nombre Clínica</label>
            <input type="text" class="form-control input-sm" id="empresa_config" placeholder="Nombre Clínica" value="Alejandro Marcan S.">
        </div>
        
        <div class="form-group margin_row_top">
            <label for="sucursal_config">Nombre Sucursal</label>
            <input type="text" class="form-control input-sm" id="sucursal_config" placeholder="Nombre Sucursal" value="Alejandro Marcan S.">
        </div>
        <div class="form-group margin_row_top">
            <label for="direccion_config">Dirección</label>
            <input type="text" class="form-control input-sm" id="direccion_config" placeholder="Dirección" value="">
        </div>
        <div class="form-group margin_row_top">
            <label for="direccion2_config">Dirección 2</label>
            <input type="text" class="form-control input-sm" id="direccion2_config" placeholder="Dirección 2" value="">
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="fono1_config">Teléfono Principal</label>
                <input type="text" class="form-control input-sm" id="fono1_config" placeholder="Teléfono Principal" value="931299300">
            </div>
            <div class="col-md-6">
                <label for="fono2_config">Teléfono Secundario</label>
                <input type="text" class="form-control input-sm" id="fono2_config" placeholder="Teléfono Secundario" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="contacto_email_config">Correo de Contacto</label>
                <input type="text" class="form-control input-sm" id="contacto_email_config" placeholder="Correo de Contacto" value="amarcano568@hotmail.com">
            </div>
            <div id="config_pagina_web" class="col-md-6">
                <label for="pagina_web_config">Página Web</label>
                <input type="text" class="form-control input-sm" id="pagina_web_config" placeholder="Página Web" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="nombre_corto_config">Nombre corto sucursal</label>
                <input type="text" class="form-control input-sm" id="nombre_corto_config" placeholder="Nombre corto sucursal" value="">
            </div>
            <div class="col-md-6 row_agenda_online">
                <label>¿Agendamiento Online? </label><br>
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-radio btn-success active">
                        <input type="radio" name="agendamiento_online" value="1" checked=""> Activo
                    </label>
                    <label class="btn btn-radio btn-success ">
                        <input type="radio" name="agendamiento_online" value="0"> Inactivo
                    </label>
                </div>
             </div>
        </div>
        <div class="row">
            <div class="form-inline">
                <div class="col-md-6">
                    <label for="sillones_config"># sillones (boxes)</label>
                    <select id="sillones_config" class="form-control input-sm pull-right">
                        <option value="0" selected="">0</option>
                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option>                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-inline">
                <div id="div_seleccione_color" class="col-md-6">
                    <label for="color_sucursal">
                        Color Sucursal                        <i class="glyphicon glyphicon-question-sign color_dd" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Color que aparece en los correos a pacientes."></i>
                    </label>
                    <a id="color_sucursal" class="dropdown-toggle pull-right rectangulo_color clickeable" rel="popover" data-placement="right" style="background-color:#FFF" data-original-title="" title=""></a>
                    <input type="hidden" value="#FFF" class="span3" id="color_seleccionado_sucursal">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="sucursal_config">Enlace de google maps para correos                <i class="glyphicon glyphicon-question-sign color_dd" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Si se define, los correos de confirmación mostrarán el mapa de la sucursal"></i>
            </label>
            <input type="text" class="form-control input-sm" id="sucursal_google_maps_config" placeholder="Enlace Google Maps" value="">
        </div>
    </div>
    <div class="col-lg-4" id="div_logo_empresa">
      <h5>Presiona aquí para ingresar el<br>Logo de tu Clínica</h5>
      <img id="icono_empresa" src="i/logo_big.png" alt="Logo" class="clickeable">
    </div>
    <!-- <div class="col-md-12 acciones_finales">
        <div class="pull-right">
            <button type="button" id="btn_eliminar_config" class="btn btn-default invisible">Eliminar Sucursal</button>
            <button type="button" id="btn_guardar_config" class="btn btn-primary">Guardar</button>
        </div>
    </div> -->
    </form>
</div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')
  <script src="{{ asset('jsApp/configuracion.js') }}"></script>  
@stop