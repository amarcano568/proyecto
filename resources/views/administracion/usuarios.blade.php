@extends('layout')
@section('contenido')
<br>
<div class="br-pagebody mg-t-5 pd-x-30">
    <div style="padding: 1em;" class="card bd-0 shadow-base">
        <div id="div_listar_Usuarios">
            <div class="menu_acciones_vacio"></div>
            <div class="barra_titulo margin_bottom">
                <h5 class="text-info"><i class="text-info fas fa-users"></i> Usuarios del Sistema.</h5>
                <hr>
            </div>
            <div class="menu_acciones" style="float: right;">
                <button id="btnNuevoUsuario" class="btn btn-outline-primary btn-oblong bd-2 pd-x-30 pd-y-10 tx-uppercase tx-bold tx-spacing-6 tx-12">
                <i class="fa-2x fas fa-user-plus"></i> Nuevo Usuario
                </button>
            </div>
            <div id="divTableUsuarios">
                <table id="datatable-usuarios" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th >Id</th>
                            <th>Nombre del Usuario</th>
                            <th>Correo</th>
                            <th>Sucursal</th>
                            <th>Status</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="body-usuarios">
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div id="admin_edicion_usuario" class="" style="display: none;">
            <div class="menu_acciones_vacio"></div>
            <div class=" margin_bottom">
                <h5 id="barra_titulo" class="text-info"></h5>
                <hr>
            </div>


              <div class="menu_acciones" style="float: right;">        
                <button type="submit" form="form_register_usuario" class="btn btn-outline-primary btn-oblong bd-2 pd-x-30 pd-y-10 tx-uppercase tx-bold tx-spacing-6 tx-12">
                  <i class="fa-2x far fa-save"></i> Guardar
                </button>
                <br><br>
                <button id="btnCancelarNewUsuario" type="button" formnovalidate="formnovalidate" class="btn btn-outline-danger btn-oblong bd-2 pd-x-30 pd-y-10 tx-uppercase tx-bold tx-spacing-6 tx-12">
                  <i class="fa-2x fas fa-ban"></i> Cancelar
                </button>
              </div>
            <form id="form_register_usuario" class="needs-validation" novalidate  method="post" enctype="multipart/form-data" action="registrar-usuario">
            @csrf
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <a href="">
                        <i class="img-thumbnail fa-6x far fa-user" data-toggle="popover" data-placement="bottom"  title="Foto del Usuario." data-content="Click para agregar foto al usuario." data-trigger="hover"></i>
                        <label>Foto del Usuario</label>
                    </a>
                </div>
                <input type="hidden" name="idUsuario" id="idUsuario" >
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-6  col-md-6 col-sm-12 col-xs-12 form-label-group">
                           <input type="text" id="nombre_usuario" name="nombre_usuario" class="form-control input-sm" placeholder="Nombre" required="">
                            <label for="nombre"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombres</font></font></label>
                        </div>
                        <div class="col-lg-6  col-md-6 col-sm-12 col-xs-12 form-label-group">
                           <input type="text" id="apellido_usuario" name="apellido_usuario" class="form-control input-sm" placeholder="Apellidos" required="">
                            <label for="apellido_usuario"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Apellidos</font></font></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6  col-md-6 col-sm-12 col-xs-12 form-label-group">
                           <input type="email" id="email_usuario" name="email_usuario" class="form-control input-sm" placeholder="correo@ejemplo.com" required="">
                            <label for="email_usuario"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Correo Electrónico</font></font></label>
                        </div>
                        <div class="col-lg-6  col-md-6 col-sm-12 col-xs-12 form-label-group">
                           <input type="text" id="Username" name="Username" class="form-control input-sm" placeholder="Nombre de Usuario" required="">
                            <label for="Username"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Username</font></font></label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <label for="perfil_usuario">
                        Perfil de Usuario <span class="text-danger">*</span>                        
                    </label>
                    <select data-placeholder="Perfil de Usuario..." id="perfil_usuario" name="perfil_usuario"  class="chosen-select custom-select form-control-chosen" required>
                        <option></option>
                                @foreach( $Perfiles as $perfil )
                                    <option value="{{$perfil->id}}">
                                      {{$perfil->nombrePerfil}}
                                    </option>
                                @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Género <span class="text-danger">*</span></label><br>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="masculino" name="radio-genero" value='M' required="">
                        <label class="custom-control-label" for="masculino"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Masculino</font></font></label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="femenino" name="radio-genero" required="" value='F'>
                        <label class="custom-control-label" for="femenino"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Femenino</font></font></label>
                    </div>
                </div>
            </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label for="especialidad_usuario">Especialidad <span class="text-danger">*</span></label>
                            <select  data-placeholder="Especialidad del Usuario..." name="especialidadMedica" id="especialidadMedica"  class="chosen-select form-control form-control-chosen" multiple>
                                <option></option>
                                @foreach( $Especialidades as $especialidad )
                                    <option value="{{$especialidad->id}}">
                                      {{$especialidad->nombre}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="select_clinicas">Sucursales <span class="text-danger">*</span></label>
                            <select data-placeholder="Selecione las sucursales..." name="select_sucursal" id="select_sucursal" class="chosen-select form-control form-control-chosen" required="" multiple="" tabindex="-98">
                                <option></option>
                                @foreach( $Sucursales as $sucursal )
                                    <option value="{{$sucursal->id}}">
                                      {{$sucursal->nombre}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <label for="idioma">Idioma <span class="text-danger">*</span></label>
                            <select id="idioma" name="idioma"  class="chosen-select form-control form-control-chosen">
                                <option value="ES">Español</option>
                                <option value="EN">Inglés</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <label>DNI</label>
                            <input required="" type="text" id="rut_usuario" name="rut_usuario" class="form-control input-sm" placeholder="DNI">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <label>Fecha de Nacimiento</label><br>
                            <input type="date" id="fec_nac_usuario" name="fec_nac_usuario" class="form-control" required="">
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                            <label>Edad</label><br>
                            <input type="text" id="edad_usuario" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Teléfono Fijo</label>
                            <input type="text" id="fonofijo_usuario" name="fonofijo_usuario" class="form-control input-sm" placeholder="Teléfono Fijo">
                        </div>

                        <div class="col-md-6">
                            <label>Teléfono Celular</label>
                            <input type="text" id="fonocell_usuario" name="fonocell_usuario" class="form-control input-sm" placeholder="Teléfono Celular">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <label>Dirección</label>
                            <textarea class="form-control" id="direccion_usuario" name="direccion_usuario" rows="2" cols="100">
                            </textarea>
                        </div>                        
                    </div>
                </form>
                </div>
            </div>
        </div>
@endsection

@section('javascript')
  <script src="{{ asset('jsApp/adminUsuarios.js') }}"></script>  
@stop