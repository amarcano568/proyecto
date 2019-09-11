<br>
<div class="sub_menu_tab margin_top">
    <div class="row">
        <div class="col-lg-12 col-md-12" style="padding-right: 2em;">
            <button  style="float: right;" class="btn btn-primary" id="btn_guardar_anamnesis_gr">
                <i class="far fa-save"></i>
                Guardar
            </button>
        </div>
    </div>        
    <div class="col-md-12 margin_top margin_bottom">
        <div class="row margin_bottom">
            <div class="col-md-12">
                <label for="primer_motivo_consulta">Primer Motivo Consulta:</label>
                <textarea class="form-control input-sm resize_vertical" id="primer_motivo_consulta" name="primer_motivo_consulta"></textarea>
            </div>
        </div>
        <div class="row margin_bottom">
            <div class="col-md-6">
                <label for="antecedentes">Antecedentes Médicos:</label>
                <textarea class="form-control input-sm resize_vertical" id="antecedentes" name="antecedentes"></textarea>
            </div>
            <div class="col-md-6">
                <label for="alergias">Alergias:</label>
                <textarea class="form-control input-sm resize_vertical" id="alergias" name="alergias"></textarea>
            </div>
        </div>
        <div class="row margin_bottom">
            <div class="col-md-6">
                <label for="medicamentos">Medicamentos:</label>
                <textarea class="form-control input-sm resize_vertical" id="medicamentos" name="medicamentos"></textarea>
            </div>
            <div class="col-md-6">
                <label for="otros">Hábitos:</label>
                <textarea class="form-control input-sm resize_vertical" id="habitos" name="habitos"></textarea>
            </div>
        </div>
        <div class="row margin_bottom">
            <div class="col-md-6">
                <label for="antecedentes_fam">Antecedentes 	Familiares:</label>
                <textarea class="form-control input-sm resize_vertical" id="antecedentes_fam" name="antecedentes_fam"></textarea>
            </div>
            <div class="col-md-6">
                <label for="otros">Otros:</label>
                <textarea class="form-control input-sm resize_vertical" id="otros" name="otros"></textarea>
            </div>
        </div>
        <div class="row margin_bottom">
            <div class="col-md-6">
                <label for="antecedentes_fam">Peso (kgs):</label>
                <input type="text" class="form-control input-sm resize_vertical format_valid_integer imc-componente" id="peso" name="peso" value="" maxlength="5">
            </div>
            <div class="col-md-6">
                <label for="otros">Talla (cms):</label>
                <input type="text" class="form-control input-sm resize_vertical format_valid_integer imc-componente" id="talla" name="talla" value="" maxlength="5">
            </div>
        </div>
<!--         <div class="row margin_bottom">
            <div class="col-md-6">
                <label for="antecedentes_fam">I.M.C.</label>
                <input type="text" class="form-control input-sm resize_vertical" id="imc" value="0" readonly="" disabled="">
            </div>
        </div> -->
        <div class="row margin_bottom">
            <div class="col-lg-6 col-md-4">
                <label>¿Ha presentado problemas de Coagulación?</label>
                <div>
                    <label class="radio-inline">
                        <input type="radio" name="coagulacion" value="1"> Si                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="coagulacion" value="0" checked=""> No                    </label>
                </div>
            </div>
            <div class="col-lg-6 col-md-4">
                <label>¿Ha presentado problemas con Anestésicos Locales?</label>
                <div>
                    <label class="radio-inline">
                        <input type="radio" name="anestesicos" value="1"> Si                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="anestesicos" value="0" checked=""> No                    </label>
                </div>
            </div>
        </div>
    </div>
        
    </div>