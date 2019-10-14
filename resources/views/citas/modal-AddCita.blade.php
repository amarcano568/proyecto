<form id="formCitas" method="post" enctype="multipart/form-data" action="registrar-cita">
  @csrf
  <div class="modal fade effect-super-scaled" id="modal-citaAdd" tabindex="-1" role="dialog" aria-labelledby="ModalClient">
    <div class="modal-dialog modal-lg" role="document" style="width: 100%">
      <div class="modal-content tx-size-sm">
        <div class="modal-header pd-x-20">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold" id="titleModalGral"><i class="menu-item-icon tx-18 fas fa-book"></i> Agregar cita a Paciente.</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerca">
          <span aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></span>
          </button>
        </div>
        <div class="modal-body pd-20">
          <div id="bodyModalGral">
            <div class="row">
              <label class="col-lg-3 col-sm-4 form-control-label">Dia de la cita:</label>
              <div class="col-lg-3 col-sm-5 mg-t-10 mg-sm-t-0">
                <input type="date" class="form-control"  id="fechaCita" name="fechaCita">
              </div>
            </div>
            <br>
            <div class="row">
              <label class="col-lg-3 col-sm-12 form-control-label">Hora:</label>
              <div class="col-lg-9 mg-t-10 mg-sm-t-0">
                @foreach( $HorasCitas as $hora )
                <span class="badge badge-success"><i class="far fa-clock"></i> {{$hora['hora']}}</span>
                @endforeach
              </div>
            </div>
            <br>
            <div class="row">
              <label class="col-lg-3 col-sm-4 form-control-label">Paciente:</label>
              <div class="col-lg-9 col-sm-8 mg-t-10 mg-sm-t-0">
                <select  data-placeholder="Seleccione un paciente..." class="chosen-select form-control" id="chosenPacientes" name="chosenPacientes">
                  <option></option>
                  @foreach( $Pacientes as $pac )
                  <option value="{{$pac->idpacientes}}">
                    {{$pac->Nombres. ' ' . $pac->Apellidos}}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
            <br>
            <div class="row">
              <label class="col-lg-3 col-sm-4 form-control-label">Médico:</label>
              <div class="col-lg-9 col-sm-8 mg-t-10 mg-sm-t-0">
                <select  data-placeholder="Seleccione un médico..." class="chosen-select form-control" id="chosenMedico" name="chosenMedico">
                  <option></option>
                  @foreach( $medicos as $medico )
                  <option value="{{$medico->id}}">
                    {{$medico->name. ' ' . $medico->lastName}}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
            <br>
            <div class="row">
              <label class="col-lg-3 col-sm-4 form-control-label">Nota:</label>
              <div class="col-lg-9 col-sm-8 mg-t-10 mg-sm-t-0">
                <textarea rows="4" cols="50"  class="form-control" placeholder="Nota para la proxima cita" id="notas" name="notas" ></textarea>
              </div>
            </div>
            <br>
            <div class="modal-footer">
              <button id="registrarCita" type="submit" class="btn btn-info tx-size-xs">
              <i class="fas fa-save"></i> Guardar</button>
              <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-window-close"></i> Cerrar</font></font></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>