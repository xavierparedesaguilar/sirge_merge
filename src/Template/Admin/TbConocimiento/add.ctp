<?php $this->assign('title', $mod_title); ?>

<section class="content-header">
    <h1>Módulo <?php echo $mod_modulo . ' - ' . $mod_title ?> - Nuevo</h1>

    <?php
    $this->Html->addCrumb("$mod_modulo", ['controller' => 'Zabd', 'action' => 'index']);
    $this->Html->addCrumb("Conocimiento Tradicional", ['controller' => 'TbConocimientoTradicional', 'action' => 'index', 'idx' => $id_zabd]);
    $this->Html->addCrumb("$mod_title", ['controller' => 'TbConocimiento', 'action' => 'index', 'idx' => $id_zabd]);
    $this->Html->addCrumb('Crear');

    echo $this->Html->getCrumbList(
        [
            'firstClass' => false,
            'lastClass' => 'active',
            'class'     => 'breadcrumb',
            'escape'    => false
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
                    <h3 class="box-title"><strong><?= __('DATOS GENERALES') ?></strong></h3>
                </div>
                <?php echo $this->Form->create($TbConocimiento, [
                    'url' => ['controller' => 'TbConocimiento', 'action' => 'add','idx'=>$id_zabd],
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
                                        <!-- Datos de conocimiento -->
                                        <div class="col-xs-12 col-md-12 col-lg-6">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Datos de conocimiento</h3>
                                                </div>
                                                <div class="box-body">
                                                    <?php echo $this->Form->control('conocimiento', [
                                                        'label' => 'Nombre la Conocimiento <b style="color:#dd4b39;">(*)</b>', 'escape' => false,
                                                        'class' => 'form-control',
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
                        <!-- < ?php echo $this->Form->button('GRABAR',['class'=>'btn btn-success', 'id'=>'btnTbConocimiento']) ?> -->
                        <?php echo $this->Form->button('GRABAR', ['class' => 'btn btn-success', 'id' => 'btnInsituAccesion']) ?>

                        <?php echo $this->Html->link('CANCELAR', ['controller' => 'TbConocimiento', 'action' => 'index','idx'=>$id_zabd], ['class' => 'btn btn-default',]) ?>
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