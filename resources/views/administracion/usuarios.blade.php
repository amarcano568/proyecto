@extends('layout')
@section('contenido')
<br>
<div class="br-pagebody mg-t-5 pd-x-30">
    <div style="padding: 1em;" class="card bd-0 shadow-base">
        <div id="admin_edicion_usuario" class="">
            <div class="menu_acciones_vacio"></div>
            <div class="barra_titulo margin_bottom">
                <h5 class="text-info"><i class="fas fa-user-plus"></i> Nuevo Usuario</h5>
                <hr>
            </div>

              <div class="menu_acciones" style="float: right;">        
                <button class="btn btn-outline-primary btn-oblong bd-2 pd-x-30 pd-y-10 tx-uppercase tx-bold tx-spacing-6 tx-12">
                  <i class="fa-2x far fa-save"></i> Guardar
                </button>
              </div>

            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <a href="">
                        <i class="img-thumbnail fa-6x far fa-user" data-toggle="popover" data-placement="bottom"  title="Foto del Usuario." data-content="Click para agregar foto al usuario." data-trigger="hover"></i>
                        <label>Foto del Usuario</label>
                    </a>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-6  col-md-6 col-sm-12 col-xs-12 form-label-group">
                           <input type="text" id="nombre_usuario" class="form-control input-sm" placeholder="Nombre" required="">
                            <label for="nombre"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombres</font></font></label>
                        </div>
                        <div class="col-lg-6  col-md-6 col-sm-12 col-xs-12 form-label-group">
                           <input type="text" id="apellido_usuario" class="form-control input-sm" placeholder="Apellidos" required="">
                            <label for="apellido_usuario"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Apellidos</font></font></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6  col-md-6 col-sm-12 col-xs-12 form-label-group">
                           <input type="email" id="email_usuario" class="form-control input-sm" placeholder="correo@ejemplo.com" required="">
                            <label for="email_usuario"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Correo Electrónico</font></font></label>
                        </div>
                        <div class="col-lg-6  col-md-6 col-sm-12 col-xs-12 form-label-group">
                           <input type="text" id="Username" class="form-control input-sm" placeholder="Nombre de Usuario" required="">
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
                    <select data-placeholder="Perfil de Usuario..." id="perfil_usuario"  class="chosen-select form-control form-control-chosen" required="">
                        <option value="" ></option>
                        <option value="1">Administrador Gr.</option>
                        <option value="2">Profesional Doctor</option>
                        <option value="3">Secretaria/Recepción</option>
                        <option value="4">Profesional Doctor Administrador Gr.</option>
                        <option value="5">Administrador Sucursal</option>
                        <option value="6">Asistente</option>
                        <option value="8">Profesional o Técnico (No Doctor)</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Género <span class="text-danger">*</span></label><br>
                    <label class="radio-inline">
                        <input type="radio" id="genero_m" name="genero" value="M"> Masculino
                    </label>
                    <label class="radio-inline">
                            <input type="radio" id="genero_f" name="genero" value="F"> Femenino
                    </label>
                </div>
            </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label for="especialidad_usuario">Especialidad <span class="text-danger">*</span></label>
                            <select data-placeholder="Especialidad del Usuario..." id="perfil_usuario"  class="chosen-select form-control form-control-chosen" id="especialidad_usuario" multiple>
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
                            <select data-placeholder="Selecione las sucursales..." id="select_clinicas" class="chosen-select form-control form-control-chosen" data-live-search="true" title="Sucursales" required="" multiple="" tabindex="-98">
                                <option value="879">Sucursal 1</option>
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
                            <input type="text" id="rut_usuario" class="form-control input-sm" placeholder="DNI">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <label>Fecha de Nacimiento</label><br>
                            <input type="date" id="fec_nac_usuario" class="form-control">
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                            <label>Edad</label><br>
                            <input type="text" id="edad_usuario" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Teléfono Fijo</label>
                            <input type="text" id="fonofijo_usuario" class="form-control input-sm" placeholder="+51 912 345 678">
                        </div>
                        <div class="col-md-6">
                            <label>Teléfono Celular</label>
                            <input type="text" id="fonocell_usuario" class="form-control input-sm" placeholder="+51 912 345 678">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Dirección</label>
                            <input type="text" id="direccion_usuario" class="form-control input-sm" placeholder="Dirección">
                        </div>
                        <div class="col-md-6">
                            <label>Dirección 2</label>
                            <input type="text" id="direccion2_usuario" class="form-control input-sm" placeholder="Dirección 2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('javascript')
  <script src="{{ asset('jsApp/adminUsuarios.js') }}"></script>  
@stop