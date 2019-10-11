<form id="form_register_paciente" method="post" enctype="multipart/form-data" action="registrar-paciente">
  @csrf
  <div class="modal fade effect-super-scaled" id="modal-paciente" tabindex="-1" role="dialog" aria-labelledby="ModalClient">
    <div class="modal-dialog modal-lg" role="document" style="width: 300%">
      <div class="modal-content tx-size-sm">
        <div class="modal-header pd-x-20">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"><span id="titleModalGral"></span></h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerca">
          <span aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></span>
          </button>
        </div>
        <div class="modal-body pd-20">
          
          <div id="body-modal-paciente">
            
          </div>
          
        </div>
      </div>
    </div>
  </div>
</form>