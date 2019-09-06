<div class="modal fade" id="modal-paciente" tabindex="-1" role="dialog" aria-labelledby="ModalClient">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content tx-size-sm">
        <div class="modal-header pd-x-20">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-portrait"></i> Información del paciente.</font></font></h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerca">
            <span aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></span>
          </button>
        </div>
        <div class="modal-body pd-20">
          <form id="form-register-paciente" class="" method="post" enctype="multipart/form-data" action="registrar-paciente">
          @csrf
            <div class="form-layout form-layout-1" style="padding-bottom: 0">
              <div class="row mg-b-25">
                <input class="form-control" type="text" id="idPaciente" name="idPaciente" style="display: none;">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Nombres: </font></font><span class="tx-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></label>
                    <div class="clearfix">
                      <input class="form-control" type="text" id="nomPaciente" name="nomPaciente" placeholder="Nombres del Paciente">
                    </div>
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Apellidos: </font></font><span class="tx-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></label>
                    <div class="clearfix">
                      <input class="form-control" type="text" name="apePaciente" id="apePaciente" placeholder="Apellidos del Paciente">
                    </div>
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <label class="form-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tipo de Doc.: </font></font><span class="tx-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></label>
                  <div class="form-group input-group mb-3">
                    <div class="input-group-prepend">
                      <button id="TipoDoc" class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Documento</button>
                      <div class="dropdown-menu">
                        <a class="tipDocumento dropdown-item" href="#">D.N.I.</a>
                        <a class="tipDocumento dropdown-item" href="#">C.E.</a>
                        <a class="tipDocumento dropdown-item" href="#">Pasaporte</a>
                      </div>
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with dropdown button" id="nroDocumento" name="nroDocumento">
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4" style="margin-top: -1.5em;">
                  <div class="form-group">
                    <label class="form-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fecha de Nacimiento: </font></font><span class="tx-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                      <input class="form-control" type="date" id="fecNac"  name="fecNac" placeholder="MM/DD/YYYY">
                    </div>                  
                  </div>
                </div><!-- col-4 -->
                 <div class="col-lg-3" style="margin-top: -1.5em;">
                  <div class="form-group">
                    <label class="form-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sexo: </font></font><span class="tx-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></label>
                    <select class="form-control chosen-select" data-placeholder="Sexo" tabindex="-1" aria-hidden="true" id="sexo" name="sexo" required="">
                        <option>
                        </option>
                        <option value="M"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        </font></font>Masculino</option>
                        <option value="F"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Femenino
                        </font></font></option>
                    </select>
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-5" style="margin-top: -1.5em;">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dirección de correo: </font></font><span class="tx-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></label>
                    <div class="clearfix">
                      <input class="form-control" type="email" name="mailPac" id="mailPac" placeholder="Email del Paciente">
                    </div>             
                  </div>
                </div><!-- col-8 -->
                <div class="col-lg-4" style="margin-top: -1.5em;">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">País: </font></font><span class="tx-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></label>
                    <select class="form-control chosen-select" data-placeholder="Seleccione un Pais" tabindex="-1" aria-hidden="true" id="pais" name="pais">
                      <option></option>
                      @foreach( $Paises as $Pais )
                        <option value="{{$Pais->idPaises}}">
                          {{$Pais->nombrePaises}}
                        </option>
                      @endforeach
                      </select>
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4" style="margin-top: -1.5em;">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estados/Provincia: </font></font><span class="tx-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span><span class="text-info" id="espereEstado" style="display: none;"> <i class="fas fa-spinner fa-spin"></i> Espere...</span></label>
                    <select class="form-control chosen-select" data-placeholder="Seleccione un Estado" tabindex="-1" aria-hidden="true" id="estadoProvincia" name="estadoProvincia" >
                      <option></option>
                      @foreach( $Estados_Provincias as $Est_Pro )
                        <option value="{{$Est_Pro->id}}">
                          {{$Est_Pro->nombre}}
                        </option>
                      @endforeach
                      </select>
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-2" style="margin-top: -1.5em;">
                  <div class="form-group">
                    <label class="form-control-label">Telf. fijo:</label>
                    <input class="form-control" type="text" id="telFijo" name="telFijo">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-2" style="margin-top: -1.5em;">
                  <div class="form-group">
                    <label class="form-control-label">Telf. Movil: </label>
                    <input class="form-control" type="text" id="telMovil" name="telMovil">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-12" style="margin-top: -1.5em;">
                  <div class="form-group">
                    <label class="form-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dirección: </font></font><span class="tx-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></label>
                    <div class="clearfix">
                      <textarea rows="3" class="form-control" placeholder="Dirección" id="direccion" name="direccion"></textarea>
                    </div>
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-3" style="margin-top: -1.5em;">
                  <div class="form-group">
                    <label class="form-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tipo de Sangre: </font></font><span class="tx-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></label>
                    <select class="form-control chosen-select" data-placeholder="Tipo de Sangreo" tabindex="-1" aria-hidden="true" id="tipoSangre" name="tipoSangre">
                        <option></option>
                        <option value="O-">O-</option>
                        <option value="O+">O+</option>
                        <option value="A-">A-</option>
                        <option value="A+">A+</option>
                        <option value="B-">B-</option>
                        <option value="B+">B+</option>
                        <option value="AB-">AB-</option>
                        <option value="AB+">AB+</option>
                    </select>
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4" style="margin-top: -1.5em;">
                  <div class="form-group">
                    <label class="form-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Telf. en Caso Emergencia: </font></font><span class="tx-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></label>
                    <input class="form-control" type="text" name="telEmergencia" id="telEmergencia">
                  </div>
                </div><!-- col-4 -->
              </form>
            </div><!-- row -->
          </div>
                </div><!-- modal-body -->
                <div class="modal-footer">
                  <button id="registrar" type="submit" class="btn btn-info tx-size-xs">
                    <i class="fas fa-save"></i> Guardar</button>
                  <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-window-close"></i> Cerrar</font></font></button>
                </div>
              </div>
            </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->