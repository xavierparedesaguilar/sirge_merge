<?php $this->assign('title', $mod_title); ?>

<section class="content-header">
    Módulo <?php echo $mod_modulo  ?> <h1><?php echo $mod_title ?></h1>
    <?php echo ($Zabd->nombre) ?>

    <?php
    $this->Html->addCrumb("$mod_modulo", ['controller' => 'Zabd', 'action' => 'index']);
    $this->Html->addCrumb("$mod_title", ['controller' => 'TbConocimientoTradicional', 'action' => 'index', 'idx' => $Zabd->id]);
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

<!-- Page Body -->
<div class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <?php echo $this->Html->link(
                        '<i class="fa fa-arrow-left" ></i>',
                        ['controller' => 'TbConocimientoTradicional', 'action' => 'index', 'idx' => $Zabd->id],
                        ['class' => 'btn  btn-default', 'data-toggle' => "tooltip", 'title' => "Regresar", 'escape' => false]
                    )
                    ?>
                    <h3 class="box-title"> <strong> | Nuevo registro | </strong> <?php echo ($mod_title) ?></h3>
                </div>
                <?php echo $this->Form->create($TbConocimientoTradicional, [
                    'url' => ['controller' => 'TbConocimientoTradicional', 'action' => 'add', 'idx' => $Zabd->id],
                    'autocomplete' => "off",
                    'id' => "form_Zabd_accesion"
                ]); ?>
                <div class="box-body">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="nav-tabs-custom">

                            <div class="tab-content">
                                <!-- DATOS GENERALES -->
                                <div class="tab-pane active" id="tab_1">
                                    <div class="row">
                                        <!-- Datos de Comunidad Campesina -->
                                        <div class="col-xs-12 col-md-12 col-lg-6">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Información de conocimiento tradicional</h3>
                                                </div>
                                                <div class="box-body">
                                                    <?php echo $this->Form->control('nombre_tradicional_conocimiento', [
                                                        'label' => 'Nombre tradicional del conocimiento '.'<i class="fa fa-info-circle" data-toggle="tooltip" title="campo obligatorio" style="color:#dd4b39;"></i>',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Escriba el nuevo nombre tradicional del conocimiento',
                                                        'type' => 'text',
                                                        'onkeypress' => 'return soloLetras(event)',
                                                        // 'onblur' => 'limpia()',
                                                        'id' => 'miInput'
                                                    ]); ?>
                                                    <?php echo $this->Form->control('tb_cultivo_id', [
                                                        'label' => 'Cultivo ' .'<i class="fa fa-info-circle" data-toggle="tooltip" title="Importante" style="color:#dd9d39;"></i>',
                                                        // . $this->Html->link(" +", ["controller" => "TbCultivo", "action" => "index", "idx" => $Zabd->id, 'id' => 0], ["class" => "btn btn-default",  'escape' => false, 'data-toggle' => "tooltip", 'title' => "Se dirigirá a la tabla de Cultivos."]),
                                                        'escape' => false,
                                                        'options' => $TbCultivo,
                                                        // 'empty' => ['' => 'Seleccione el Cultivo...'],
                                                        'id' => 'id_cultivo_select',
                                                        'multiple' => true,
                                                    ]); ?>
                                                    <?php echo $this->Form->control('tb_conocimiento_id', [
                                                        'label' => 'Seleccione los Conocimientos empleados '  .'<i class="fa fa-info-circle" data-toggle="tooltip" title="Importante" style="color:#dd9d39;"></i>',
                                                        // . $this->Html->link(" +", ["controller" => "TbConocimiento", "action" => "add", "idx" => $Zabd->id], ["class" => "btn btn-default"]),
                                                        'escape' => false,
                                                        // 'class' => 'select2-search { background-color: #00f; }',
                                                        'class' => 'background-color-red',
                                                        'options' => $TbConocimiento,
                                                        // 'empty' => ['' => 'Seleccione el Conocimiento...'],
                                                        'id' => 'id_conocimiento_select',
                                                        'multiple' => true
                                                    ]); ?>


                                                </div>
                                            </div>
                                        </div>
                                        <!-- Apliación del conocimiento -->
                                        <div class="col-xs-12 col-md-12 col-lg-6">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Apliación del conocimiento</h3>
                                                </div>
                                                <div class="box-body">
                                                    <?php echo $this->Form->control('tb_sector_id', [
                                                        'label' => 'Area / Sector del conocimiento ' ,
                                                        // . $this->Html->link(" +", ["controller" => "TbSector", "action" => "add", "idx" => $Zabd->id], ["class" => "btn btn-default"]),
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                        'options' => $TbSector,
                                                        'empty' => 'Seleccione el Sector...',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('tb_metodo_id', [
                                                        'label' => 'Acción / Método del cultivo ',
                                                        // . $this->Html->link(" +", ["controller" => "TbMetodo", "action" => "add", "idx" => $Zabd->id], ["class" => "btn btn-default"]),
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                        'options' => $TbMetodo,
                                                        'empty' => ['' => 'Seleccione el Método...']
                                                    ]); ?>

                                                    <?php echo $this->Form->control('tb_etapa_id', [
                                                        'label' => 'Etapas del cultivo ' .'<i class="fa fa-info-circle" data-toggle="tooltip" title="Importante" style="color:#dd9d39;"></i>' .' (máximo 1000 caracteres)',
                                                        // . $this->Html->link(" +", ["controller" => "TbEtapa", "action" => "index", "idx" => $Zabd->id, 'id' => 0], ["class" => "btn btn-default",  'escape' => false, 'data-toggle' => "tooltip", 'title' => "Se dirigirá a la tabla de Etapas."]),
                                                        'escape' => false,
                                                        'options' => $TbEtapa,
                                                        // 'empty' => ['' => 'Seleccione las etapas de este cultivo...'],
                                                        'id' => 'id_etapa_select',
                                                        'multiple' => true
                                                    ]); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Descripción -->
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Descripción</h3>
                                                </div>
                                                <div class="box-body">
                                                    <?php echo $this->Form->control('descripcion', [
                                                        'label' => 'Descripción sobre el conocimiento tradicional ' .'<i class="fa fa-info-circle" data-toggle="tooltip" title="campo obligatorio" style="color:#dd4b39;"></i> '.' (máximo 1000 caracteres)',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                        'type' => 'textarea',
                                                        'placeholder' => 'Lo que lo caracteriza a este conocimiento ...',
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
                        <!-- < ?php echo $this->Form->button('GRABAR',['class'=>'btn btn-success', 'id'=>'btnTbConocimientoTradicional']) ?> -->
                        <?php echo $this->Form->button('GRABAR', ['class' => 'btn btn-success', 'id' => 'btnInsituAccesion']) ?>

                        <?php echo $this->Html->link('CANCELAR', ['controller' => 'TbConocimientoTradicional', 'action' => 'index', 'idx' => $Zabd->id], ['class' => 'btn btn-default',]) ?>

                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<?php

$this->Html->css(['/assets/js/select2/select2.min.css'], ['block' => 'css']);
$this->Html->script(['/assets/js/select2/select2.js'], ['block' => 'script']);
$this->Html->scriptBlock('$("#id_conocimiento_select, #id_cultivo_select, #id_etapa_select").select2();', ['block' => 'script', 'tag' => 'true', 'multiple' => 'multiple', 'class' => ['background-color' => '#00f']]);
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

    // CONTADOR

    // var inputs = "input[maxlength], textarea[maxlength]";
    // $(document).on('keyup', "[maxlength]", function(e) {
    //     var este = $(this),
    //         maxlength = este.attr('maxlength'),
    //         maxlengthint = parseInt(maxlength),
    //         textoActual = este.val(),
    //         currentCharacters = este.val().length;
    //     remainingCharacters = maxlengthint - currentCharacters,
    //         espan = este.prev('label').find('span');
    //     // Detectamos si es IE9 y si hemos llegado al final, convertir el -1 en 0 - bug ie9 porq. no coge directamente el atributo 'maxlength' de HTML5
    //     if (document.addEventListener && !window.requestAnimationFrame) {
    //         if (remainingCharacters <= -1) {
    //             remainingCharacters = 0;
    //         }
    //     }
    //     espan.html(remainingCharacters);
    //     if (!!maxlength) {
    //         var texto = este.val();
    //         if (texto.length >= maxlength) {
    //             este.removeClass().addClass("borderojo");
    //             este.val(text.substring(0, maxlength));
    //             e.preventDefault();
    //         } else if (texto.length < maxlength) {
    //             este.removeClass().addClass("bordegris");
    //         }
    //     }
    // });
</script>