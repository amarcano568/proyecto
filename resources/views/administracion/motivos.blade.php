@extends('layout')
@section('contenido')
<br>
<div class="br-pagebody mg-t-5 pd-x-30">
    <div style="padding: 1em;" class="card bd-0 shadow-base">
        <div id="div_listar_motivos">
            <div class="menu_acciones_vacio"></div>
            <div class="barra_titulo margin_bottom">
                <h5 class="text-info"><i class="fas fa-certificate"></i> Motivos de las Consultas</h5>
                <hr>
            </div>
            <div class="menu_acciones" style="float: right;">
                <button id="btnNuevoMotivo" class="btn btn-outline-primary btn-oblong bd-2 pd-x-30 pd-y-10 tx-uppercase tx-bold tx-spacing-6 tx-12">
                <i class="fa-2x far fa-file-alt"></i> Nuevo motivo
                </button>
            </div>
            <div id="divTableMotivos">
                <table id="datatable-motivos" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">Id</th>
                            <th class="wd-15p">Nombre</th>
                            <th class="wd-20p"><i class="fas fa-hourglass-start"></i> Tiempo</th>
                            <th class="wd-15p"><i class="fas fa-book"></i> Agenda</th>
                            <th class="wd-10p">Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="body-motivos">
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div id="admin_edicion_motivos" style="display: none;">
            <div class="menu_acciones_vacio"></div>
            <div class="barra_titulo margin_bottom">
                <h5 id="text_titulo" class="text-info"> </h5>
                <hr>
            </div>

            <div id="divNuevoMotivo">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="form-layout form-layout-4">
                    <form id="form_register_motivo" class="" method="post" enctype="multipart/form-data" action="registrar-motivo">
                        @csrf
                        <div class="row">
                          <label class="col-sm-4 form-control-label">Id: <span class="tx-danger">*</span></label>
                          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Id motivo" id="idMotivo" name="idMotivo" readonly>
                          </div>
                        </div><!-- row -->
                        <div class="row mg-t-20 form-group">
                          <label class="col-sm-4 form-control-label">Nombre: <span class="tx-danger">*</span></label>
                          <div class="clearfix col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Descripción del motivo" id="nomMotivo" name="nomMotivo">
                          </div>
                        </div>
                        <div class="row mg-t-20">
                            <label for="formControlRange">Tiempo Aproximado duración</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" id="tiempo" name="tiempo" value="15" />
                            </div>                            
                        </div>
                        <div class="row mg-t-20">
                          <label class="col-sm-4 form-control-label">Aparece en agenda: <span class="tx-danger">*</span></label>
                          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <div class="switch-wrapper">
                                <input type="checkbox" id="agenda" name="agenda" checked>
                            </div>
                          </div>
                        </div>
                        <div class="form-layout-footer mg-t-30">
                          <button type="submit" class="btn btn-info">Guardar Motivo</button>
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
  <script src="{{ asset('jsApp/adminMotivos.js')}}"></script>  
@stop