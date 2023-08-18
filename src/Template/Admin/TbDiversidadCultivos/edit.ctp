<?php $this->assign('title', $mod_title); ?>

<section class="content-header">
Módulo <?php echo $mod_modulo  ?> <h1><?php echo $mod_title ?></h1>
<?php echo($Zabd->nombre)?>

    <?php
    $this->Html->addCrumb("$mod_modulo", ['controller' => 'Zabd', 'action' => 'index']);
    $this->Html->addCrumb("$mod_title", ['controller' => 'TbDiversidadCultivos', 'action' => 'index', 'idx' => $Zabd->id]);
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
                        ['controller' => 'TbDiversidadCultivos', 'action' => 'index', 'idx' => $Zabd->id],
                        ['class' => 'btn  btn-default', 'data-toggle' => "tooltip", 'title' => "Regresar", 'escape' => false]
                    )
                    ?>
                <h3 class="box-title">  <strong> | Actualizar registro | </strong> <?php echo ($mod_title) ?></h3>
                </div>
                <?php echo $this->Form->create($TbDiversidadCultivos, [
                    // 'url' => ['controller' => 'TbDiversidadCultivos', 'action' => 'add', 'idx' => $Zabd->id],
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
                                                    <h3 class="box-title">Información de diversidad de cultivos</h3>
                                                </div>
                                                <div class="box-body">
                                                    <?php echo $this->Form->control('tb_centro_poblado_id', [
                                                        'label' => 'Comunidad registrada '.'<i class="fa fa-info-circle" data-toggle="tooltip" title="Data importante" style="color:#dd9d39;"></i>',
                                                        //  . $this->Html->link(" +", ["controller" => "TbCentroPoblado", "action" => "index", "idx" => $Zabd->id, 'id' => 0], ["class" => "btn btn-default",  'escape' => false, 'data-toggle' => "tooltip", 'title' => "Se dirigirá a la tabla de Comunidad registrada."]),
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                        'options' => $TbCentroPoblado,
                                                        'empty' => ['' => 'Seleccione la comunidad registrada...'],
                                                        'id' => 'id_cultivo_select',
                                                        // 'multiple' => true
                                                    ]); ?>
                                                    <?php echo $this->Form->control('tb_cultivo_id', [
                                                        'label' => 'Cultivo '.'<i class="fa fa-info-circle" data-toggle="tooltip" title="Data importante" style="color:#dd9d39;"></i>',
                                                        //  . $this->Html->link(" +", ["controller" => "TbCultivo", "action" => "index", "idx" => $Zabd->id, 'id' => 0], ["class" => "btn btn-default",  'escape' => false, 'data-toggle' => "tooltip", 'title' => "Se dirigirá a la tabla de Cultivos."]),
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                        'options' => $TbCultivo,
                                                        'empty' => ['' => 'Seleccione los cultivos...'],
                                                        'id' => 'id_conocimiento_select',
                                                        // 'multiple' => true
                                                    ]); ?>
                                                    <?php echo $this->Form->control('tb_variedades_id', [
                                                        'label' => 'Variedad ',
                                                        //  . $this->Html->link(" +", ["controller" => "TbVariedades", "action" => "index", "idx" => $Zabd->id, 'id' => 0], ["class" => "btn btn-default",  'escape' => false, 'data-toggle' => "tooltip", 'title' => "Se dirigirá a la tabla de Variedades."]),
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                        'options' => $TbVariedades,
                                                        'empty' => ['' => 'Seleccione la variedad...'],
                                                        'id' => 'id_conocimiento_select',
                                                        // 'multiple' => true
                                                    ]); ?>
                                                    <?php echo $this->Form->control('tb_parientes_silvestres_id', [
                                                        'label' => 'Pariente silvestre ',
                                                        //  . $this->Html->link(" +", ["controller" => "TbParientesSilvestres", "action" => "index", "idx" => $Zabd->id, 'id' => 0], ["class" => "btn btn-default",  'escape' => false, 'data-toggle' => "tooltip", 'title' => "Se dirigirá a la tabla de Parientes Silvestres."]),
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                        'options' => $TbParientesSilvestres,
                                                        'empty' => ['' => 'Seleccione el pariente silvestre...'],
                                                        'id' => 'id_conocimiento_select',
                                                        // 'multiple' => true
                                                    ]); ?>
                                                    <?php echo $this->Form->control('tb_nombres_comunes_id', [
                                                        'label' => 'Nombre común '.'<i class="fa fa-info-circle" data-toggle="tooltip" title="Data importante" style="color:#dd9d39;"></i>',
                                                        //  . $this->Html->link(" +", ["controller" => "TbNombresComunes", "action" => "index", "idx" => $Zabd->id, 'id' => 0], ["class" => "btn btn-default",  'escape' => false, 'data-toggle' => "tooltip", 'title' => "Se dirigirá a la tabla de Nombres comunes."]),
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                        'options' => $TbNombresComunes,
                                                        'empty' => ['' => 'Seleccione el nombre común...'],
                                                        'id' => 'id_conocimiento_select',
                                                        // 'multiple' => true
                                                    ]); ?>
                                                    <?php echo $this->Form->control('nombre_local', [
                                                        'label' => 'Nombre local del cultivo '.'<i class="fa fa-info-circle" data-toggle="tooltip" title="Campo obligatorio" style="color:#dd4b39;"></i>',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Escriba el Nombre local del cultivo...',
                                                    ]); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Apliación del Conocimiento -->
                                        <div class="col-xs-12 col-md-12 col-lg-6">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Datos científicos</h3>
                                                </div>
                                                <div class="box-body">
                                                    <?php echo $this->Form->control('tb_nombres_cientificos_id', [
                                                        'label' => 'Nombre científico '.'<i class="fa fa-info-circle" data-toggle="tooltip" title="Data importante" style="color:#dd9d39;"></i>',
                                                        //  . $this->Html->link(" +", ["controller" => "TbNombresCientificos", "action" => "index", "idx" => $Zabd->id, 'id' => 0], ["class" => "btn btn-default",  'escape' => false, 'data-toggle' => "tooltip", 'title' => "Se dirigirá a la tabla de Nombres Científicos."]),
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                        'options' => $TbNombresCientificos,
                                                        'empty' => 'Seleccione el Nombre científico...',
                                                        'id' => 'id_conocimiento_select',
                                                        
                                                    ]); ?>
                                                    <?php echo $this->Form->control('tb_familias_id', [
                                                        'label' => 'Familia ',
                                                        //  . $this->Html->link(" +", ["controller" => "TbFamilias", "action" => "index", "idx" => $Zabd->id, 'id' => 0], ["class" => "btn btn-default",  'escape' => false, 'data-toggle' => "tooltip", 'title' => "Se dirigirá a la tabla de Familias."]),
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                        'options' => $TbFamilias,
                                                        'id' => 'id_conocimiento_select',
                                                        'empty' => ['' => 'Seleccione la familia...']
                                                    ]); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Descripción -->
                                        <div class="col-xs-12 col-md-12 col-lg-6">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Información adicional</h3>
                                                </div>
                                                <div class="box-body">
                                                    <?php echo $this->Form->control('codigo_zabd_adicional', [
                                                        'label' => 'Código zabd adicional',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('codigo_accesion_adicional', [
                                                        'label' => 'Código accesion adicional',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('denominacion_lista_adicional', [
                                                        'label' => 'Denominación lista adicional',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-12 col-lg-12">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Observación</h3>
                                                </div>
                                                <div class="box-body">
                                                    <?php echo $this->Form->control('observacion', [
                                                        'label' => 'Observación sobre la diversidad de este cultivo. (máximo 300 caracteres)',
                                                        'escape' => false,
                                                        'class' => 'form-control',
                                                        'type' => 'textarea',
                                                        'placeholder' => 'Escriba alguna observación encontrada...',
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
                        <!-- < ?php echo $this->Form->button('GRABAR',['class'=>'btn btn-success', 'id'=>'btnTbDiversidadCultivos']) ?> -->
                        <?php echo $this->Form->button('GRABAR', ['class' => 'btn btn-success', 'id' => 'btnInsituAccesion']) ?>

                        <?php echo $this->Html->link('CANCELAR', ['controller' => 'TbDiversidadCultivos', 'action' => 'index', 'idx' => $Zabd->id], ['class' => 'btn btn-default',]) ?>

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
