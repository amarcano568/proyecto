<div class="row" style="float: right;padding: 0.5em 1.5em 0.5em;">
	<button id="btnNuevaImagen" class="btn btn-outline-primary btn-oblong bd-2 pd-x-30 pd-y-10 tx-uppercase tx-bold tx-spacing-6 tx-12" >
	<i class="fa-2x far fa-image"></i> Subir nueva Imagen
	</button>
</div>
<br>
<section id="galeria-imagenes" class="gallery-block cards-gallery">
	<div class="container">		
		<div class="row" id="galeriaImagenes">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
				<i class="text-info fa-5x fas fa-spinner fa-pulse"></i> Espere cargando las imagenes del paciente...
			</div>
		</div>
	</div>
</section>

<div id="cargar-imagenes" style="display: none;padding: 1em;">
	<div class="">
		<h5 id="text_titulo" class="text-info"> <i class="text-info far fa-image"></i> Agregar Nueva Imagen </h5>
		<hr>
	</div>
	<div id="divNuevoMotivo">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
			<div class="form-layout form-layout-4">
				<form id="form_register_motivo" class="" method="post" enctype="multipart/form-data" action="registrar-motivo">
					@csrf
					<div class="row">
		                <div  id="formDropZone" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ></div>
		            </div>
		            <br>
					<div class="row">
						<label class="col-sm-4 form-control-label">Titulo: <span class="tx-danger">*</span></label>
						<div class="col-sm-8 mg-t-10 mg-sm-t-0">
							<input type="text" class="form-control" placeholder="Titulo" id="titulo" name="titulo" >
						</div>
						</div><!-- row -->
						<div class="row mg-t-20 form-group">
							<label class="col-sm-4 form-control-label">Descripción: <span class="tx-danger">*</span></label>
							<div class="clearfix col-sm-8 mg-t-10 mg-sm-t-0">
								<input type="text" class="form-control" placeholder="Descripción del motivo" id="descripcion" name="descripcion">
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