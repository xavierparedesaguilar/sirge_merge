<?php $this->assign('title', $mod_title); ?>

<section class="content-header">
    Módulo <?php echo $mod_modulo  ?> <h1><?php echo $mod_title ?></h1>
    <?php echo ($Zabd->nombre) ?>

    <?php
    $this->Html->addCrumb("$mod_modulo", ['controller' => 'Zabd', 'action' => 'index']);
    $this->Html->addCrumb("$mod_title", ['controller' => 'TbConocimientoTradicional', 'action' => 'index', 'idx' => $Zabd->id]);
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
                        ['controller' => 'TbConocimientoTradicional', 'action' => 'index', 'idx' => $Zabd->id],
                        ['class' => 'btn  btn-default', 'data-toggle' => "tooltip", 'title' => "Regresar", 'escape' => false]
                    )
                    ?>
                    <h3 class="box-title"> <strong> | Actualizar registro | </strong> <?php echo ($mod_title) ?></h3>
                </div>
                <?php echo $this->Form->create($TbConocimientoTradicional, [
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
                                        <!-- Datos de Comunidad Campesina -->
                                        <div class="col-xs-12 col-md-12 col-lg-6">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Información de conocimiento tradicional</h3>
                                                </div>
                                                <div class="box-body">
                                                    <?php echo $this->Form->control('nombre_tradicional_conocimiento', [
                                                        'label' => 'Nombre tradicional del conocimiento ' .'<i class="fa fa-info-circle" data-toggle="tooltip" title="campo obligatorio" style="color:#dd4b39;"></i>',
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
                                                        // . $this->Html->link(" +", ["controller" => "TbCultivo", "action" => "index", "idx" => $Zabd->id, 'id' => $TbConocimientoTradicional->id], ["class" => "btn btn-default",  'escape' => false, 'data-toggle' => "tooltip", 'title' => "Se dirigirá a la tabla de Cultivos."]),
                                                        'escape' => false,
                                                        'options' => $TbCultivo,
                                                        'default' => $cultivo_id,
                                                        'id' => 'id_cultivo_select',
                                                        'multiple' => true
                                                    ]); ?>
                                                    <?php echo $this->Form->control('tb_conocimiento_id', [
                                                        'label' => 'Seleccione los Conocimientos empleados ' .'<i class="fa fa-info-circle" data-toggle="tooltip" title="Importante" style="color:#dd9d39;"></i>',
                                                        // . $this->Html->link(" +", ["controller" => "TbConocimiento", "action" => "add", "idx" => $Zabd->id], ["class" => "btn btn-default"]),
                                                        'escape' => false,
                                                        // 'class' => 'select2-search { background-color: #00f; }',
                                                        'class' => 'background-color-red',
                                                        'options' => $TbConocimiento,
                                                        'default' => $conocimiento_id,
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
                                                        'label' => 'Área / Sector del conocimiento ' ,
                                                        // . $this->Html->link(" +", ["controller" => "TbSector", "action" => "add", "idx" => $Zabd->id], ["class" => "btn btn-default"]),
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                        'options' => $TbSector,
                                                        'empty' => 'Seleccione el Sector...',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('tb_metodo_id', [
                                                        'label' => 'Acción / Método del cultivo ' ,
                                                        // . $this->Html->link(" +", ["controller" => "TbMetodo", "action" => "add", "idx" => $Zabd->id], ["class" => "btn btn-default"]),
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                        'options' => $TbMetodo,
                                                        'empty' => ['' => 'Seleccione el Método...']
                                                    ]); ?>

                                                    <?php echo $this->Form->control('tb_etapa_id', [
                                                        'label' => 'Etapas del cultivo '.'<i class="fa fa-info-circle" data-toggle="tooltip" title="Importante" style="color:#dd9d39;"></i>',
                                                        // . $this->Html->link(" +", ["controller" => "TbEtapa", "action" => "index", "idx" => $Zabd->id, 'id' => $TbConocimientoTradicional->id], ["class" => "btn btn-default",  'escape' => false, 'data-toggle' => "tooltip", 'title' => "Se dirigirá a la tabla de Etapas."]),
                                                        'escape' => false,
                                                        'options' => $TbEtapa,
                                                        'default' => $etapa_id,
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
                                                        'label' => 'Descripción sobre el conocimiento tradicional '.'<i class="fa fa-info-circle" data-toggle="tooltip" title="campo obligatorio" style="color:#dd4b39;"></i>'.' (máximo 1000 caracteres)',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                        'type' => 'textarea',
                                                        'maxlength' => '300',
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
                        <?php echo $this->Form->button('GRABAR', ['class' => 'btn btn-success', 'id' => 'btnTbConocimientoTradicional']) ?>

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
</script>