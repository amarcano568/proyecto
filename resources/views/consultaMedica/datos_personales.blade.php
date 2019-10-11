<div style="padding: 1em;">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12- col-xs-12">
            <div class="menu_acciones" style="float: right;padding-right: -1em;margin-top: -2em;padding-bottom: 1em;">
                <button class="btn btn-outline-primary btn-oblong bd-2 pd-x-30 pd-y-10 tx-uppercase tx-bold tx-spacing-6 tx-12" type="submit" id="btnSavePaciente">
                <i class="fa-2x far fa-save"></i> Guardar
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2" style="text-align: center;" >
            <a href="">
                <i class="img-thumbnail fa-6x far fa-user" data-toggle="popover" data-placement="bottom"  title="Foto del paciente." data-content="Click para agregar foto al paciente." data-trigger="hover"></i>
                <label>Foto del Paciente</label>
            </a>
        </div>
        <div class="col-lg-5">
            <input type="text" id="idPaciente" name="idPaciente" class="form-control input-lg" style="display: none;">
            <div class="row">
                <div class="col-lg-12 form-label-group">
                    <input type="text" id="nombre" name="nombre" class="form-control input-lg" placeholder="Nombres" required="">
                    <label for="nombre"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombres</font></font></label>
                </div>
            </div>
            <div class="row form-group margin_row_top">
                <div class="col-lg-12 form-label-group">
                    <input type="text" id="apellido" name="apellido" class="form-control input-lg" placeholder="Apellidos">
                    <label for="apellido"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Apellidos</font></font></label>
                </div>
            </div>
            <div class="row margin_row_top-menos_2">
                <div class="col-lg-12 form-label-group clearfix">
                    <input type="text" id="nroDocumento" name="nroDocumento" class="form-control input-lg" placeholder="DNI">
                    <label for="nroDocumento"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"># Documento</font></font></label>
                </div>
            </div>
            <div class="row margin_row_top">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                    </div>
                    <div class="clearfix">                    
                        <input type="email" id="email" name="email" class="form-control" placeholder="Correo electrónico" style="width: 100%">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="row form-group">
                <div class="col-lg-12 clearfix">
                    <select data-placeholder="Seleccione un profesional" class="form-control chosen-select" id="medicoProfesional" name="medicoProfesional" style="width: 100%">
                        <option value='' selected></option>
                    </select>
                </div>
            </div>
            <p class=" text-danger margin_row_top"><i class="fas fa-ambulance"></i> En caso de emergencia contactar a:</p>
            <div class="row form-group margin_row_top">
                <div class="col-lg-12 clearfix">
                    <div class="form-label-group">
                        <input type="text" id="nombre_contacto" name="nombre_contacto" class="form-control input-sm" placeholder="Nombre" value="">
                        <label for="nombre_contacto"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></label>
                    </div>
                </div>
            </div>
            <div class="row form-group margin_row_top">
                <div class="col-lg-12 clearfix">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" id="fono_contacto" name="fono_contacto" class="form-control input-sm" placeholder="Teléfono" value="">
                    </div>
                </div>
            </div>
            <div class="row form-group margin_row_top">
                <div class="col-lg-12 clearfix">
                    <div class="form-label-group">
                        <input type="text" id="relacion" name="relacion" class="form-control input-sm" placeholder="Parentesco" value="">
                        <label for="relacion"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Parentesco</font></font></label>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7">
            <div class="row"  style="margin-top: -4em;">
                <div class="col-lg-6 form-group">
                    <label class="form-control-label">Fecha de Nacimiento:<span class="tx-danger">*</span></label>
                    <div class="clearfix margin_row_top2">
                        <input class="form-control" type="date" name="fec_nacimiento" id="fec_nacimiento">
                    </div>
                </div>
                <div class="col-lg-6 form-group">
                    <label class="form-control-label">genero:<span class="tx-danger">*</span></label>
                    <div class="clearfix">
                        <label class="radio-inline">
                            <input type="radio" id="genero_1" name="genero" value="M" checked=""> Masculino                    </label>
                            <label class="radio-inline">
                                <input type="radio" id="genero_0" name="genero" value="F"> Femenino                    </label>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row margin_row_top">
                        <div class="col-lg-6 form-group">
                            <label class="form-control-label">Nacionalidad:<span class="tx-danger">*</span></label>
                            <div class="clearfix margin_row_top2">
                                @include('consultaMedica.nacionalidad')
                            </div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="form-control-label">Idioma:<span class="tx-danger">*</span></label>
                            <div class="clearfix margin_row_top2">
                                <select id="idioma" name="idioma" class="chosen-select form-control form-control-chosen" >
                                    <option value="ES" selected="">Español</option>
                                    <option value="EN">Inglés</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row margin_row_top">
                        <div class="col-lg-6 form-group">
                            <div class="clearfix input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" id="fonofijo" name="fonofijo" class="form-control input-sm" placeholder="Teléfono Fijo" value="">
                            </div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <div class="clearfix input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-mobile-alt"></i></span>
                                </div>
                                <input type="text" id="fonoMovil" name="fonoMovil" class="form-control input-sm" placeholder="Teléfono Movil" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row margin_row_top">
                        <div class="col-lg-12 form-group">
                            <label class="form-control-label">Dirección:<span class="tx-danger">*</span></label>
                            <div class="clearfix margin_row_top2">
                                <textarea rows="4" cols="50" name="direccion" id="direccion" class="form-control">
                                </textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row margin_row_top">
                        <div class="col-lg-12 form-label-group">
                            <input type="text" id="ocupacion" name="ocupacion" class="form-control input-sm" placeholder="Ocupación" value="">
                            <label for="ocupacion"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ocupación</font></font></label>
                        </div>
                    </div>
                    <div class="row margin_row_top">
                        <div class="col-lg-8 form-group">
                            <div class="clearfix">
                                <select  data-placeholder="Seleccione un Convenio..." class="chosen-select form-control" id="convenio" name="convenio">
                                    <option></option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-percent"></i></span>
                                </div>
                                <input readonly="" type="text" class="form-control" aria-describedby="basic-addon1" id="porcConvenio" name="porcConvenio">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 form-group" style="margin-top: -2em;">
                            <div class="clearfix">
                                <textarea class="form-control input-sm resize_vertical" name="convenio_notas" id="convenio_notas" placeholder="Notas del Convenio" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="row" style="margin-top: -2em;">
                        <div class="col-lg-12 form-group">
                            <p>Responsable de Pago:&emsp;<i class="text-info fas fa-info" data-toggle="popover" data-placement="bottom"  title="Responsable de Pago." data-content="En caso de existir un Responsable de Pago, es quien firma en los presupuestos." data-trigger="hover"></i></p>
                            <div class="margin_row_top form-label-group">
                                <input type="text" class="form-control input-sm" placeholder="Nombre" id="nombre_resp" name="nombre_resp" value="">
                                <label for="nombre_resp"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></label>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: -2em;">
                        <div class="col-lg-12 form-group">
                            <p>Notas del Paciente: </p>
                            <div class="clearfix margin_row_top">
                                <textarea class="form-control input-sm resize_vertical" name="convenio_notas" id="convenio_notas" placeholder="Notas del Paciente" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
