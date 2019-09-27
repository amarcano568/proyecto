@extends('layout')
@section('contenido')
<br>
<div class="br-pagebody mg-t-5 pd-x-30">
  <div style="padding: 1em;" class="card bd-0 shadow-base">
    <div id="config_empresa" class="sub_menu_tab">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12- col-xs-12">
          <div class="barra_titulo">
            <div class="input-group input-group-sm">
              <div class="input-group-btn">
                <button class="btn btn-info btn-sm" type="button" id="btnNuevaSucursal">
                  <i class="fas fa-plus"></i> Nueva Sucursal
                </button>
              </div>
              <select id="sucursales" class="form-control " >
                @foreach( $Sucursales as $sucursal )
                  <option value="{{$sucursal->id}}">
                    {{$sucursal->nombre}}
                  </option>
                @endforeach
              </select>
            </div>

          </div>          
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12- col-xs-12">
          <div class="menu_acciones" style="float: right;">        
            <button class="btn btn-outline-primary btn-oblong bd-2 pd-x-30 pd-y-10 tx-uppercase tx-bold tx-spacing-6 tx-12" type="submit" form="formConfigEmpresa">
              <i class="fa-2x far fa-save"></i> Guardar
            </button>
          </div>
        </div>
      </div>
      <br>
      <form id="formConfigEmpresa" method="post" enctype="multipart/form-data" action="registrar-empresa">
        @csrf
        <div class="row">
          <div class="col-lg-7 ">
            <input type="hidden" id="id_sucursal" name="id_sucursal" >
            <div class="form-group " id="empresa_config_group">
                <div class="form-label-group">       
                    <input type="text" class="form-control input-sm" id="nombre_clinica" name="nombre_clinica" placeholder="Nombre de la Clínica" style="border: 1px solid #7FB3D5;background-color: #EAF2F8;">
                    <label for="nombre_clinica"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre de la Clínica</font></font></label>
                </div>
            </div>
            <div class="form-group margin_row_top">
              <div class="form-label-group">
                    <input type="text" class="form-control input-sm" id="sucursal_config" name="sucursal_config" placeholder="Nombre Sucursal">
                    <label for="sucursal_config"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre Sucursal</font></font></label>
                </div>
            </div>
            <div class="row margin_row_top">
            <div class="col-lg-6">
              <div class="form-label-group">
                <input type="text" class="form-control input-sm" id="nroDocFiscal" name="nroDocFiscal" placeholder="# Documento fiscal">
                <label for="nroDocFiscal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"># Documento fiscal</font></font></label>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-label-group">
                <input type="text" class="form-control input-sm" id="nombre_corto_config" name="nombre_corto_config" placeholder="Nombre corto sucursal" value="">
                <label for="Nombre corto sucursal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre corto sucursal</font></font></label>
              </div>
            </div>
            </div>
       
            <div class="row  margin_row_top">
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <label for="direccion">Dirección</label>
                  <div class="clearfix">
                      <textarea class="form-control" rows="3" cols="100" id="direccion" name="direccion" style="width: 100%"></textarea>  
                  </div>

              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="fono1_config">Teléfono Principal</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" class="form-control input-sm" name="fono1_config" id="fono1_config" placeholder="Teléfono Principal" value="">
                </div>
              </div>
              <div class="col-md-6">
                <label for="fono1_config">Teléfono Secundario</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" class="form-control input-sm" id="fono2_config" name="fono2_config" placeholder="Teléfono Secundario" value="">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group">
                <label for="fono1_config">Correo de contacto</label>
                <div class="input-group clearfix">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                  </div>                  
                  <input type="email" class="form-control input-sm" id="email" name="email" placeholder="Email contacto" value="">

                </div>
              </div>
              <div class="col-md-6">
                <label for="pagina_web_config">Página Web</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fab fa-internet-explorer"></i></span>
                  </div>
                  <input type="text" class="form-control input-sm" id="pagina_web_config" name="pagina_web_config" placeholder="Página Web" value="">
                </div>
              </div>              
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
  <script src="{{ asset('jsApp/configEmpresa.js') }}"></script>  
@stop