@extends('layout')
@section('contenido')
<br>
<div class="br-pagebody mg-t-5 pd-x-30">
    <div style="padding: 1em;" class="card bd-0 shadow-base">
        <div id="div_listar_Convenios">
            <div class="menu_acciones_vacio"></div>
            <div class="barra_titulo margin_bottom">
                <h5 class="text-info"><i class="fas fa-certificate"></i> Convenios.</h5>
                <hr>
            </div>
            <div class="menu_acciones" style="float: right;">
                <button id="btnNuevoConvenio" class="btn btn-outline-primary btn-oblong bd-2 pd-x-30 pd-y-10 tx-uppercase tx-bold tx-spacing-6 tx-12">
                <i class="fa-2x far fa-file-alt"></i> Nuevo convenio
                </button>
            </div>
            <div id="divTableConvenios">
                <table id="datatable-convenios" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">Id</th>
                            <th class="wd-15p">Nombre del Covenio</th>
                            <th class="wd-20p">% Descuento</th>
                            <th class="wd-15p">Responsable</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-10p">Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="body-convenios">
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div id="admin_edicion_Convenios" style="display: none;">
            <div class="menu_acciones_vacio"></div>
            <div class="barra_titulo margin_bottom">
                <h5 id="text_titulo" class="text-info"> </h5>
                <hr>
            </div>

            <div id="divNuevoConvenio">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="form-layout form-layout-4">
                    <form id="form_register_Convenio" class="needs-validation" novalidate method="post" enctype="multipart/form-data" action="registrar-Convenio">
                        @csrf
                        <div class="row">
                          <label class="col-sm-4 form-control-label">Id: <span class="tx-danger">*</span></label>
                          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Id Convenio" id="idConvenio" name="idConvenio" readonly>
                          </div>
                        </div><!-- row -->
                        <div class="row mg-t-20 form-group">
                          <label class="col-sm-4 form-control-label">Nombre: <span class="tx-danger">*</span></label>
                          <div class="clearfix col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Descripción del Convenio" id="nomConvenio" name="nomConvenio" required>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12 col-md-12 col-sm-12- col-xs-12">
                            <label for="formControlRange">Descuento (%)</label>
                              <input type="text" id="porcDscto" name="porcDscto" value="0" />
                          </div>
                        </div>
           
                        <div class="row mg-t-20 form-group">
                          <label class="col-sm-4 form-control-label">Resposable: <span class="tx-danger">*</span></label>
                          <div class="clearfix col-sm-8 mg-t-10 mg-sm-t-0">
                            <select data-placeholder="Responsable del convenio..." id="responsable" name="responsable"  class="chosen-select custom-select form-control-chosen" required>
                                  <option></option>
                                          @foreach( $Responsables as $responsable )
                                              <option value="{{$responsable->id}}">
                                                {{$responsable->name.' '.$responsable->lastName}}
                                              </option>
                                          @endforeach
                              </select>
                          </div>
                        </div>
                        <div class="row mg-t-20 form-group">
                          <label class="col-sm-4 form-control-label">Notas: <span class="tx-danger">*</span></label>
                          <div class="clearfix col-sm-8 mg-t-10 mg-sm-t-0">
                            <textarea id="notas" name="notas" rows="2" cols="50"></textarea>
                          </div>
                        </div>
                       <div class="row mg-t-20">
                          <label class="col-sm-4 form-control-label">Status: <span class="tx-danger">*</span></label>
                          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <div class="switch-wrapper">
                                <input type="checkbox" id="status" name="status" checked>
                            </div>
                          </div>
                        </div>

                        <div class="form-layout-footer mg-t-30">
                          <button id="btnGuardarConvenio" type="submit" class="btn btn-info">Guardar Convenio</button>
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
  <script src="{{ asset('jsApp/adminConvenios.js')}}"></script>  
@stop