<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="form-layout form-layout-4">
			<div id="wizard4" class="">				
				  	<h3>- Información <i class="fas fa-info"></i></h3>
				  	<section>
				  		<form id="formBasic">
							<div class="row">
								<label class="col-sm-4 form-control-label">Titulo: <span class="tx-danger">*</span></label>
								<div class="col-sm-8 mg-t-10 mg-sm-t-0">
									<input type="text" class="form-control" placeholder="Titulo" id="tituloImg" name="tituloImg" required="">
								</div>
							</div><!-- row -->
							<div class="row mg-t-20 form-group">
								<label class="col-sm-4 form-control-label">Descripción: <span class="tx-danger">*</span></label>
								<div class="clearfix col-sm-8 mg-t-10 mg-sm-t-0">						
									<textarea rows="4" cols="50"  class="form-control" placeholder="Descripción de la Imagen" id="descripcionImg" name="descripcionImg" required=""></textarea>
								</div>
							</div>
						</form>
				  	</section>
			  	
			  <h3>- Subir Imagen <i class="fas fa-cloud-upload-alt"></i></h3>
			  <section>
			    <form action='subir-imagen' method='POST' files='true' enctype='multipart/form-data' id='dZUploadImagen' class='dropzone borde-dropzone' style='height:12em;width: 100%;padding: 0;cursor: pointer;'>
            		<div style='padding: 0;margin-top: 0em;' class='dz-default dz-message text-center'>      <h1><i class="far fa-images"></i><br><h6>Click para agregar Imagen.</h6> </h1>
            		</div>
            	</form>
			  </section>
 
			</div>

			<div class="form-layout-footer mg-t-30" style="float: right;">
				<br><br>
				<button type="submit" id="btnSubirImagen" class="btn btn-info" style="display: none;"><i class="fas fa-cloud-upload-alt"></i> Subir imagen</button>
				<button type="button" id="btnCancelar" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

			</div>
		</div><!-- form-layout -->
	</div>
</div>
