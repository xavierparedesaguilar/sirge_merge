<?php $this->assign('title', $mod_title); ?>

<section class="content-header">
    Módulo <?php echo $mod_modulo  ?> <h1><?php echo $mod_title ?></h1>
    <?php echo ($Zabd->nombre) ?>

    <?php
    $this->Html->addCrumb("$mod_modulo", ['controller' => 'Zabd', 'action' => 'index']);
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
</section>
<!-- /Page Breadcrumb -->

<!-- Page Body -->
<div class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <?php echo $this->Html->link(
                        '<i class="fa fa-arrow-left" ></i>',
                        ['controller' => 'Zabd', 'action' => 'index', 'idx' => $Zabd->id],
                        ['class' => 'btn  btn-default', 'data-toggle' => "tooltip", 'title' => "Regresar", 'escape' => false]
                    )
                    ?>
                    <h3 class="box-title"> <strong> | Nuevo registro | </strong> <?php echo ($mod_modulo) ?></h3>
                </div>
                <?php echo $this->Form->create($zabd, [
                    'url' => ['controller' => 'Zabd', 'action' => 'add'],
                    'autocomplete' => "off",
                    'enctype' => 'multipart/form-data',
                    'id' => "form_zabd"
                ]); ?>
                <div class="box-body">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="nav-tabs-custom">

                            <div class="tab-content">
                                <!-- Datos generales -->
                                <div class="tab-pane active" id="tab_1">
                                    <div class="row">
                                        <!-- Datos generales -->
                                        <div class="col-xs-12 col-md-12 col-lg-6">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Datos generales</h3>
                                                </div>
                                                <div class="box-body">
                                                    <?php echo $this->Form->control(h('nombre'), [
                                                        'label' => 'Nombre la ZABD <b style="color:#dd4b39;">(*)</b>',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                        'type' => 'text',
                                                        'onkeypress' => 'return soloLetras(event)',
                                                        // 'onblur' => 'limpia()',
                                                        'id' => 'miInput',
                                                        'placeholder' => 'Escriba el nombre de la zona reconocida ...',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('resolucion', [
                                                        'label' => 'Número de Resolución Ministerial <b style="color:#dd4b39;">(*)</b>',
                                                        'escape' => false,
                                                        'class' => 'form-control text-uppercase',
                                                        'placeholder' => 'Ejemplo:  R.M. Nº 00##-20##-MIDAGRI',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('file_2', [
                                                        'label' => ['text' => '<i class="fa fa-file"></i> ' . ' ' . 'Documento de resolución ministerial ' . ' ' .  '<i class="fa fa-info-circle" data-toggle="tooltip" title="subir resolucion de ZABD formato PDF"></i>' . ' ' . 'Formato: .PDF'],
                                                        'escape' => false,
                                                        'class' => 'form-control file-input',
                                                        'type' => 'file',
                                                    ]); ?>

                                                    <div class="">
                                                        <?php echo $this->Form->control('fec_reconocimientos', [
                                                            'label' => ['text' => 'Fecha de reconocimiento ZABD <b style="color:#dd4b39;">(*)</b>' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Fecha en que se le otorgó el renoconocimiento como ZABD"></i>'],
                                                            'escape' => false,
                                                            'placeholder' => '00-00-0000',
                                                            'class' => 'form-control date-picker',
                                                            'value' => $zabd->fec_reconocimientos,
                                                        ]); ?>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Observaciones o anotaciones</h3>
                                                </div>
                                                <div class="box-body">
                                                    <?php echo $this->Form->control('observacion', [
                                                        'label' => 'Insertar información o alguna observación relacionada a los datos generales de la ZABD (máximo 300 caracteres).',
                                                        'placeholder' => 'Alguna observación relacionada a los datos de la ZABD...',
                                                        'type' => 'textarea',
                                                        'rows' => "5",
                                                        'class' => 'form-control',
                                                    ]); ?>

                                                    <div class="sm">
                                                        Nota: Los valores de coordenadas e LATITUD y LONGITUD deben ser
                                                        de grados decimales. Para aplicar la conversión de GRADOS,
                                                        MINUTOS Y SEGUNDOS a GRADOS DECIMALES se debe utilizar la
                                                        siguiente formula:
                                                        <span>Grados decimales:</span>
                                                        <span>(grados + (minutos/60) + (segundos/3600))* -1</span>
                                                    </div>

                                                </div>
                                            </div>
                                            
                                        </div>
                                        <!-- Datos de Ubicación -->
                                        <div class="col-xs-12 col-md-12 col-lg-6">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Datos de Ubicación</h3>
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


                                                    <?php echo $this->Form->control('area', [
                                                        'label' => 'Área (ha) ',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Datos de georreferenciación -->
                                        <div class="col-xs-12 col-md-12 col-lg-6">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Datos de georreferenciación</h3>
                                                </div>
                                                <div class="box-body">
                                                    <?php echo $this->Form->control('latitud', [
                                                        'label' => 'Latitud ',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('longitud', [
                                                        'label' => 'Longitud ',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('altitud_min', [
                                                        'label' => 'Altitud minimo',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('altitud_max', [
                                                        'label' => 'Altitud maximo',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('file_3', [
                                                        'label' => ['text' => '<i class="fa fa-file"></i> ' . ' ' . 'Adjuntar excel de polígono de georreferenciación de la ZABD' . ' ' .  '<i class="fa fa-info-circle" data-toggle="tooltip" title="Georreferenciación por punto"></i>' . ' ' . 'Formato: .XLSX'],
                                                        'escape' => false,
                                                        'class' => 'form-control file-input',
                                                        'type' => 'file',
                                                    ]); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Observaciones o anotaciones -->
                                        <div class="col-xs-12 col-md-12 col-lg-6">
                                            
                                        </div>

                                        <div class="col-xs-12 col-md-12 col-lg-6">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Imagen del mapa de la zona de agrobiodiversidad</h3>
                                                </div>
                                                <div class="box-body">

                                                    <?php echo $this->Form->control('file_1', [
                                                        'label' => ['text' => '<i class="fa fa-camera-retro fa-lg"></i> ' . ' ' . 'Adjuntar Imagen del mapa de la ZABD' . ' ' .  '<i class="fa fa-info-circle" data-toggle="tooltip" title="Mapa del perimetro de la ZABD"></i>' . ' ' . 'Formato: .PNG .JPG .JPEG'],
                                                        'escape' => false,
                                                        'class' => 'form-control file-input',
                                                        'type' => 'file',
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
                        <?php echo $this->Form->button('GRABAR', ['class' => 'btn btn-success', 'id' => 'btnInsitu2']) ?>
                        <?php echo $this->Html->link('X CANCELAR', ['controller' => 'Zabd', 'action' => 'index'], ['class' => 'btn btn-default',]) ?>
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
$this->Html->scriptBlock('$("#file-1").fileinput({ showUpload: false, language: "es", allowedFileExtensions: ["jpg", "png","jpeg"] });', ['block' => 'script']);
$this->Html->scriptBlock('$("#file-2").fileinput({ showUpload: false, language: "es", maxFileSize: 20480, allowedFileExtensions: ["pdf"] });', ['block' => 'script']);
$this->Html->scriptBlock('$("#file-3").fileinput({ showUpload: false, language: "es", maxFileSize: 20480, allowedFileExtensions: ["xlsx"] });', ['block' => 'script']);

//************************ CK Editors ***********************//
$this->Html->script(['/assets/js/editors/ckeditor/ckeditor.js'], ['block' => 'script']);
$this->Html->scriptBlock('CKEDITOR.replace("summary", { language: "es", removeButtons: "Save", removePlugins: "Save", });', ['block' => 'script']);
//************************ Fecha ***********************//
$this->Html->css('/assets/js/datetime/bootstrap-datepicker3.min.css', ['block' => true]);
$this->Html->script(['/assets/js/datetime/bootstrap-datepicker.min.js', '/assets/js/datetime/bootstrap-datepicker.es.min.js'], ['block' => true]);
$this->Html->scriptBlock('$("#fec-reconocimientos").datepicker({autoclose: true,todayHighlight: true, language: "es", format: "dd-mm-yyyy", endDate:"0d"}).keyup(function(e) {
    if(e.keyCode == 8 || e.keyCode == 46) {
        $.datepicker._clearDate(this);
    }
});', ['block' => true]);
$this->Html->css(['/assets/js/select2/select2.min.css'], ['block' => 'css']);
$this->Html->script(['/assets/js/select2/select2.js'], ['block' => 'script']);
$this->Html->scriptBlock('$("#departamento, #provincia, #distrito, #degree-instruction, #type-soil").select2();', ['block' => 'script']);

?>

<script>
    function soloLetras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales = [8, 37, 39, 46];

        tecla_especial = false
        for (var i in especiales) {
            if (key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        if (letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }

    function limpia() {
        var val = document.getElementById("miInput").value;
        var tam = val.length;
        for (i = 0; i < tam; i++) {
            if (!isNaN(val[i]))
                document.getElementById("miInput").value = '';
        }
    }
</script>