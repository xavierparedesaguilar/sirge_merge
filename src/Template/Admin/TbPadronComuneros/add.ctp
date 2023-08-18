<?php $this->assign('title', $mod_title); ?>

<section class="content-header">
    Módulo <?php echo $mod_modulo  ?> <h1><?php echo $mod_title ?></h1>
    <?php echo ($Zabd->nombre) ?>

    <?php
    // var_dump($mod_modulo); exit;
    $this->Html->addCrumb("$mod_modulo", ['controller' => 'Zabd', 'action' => 'index']);
    $this->Html->addCrumb("$mod_title", ['controller' => 'TbPadronComuneros', 'action' => 'index', 'idx' => $Zabd->id]);
    $this->Html->addCrumb($Zabd->cod_zabd, ['controller' => 'TbPadronComuneros', 'action' => 'index', 'idx' => $Zabd->id]);
    $this->Html->addCrumb('Crear');

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

    <!-- < ?php var_dump("olisssss"); exit;   ?> -->

</section>

<!-- Page Body -->
<div class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="box box-success">
                <div class="box-header with-border">
                <?php echo $this->Html->link(
                        '<i class="fa fa-arrow-left" ></i>',
                        ['controller' => 'TbPadronComuneros', 'action' => 'index', 'idx' => $Zabd->id],
                        ['class' => 'btn  btn-default', 'data-toggle' => "tooltip", 'title' => "Regresar", 'escape' => false]
                    )
                    ?>
                <h3 class="box-title">  <strong> | Nuevo registro | </strong> <?php echo ($mod_title) ?></h3>
                </div>
                <?php echo $this->Form->create($TbPadronComuneros, [
                    'url' => ['controller' => 'TbPadronComuneros', 'action' => 'add', 'idx' => $Zabd->id],
                    'autocomplete' => "off",
                    'id' => "form_Zabd_accesi"
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

                                                    <?php echo $this->Form->control('tipo_documento', [
                                                        'label' => 'Tipo de documento ',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                        'options' => ['1'=>'DNI','2'=>'PTP','3'=>'C. Extranjería'],

                                                    ]); ?>

                                                    <?php echo $this->Form->control('numero_documento_identidad', [
                                                        'label' => 'Número de identidad del documento ',
                                                        'escape' => false,
                                                        'class' => 'form-control text-uppercase',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('nombres_apellidos', [
                                                        'label' => 'Nombres y apellidos',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>

                                                    <?php echo $this->Form->control('fecha_nacimientos', [
                                                        'label' => ['text' => 'Fecha de nacimiento' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Fecha de nacimiento"></i>'],
                                                        'escape' => false,
                                                        'class' => 'form-control date-picker',
                                                        'value' => $TbPadronComuneros->fecha_nacimiento,
                                                    ]); ?>

                                                    <?php echo $this->Form->control('genero', [
                                                        'label' => 'Genero: Masculino (M) o Femenino (F) ',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                        'options' => ['M'=>'Masculino (M)','F'=>'Femenino (F)'],
                                                        'empty' => 'Seleccione el genero...',
                                                    ]); ?>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-md-12 col-lg-6">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Datos de ubicación</h3>
                                                </div>
                                                <div class="box-body">
                                                    <?php echo $this->Form->control('departamento', [
                                                        'label' => 'Departamento <b style="color:#dd4b39;">(*)</b>',
                                                        'escape' => false,
                                                        'class' => 'form-control select2',
                                                        'type' => 'select',
                                                        'options' => $departamento,
                                                        'default' => $zabd->ubigeo['cod_dep'],
                                                        'empty' => 'Seleccionar...',
                                                    ]); ?>

                                                    <?php echo $this->Form->control('provincia', [
                                                        'label' => 'Provincia <b style="color:#dd4b39;">(*)</b>',
                                                        'escape' => false,
                                                        'class' => 'form-control select2',
                                                        'type' => 'select',
                                                        'default' => empty($zabd->ubigeo_id) ? '' : $zabd->ubigeo->cod_pro,
                                                        'empty' => ['0' => 'Seleccionar...']
                                                    ]) ?>

                                                    <?php echo $this->Form->control('distrito', [
                                                        'label' => 'Distrito <b style="color:#dd4b39;">(*)</b>',
                                                        'escape' => false,
                                                        'class' => 'form-control select2',
                                                        'type' => 'select',
                                                        'default'  => $zabd->ubigeo_id,
                                                        'empty' => ['0' => 'Seleccionar...'],
                                                    ]) ?>
                                                    <?php echo $this->Form->control('ubigeo_id', ['type' => 'hidden', 'id' => 'ubigeo_id']) ?>


                                                    <?php echo $this->Form->control('tb_centro_poblado_id', [
                                                        'label' => 'Comunidad registrada '
                                                        . '<i class="fa fa-info-circle" data-toggle="tooltip" title="Esta esá asociada a la comunidad campesina "> </i>'
                                                        . $this->Html->link(" Agregar más, en comunidad ", ["controller" => "TbComunidad", "action" => "index", "idx" => $Zabd->id], ["class" => "btn btn-default"])
                                                        ,
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                        'options' => $TbCentroPoblado,
                                                        'empty' => 'Seleccione el comunidad registrada...',
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
                                                    <?php echo $this->Form->control('observacion1', [
                                                        'label' => 'Primera observación del documento',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                        'type' => 'textarea'
                                                    ]); ?>
                                                    <?php echo $this->Form->control('observacion2', [
                                                        'label' => 'Segunda observación del documento, si es que la hay',
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
                        <!-- < ?php echo $this->Form->button('GRABAR',['class'=>'btn btn-success', 'id'=>'btnTbComunidad']) ?> -->
                        <?php echo $this->Form->button('GRABAR', ['class' => 'btn btn-success', 'id' => 'btnInsituAccesion']) ?>

                        <?php echo $this->Html->link('CANCELAR', ['controller' => 'TbPadronComuneros', 'action' => 'index', 'idx' => $Zabd->id], ['class' => 'btn btn-default',]) ?>

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
$this->Html->scriptBlock('$("#fecha-nacimientos").datepicker({autoclose: true,todayHighlight: true, language: "es", format: "dd-mm-yyyy", endDate:"0d"}).keyup(function(e) {
    if(e.keyCode == 8 || e.keyCode == 46) {
        $.datepicker._clearDate(this);
    }
});', ['block' => true]);

$this->Html->css(['/assets/js/select2/select2.min.css'], ['block' => 'css']);
$this->Html->script(['/assets/js/select2/select2.js'], ['block' => 'script']);
$this->Html->scriptBlock('$("#tb-tipo-documento-id, #degree-instruction, #type-soil").select2();', ['block' => 'script']);

?>