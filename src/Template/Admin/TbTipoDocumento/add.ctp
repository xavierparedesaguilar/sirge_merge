<div class="modal-header bg-success">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title "><i class="fa fa-file-o"></i> TIPO DE DOCUMENTO</h4>
</div>
<!-- Page Body -->
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
        <div class="box box-success ">
            <?php echo $this->Form->create($TbTipoDocumento, ['autocomplete' => "off", 'id' => "form_Zabd_accesi"]); ?>
            <div class="box-body">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="row">
                        <!-- Datos de tipo de documento -->
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <?php echo $this->Form->control('tipo_documento', [
                                'label' => '', 'escape' => false,
                                'class' => 'form-control text-uppercase',
                                'placeholder' => 'tipo de documento...',
                                'name' => 'tipodocumentoId'
                            ]); ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-success " id="btnDescriptor"><i class="fa fa-check"></i> </button>
                    <button type="button" class="btn btn-default btnDeleteModal" data-dismiss="modal"><i class="fa fa-times"></i> </button>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>