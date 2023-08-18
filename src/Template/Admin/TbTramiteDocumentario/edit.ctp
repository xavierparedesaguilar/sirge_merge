<?php $this->assign('title', $mod_title); ?>

<section class="content-header">
Módulo <?php echo $mod_modulo  ?> <h1><?php echo $mod_title ?></h1>
<?php echo($Zabd->nombre)?>

    <?php
    $this->Html->addCrumb("$mod_modulo", ['controller' => 'Zabd', 'action' => 'index']);
    $this->Html->addCrumb("$mod_title", ['controller' => 'TbTramiteDocumentario', 'action' => 'index', 'idx' => $Zabd->id]);
    $this->Html->addCrumb($Zabd->cod_zabd, ['controller' => 'TbTramiteDocumentario', 'action' => 'index', 'idx' => $Zabd->id]);
    $this->Html->addCrumb($TbTramiteDocumentario->id, ['controller' => 'TbTramiteDocumentario', 'action' => 'edit', 'idx' => $Zabd->id, 'id' => $TbTramiteDocumentario->id]);
    $this->Html->addCrumb('Editar');

    echo $this->Html->getCrumbList(
        [
            'firstClass' => false,
            'lastClass' => 'active',
            'class' => 'breadcrumb',
            'escape' => false
        ],
        '<i class="fa fa-home"></i> Inicio'
    );
    ?>
</section>

