<?php $this->assign('title', $mod_title); ?>

<section class="content-header">
    Módulo <?php echo $mod_modulo  ?> <h1><?php echo $mod_title ?></h1>
    <?php echo ($Zabd->nombre) ?>

    <?php
    $this->Html->addCrumb("$mod_modulo", ['controller' => 'Zabd', 'action' => 'index']);
    $this->Html->addCrumb($Zabd->cod_zabd, ['controller' => 'TbRecorrido', 'action' => 'index', 'idx' => $Zabd->id]);
    $this->Html->addCrumb("$mod_title", ['controller' => 'TbRecorrido', 'action' => 'index', 'idx' => $Zabd->id]);
    $this->Html->addCrumb($TbRecorrido->id, ['controller' => 'TbRecorrido', 'action' => 'edit', 'idx' => $Zabd->id, 'id' => $TbRecorrido->id]);
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
                        ['controller' => 'TbRecorrido', 'action' => 'index', 'idx' => $Zabd->id],
                        ['class' => 'btn  btn-default', 'data-toggle' => "tooltip", 'title' => "Regresar", 'escape' => false]
                    )
                    ?>
                    <h3 class="box-title"> <strong> | Editar registro | </strong> <?php echo ($mod_title) ?></h3>
                </div>
                <?php echo $this->Form->create($TbRecorrido, [
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
                                        <!-- Datos de la accesibilidad Campesina -->
                                        <div class="col-xs-12 col-md-12 col-lg-6">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Datos de la accesibilidad </h3>
                                                </div>
                                                <div class="box-body">
                                                    <?php echo $this->Form->control('ruta_recorrido', [
                                                        'label' => 'Ruta del recorrido <b style="color:#dd4b39;">(*)</b>', 'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('distancia_recorrido', [
                                                        'label' => 'Distancia del recorrido (km) ', 'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('tiempo_recorrido_particular', [
                                                        'label'    => 'Tiempo en transporte particular (hora: min) ', 'escape' => false,
                                                        'class'    => 'form-control',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('tiempo_recorrido_popular', [
                                                        'label'    => 'Tiempo en transporte público (hora: min)', 'escape' => false,
                                                        'class'    => 'form-control',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('referencia_recorrido', [
                                                        'label'    => 'Referencia del recorrido ', 'escape' => false,
                                                        'class'    => 'form-control',
                                                        // 'type' => 'date',
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
                </div>

                <div class="box-footer">
                    <div class="col-sm-12 text-center">
                        <!-- < ?php echo $this->Form->button('GRABAR',['class'=>'btn btn-success', 'id'=>'btnTbRecorrido']) ?> -->
                        <?php echo $this->Form->button('GRABAR', ['class' => 'btn btn-success', 'id' => 'btnTbRecorrido']) ?>

                        <?php echo $this->Html->link('CANCELAR', ['controller' => 'TbRecorrido', 'action' => 'index', 'idx' => $Zabd->id], ['class' => 'btn btn-default',]) ?>
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
$this->Html->scriptBlock('$("#passport-id").select2();', ['block' => 'script']);

?>