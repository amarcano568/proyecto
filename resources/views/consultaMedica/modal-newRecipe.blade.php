<div class="modal fade" id="modal-newRecipe" tabindex="-1" role="dialog" aria-labelledby="ModalClient">
  <div class="modal-dialog modal-lg" role="document" style="width: 200%">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-prescription-bottle-alt"></i> Nuevo Recipe Médico</font></font></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerca">
        <span aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></span>
        </button>
      </div>
      <div class="modal-body pd-20">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">Medicamento <span class="tx-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></label>
              <div class="clearfix">
                <input class="medicamentos-seeker typeahead form-control" type="text" placeholder="Buscar Medicamento" style="width: 190%" name="medicamento">
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">Indicaciones <span class="tx-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></label>
              <div class="clearfix">
                <input class="form-control" type="text" placeholder="Indicaciones" id="indicaciones" name="indicaciones" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12" >
            <div class="form-group" style="float: right;">
              <div class="icono-action-2">
                <a href="" id="agregarMedicina" idRecipe="'.$recipe->id.'">
                  <i data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Agregar medicamento al recipe." class="text-success fa-2x fas fa-check"></i>
                </a>
                 <!-- <a href="" data-accion="verRecipePdf" idRecipe="'.$recipe->id.'">
                  <i data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Imprimir Recipe." class="text-primary fa-2x fas fa-print"></i>
                </a> -->
              </div>
            </div>
          </div>
          </div><!-- row -->
          <div class="row">
          <div class="col-lg-12" >
            <ul class="list-group" id="listGroupRecipe">

            </ul>
          </div>
          </div><!-- row -->
          <div class="modal-footer">
            <button id="registrarRecipe" type="button" class="btn btn-info tx-size-xs">
            <i class="fas fa-print"></i> Imprimir</button>
            <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-window-close"></i> Cerrar</font></font></button>
          </div>
        </div>
      </div>
      </div><!-- /.modal-dialog -->