<!-- Page Body -->
<div class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="box box-success">
                <div class="box-header with-border">
                <?php echo $this->Html->link(
                        '<i class="fa fa-arrow-left" ></i>',
                        ['controller' => 'TbTramiteDocumentario', 'action' => 'index', 'idx' => $Zabd->id],
                        ['class' => 'btn  btn-default', 'data-toggle' => "tooltip", 'title' => "Regresar", 'escape' => false]
                    )
                    ?>
                <h3 class="box-title">  <strong> | Editar registro | </strong> <?php echo ($mod_title) ?></h3>
                </div>
                <?php echo $this->Form->create($TbTramiteDocumentario, [
                    'autocomplete' => "off",
                    'id' => "form_insitu_accesion"
                ]); ?>
                <div class="box-body">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="nav-tabs-custom">

                            <div class="tab-content">
                                <!-- DATOS GENERALES -->
                                <div class="tab-pane active" id="tab_1">
                                    <div class="row">
                                        <!-- Datos del documento -->
                                        <div class="col-xs-12 col-md-12 col-lg-6">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Datos del documento</h3>
                                                </div>
                                                <div class="box-body">

                                                    <?php echo $this->Form->control('numero_documento', [
                                                        'label' => 'Número del documento <b style="color:#dd4b39;">(*)</b>',
                                                        'escape' => false,
                                                        'class' => 'form-control text-uppercase',
                                                    ]); ?>

                                                    <?php echo $this->Form->control('tb_tipo_documento_id', [
                                                        // 'label' => 'Tipo de documento ' . $this->Html->link(" +", ["controller" => "TbTipoDocumento", "action" => "index", "idx" => $Zabd->id], ["class" => "btn btn-default"]),
'label' => 'Tipo de documento ' . $this->Html->link(" +", ["controller" => "TbTipoDocumento", "action" => "add", "idx" => $Zabd->id], ["class" => "btn btn-default", 'escape' => false, 'data-toggle' => "modal", 'data-target'  => "#openModal",'title' => "Ver Detalle"]),

// 'label' => 'Tipo de documento ' . $this->Html->link(" +", $this->Url->build('/' . $this->request->url . '/tipo_documento', true), ["class" => "btn btn-default", 'escape' => false, 'data-toggle' => "modal", 'data-target'  => "#openModal",'title' => "Ver Detalle"]),
                        // <?php echo $this->Html->link('<i class="fa fa-plus"></i>', $this->Url->build('/' . $this->request->url . '/tipo_documento', true), ['class' => 'btn btn-success','data-toggle' => "modal", 'data-target'  => "#openModal", 'title' => "Agregar Registro.", 'escape' => false] ); ? >
                //         <?php echo $this->Html->link('<i class="fa  fa-search-plus"></i>',
                //         ['controller' => 'DescriptorFito', 'action' => 'view', 'idx' => $descriptor->specie->id, 'id' => $descriptor->id],
                //         ['class' => 'btn btn-success btn-xs', 'escape' => false, 'data-toggle' => "modal", 'data-target'  => "#openModal",'title' => "Ver Detalle"])
                // ? > 
                        // < ?php if ($permiso['view']) { ? >
                            
                        // < ?php } ? >
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                        'options' => $TbTipoDocumento,
                                                        'empty' => 'Seleccione el tipo de documento...',
                                                    ]); ?>

                                                        <?php echo $this->Form->control('fecha_salidas', [
                                                            'label' => ['text' => 'Fecha de salida del documento' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Fecha de salida es menor que la fecha de ingreso"></i>'],
                                                            'escape' => false,
                                                            'class' => 'form-control date-picker',
                                                            'placeholder' => 'dd/mm/yyyy',
                                                            'value' => $TbTramiteDocumentario->fecha_salida,
                                                        ]); ?>

                                                        <?php echo $this->Form->control('fecha_ingresos', [
                                                            'label' => ['text' => 'Fecha de ingreso del documento'],
                                                            'escape' => false,
                                                            'class' => 'form-control date-picker',
                                                            'placeholder' => 'dd/mm/yyyy',
                                                            'value' => $TbTramiteDocumentario->fecha_ingreso,
                                                        ]); ?>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-md-12 col-lg-6">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Referido</h3>
                                                </div>
                                                <div class="box-body">

                                                    <?php echo $this->Form->control('dirigido_a', [
                                                        'label' => 'Nombre de la persona a quien va dirigido el documento',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>

                                                    <?php echo $this->Form->control('asunto_tramite', [
                                                        'label' => 'Asunto del trámite',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>

                                                    <?php echo $this->Form->control('referencia_tramite', [
                                                        'label' => 'Referencia del trámite',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-md-12 col-lg-6">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Expediente</h3>
                                                </div>
                                                <div class="box-body">

                                                    <?php echo $this->Form->control('numero_folio_expediente', [
                                                        'label' => 'Número de folio del expediente',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>

                                                    <?php echo $this->Form->control('numero_pagina_expediente', [
                                                        'label' => 'Número de páginas del expediente',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- Documentos adjuntos -->
                                        <div class="col-xs-12 col-md-12 col-lg-6">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Documentos adjuntos</h3>
                                                </div>
                                                <div class="box-body">

                                                    <?php echo $this->Form->control('documentos_adjuntos', [
                                                        'label' => 'Documentos adjuntos',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>

                                                    <?php echo $this->Form->control('numero_folio_expediente_adjunto', [
                                                        'label' => 'Número de folio del expediente adjunto',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>

                                                    <?php echo $this->Form->control('numero_pagina_expediente_adjunto', [
                                                        'label' => 'Número de página del expediente adjunto',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- Descripción -->
                                        <div class="col-xs-12 col-md-12 col-lg-6">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Descripción</h3>
                                                </div>
                                                <div class="box-body">
                                                    <?php echo $this->Form->control('descripcion_tramite', [
                                                        'label' => 'Descripción sobre el Trámite documentario',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                        'type' => 'textarea'
                                                    ]); ?>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <div class="col-sm-12 text-center">
                        <?php echo $this->Form->button('GRABAR', ['class' => 'btn btn-success', 'id' => 'btnTbTramiteDocumentario']) ?>
                        <?php echo $this->Html->link('CANCELAR', ['controller' => 'TbTramiteDocumentario', 'action' => 'index', 'idx' => $Zabd->id], ['class' => 'btn btn-default',]) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<?php
//***************** fileinput  *****************//
$this->Html->css(['/assets/js/fileinput/css/fileinput.min.css'], ['block' => 'css']);
$this->Html->script(['/assets/js/fileinput/js/fileinput.min.js', '/assets/js/fileinput/js/locales/es.js'], ['block' => 'script']);
$this->Html->scriptBlock('$("#file-1").fileinput({ showUpload: false, language: "es", allowedFileExtensions: ["jpg", "png"] });', ['block' => 'script']);
$this->Html->scriptBlock('$("#file-2").fileinput({ showUpload: false, language: "es", maxFileSize: 20480, allowedFileExtensions: ["pdf"] });', ['block' => 'script']);
$this->Html->scriptBlock('$("#file-3").fileinput({ showUpload: false, language: "es", maxFileSize: 20480, allowedFileExtensions: ["xlsx"] });', ['block' => 'script']);

//************************ CK Editors ***********************//
$this->Html->script(['/assets/js/editors/ckeditor/ckeditor.js'], ['block' => 'script']);
$this->Html->scriptBlock('CKEDITOR.replace("summary", { language: "es", removeButtons: "Save", removePlugins: "Save", });', ['block' => 'script']);
//************************ Fecha ***********************//
$this->Html->css('/assets/js/datetime/bootstrap-datepicker3.min.css', ['block' => true]);
$this->Html->script(['/assets/js/datetime/bootstrap-datepicker.min.js', '/assets/js/datetime/bootstrap-datepicker.es.min.js'], ['block' => true]);
$this->Html->scriptBlock('$("#fecha-salidas").datepicker({autoclose: true,todayHighlight: true, language: "es", format: "dd-mm-yyyy", endDate:"0d"}).keyup(function(e) {
    if(e.keyCode == 8 || e.keyCode == 46) {
        $.datepicker._clearDate(this);
    }
});', ['block' => true]);
$this->Html->scriptBlock('$("#fecha-ingresos").datepicker({autoclose: true,todayHighlight: true, language: "es", format: "dd-mm-yyyy", endDate:"0d"}).keyup(function(e) {
    if(e.keyCode == 8 || e.keyCode == 46) {
        $.datepicker._clearDate(this);
    }
});', ['block' => true]);
$this->Html->css(['/assets/js/select2/select2.min.css'], ['block' => 'css']);
$this->Html->script(['/assets/js/select2/select2.js'], ['block' => 'script']);
$this->Html->scriptBlock('$("#tb-tipo-documento, #degree-instruction, #type-soil").select2();', ['block' => 'script']);

?>