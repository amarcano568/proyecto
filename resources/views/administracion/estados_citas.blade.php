@extends('layout')
@section('contenido')
<br>
<div class="br-pagebody mg-t-5 pd-x-30">
    <div style="padding: 1em;" class="card bd-0 shadow-base">
        <div id="div_listar_Estados">
            <div class="menu_acciones_vacio"></div>
            <div class="barra_titulo margin_bottom">
                <h5 class="text-info"><i class="fas fa-certificate"></i> Estados de la citas.</h5>
                <hr>
            </div>
            <div class="menu_acciones" style="float: right;">
                <button id="btnNuevoEstado" class="btn btn-outline-primary btn-oblong bd-2 pd-x-30 pd-y-10 tx-uppercase tx-bold tx-spacing-6 tx-12">
                <i class="fa-2x far fa-file-alt"></i> Nuevo estado
                </button>
            </div>
            <div id="divTableEstados">
                <table id="datatable-estados" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">Id</th>
                            <th class="wd-15p">Icono</th>
                            <th class="wd-20p">Nombre del Estado</th>
                            <th class="wd-15p"><i class="far fa-envelope"></i> Envía Mail de Confirmación de Citas</th>
                            <th class="wd-10p">Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="body-estados">
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div id="admin_edicion_Estados" style="display: none;">
            <div class="menu_acciones_vacio"></div>
            <div class="barra_titulo margin_bottom">
                <h5 id="text_titulo" class="text-info"> </h5>
                <hr>
            </div>

            <div id="divNuevoestado">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="form-layout form-layout-4">
                    <form id="form_register_estado" class="needs-validation" novalidate method="post" enctype="multipart/form-data" action="registrar-estado">
                        @csrf
                        <div class="row">
                          <label class="col-sm-4 form-control-label">Id: <span class="tx-danger">*</span></label>
                          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Id estado" id="idEstado" name="idEstado" readonly>
                          </div>
                        </div><!-- row -->
                        <div class="row mg-t-20 form-group">
                          <label class="col-sm-4 form-control-label">Nombre: <span class="tx-danger">*</span></label>
                          <div class="clearfix col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Descripción del estado" id="nomEstado" name="nomEstado" required>
                          </div>
                        </div>


                        <div class="row mg-t-20">
                          <label class="col-sm-4 form-control-label">Envía email: <span class="tx-danger">*</span></label>
                          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <div class="switch-wrapper">
                                <input type="checkbox" id="enviaEmail" name="enviaEmail" checked>
                            </div>
                          </div>
                        </div>

                        <div class="row mg-t-20">
                          <label class="col-sm-4 form-control-label">Icono: <span class="tx-danger">*</span></label>
                          <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                            <select id="iconos" name="iconos" style="font-size: 25px;" class="fas fa far">
                                <option value='<i class="text-success fas fa-phone"></i>' class="text-success fas">&#xf095;</option>
                                <option value='<i class="text-danger fas fa-phone"></i>' class="text-danger fas">&#xf095;</option>
                                <option value='<i class="text-success fas fa-check-circle"></i>' class="text-success">&#xf058;</option>
                                <option value="<i class='text-success fas fa-minus-circle'></i>" class="text-success fas">&#xf056;</option>
                                <option value="<i class='text-danger fas fa-minus-circle'></i>" class="text-danger fas">&#xf056;</option>
                                <option value='<i class="text-success fas fa-envelope-open-text"></i>' class="text-success fas">&#xf658;</option>
                                <option value='<i class="text-danger fas fa-envelope-open-text"></i>' class="text-danger fas">&#xf0e0;</option>
                                <option value='<i class="text-success fas fa-star"></i>' class="text-success">&#xf005;</option>
                            </select>
                          </div>
                          <div class="col-lg-1"></div>
                          <div style="padding: 0;" id="previewIcon" class="fa-3x col-lg-1 col-md-1 col-sm-12 col-xs-12 img-thumbnail" >
                              
                          </div>
                        </div>

                        <div class="form-layout-footer mg-t-30">
                          <button id="btnGuardarEstado" type="submit" class="btn btn-info">Guardar estado</button>
                          <button type="button" id="btnCancelar" class="btn btn-secondary">Cancelar</button>
                        </div><!-- form-layout-footer -->
                    </form>
                    </div><!-- form-layout -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
  <script src="{{ asset('jsApp/adminEstadosCitas.js')}}"></script>  
@stop