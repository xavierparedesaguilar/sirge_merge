<?php $this->assign('title', $mod_title); ?>

<section class="content-header">
    <h1>Módulo
        <?php echo $mod_modulo . ' - ' . $mod_title ?> - Editar
    </h1>

    <?php
    $this->Html->addCrumb("$mod_modulo", ['controller' => 'Zabd', 'action' => 'index']);
    $this->Html->addCrumb("Conocimiento Tradicional", ['controller' => 'TbConocimientoTradicional', 'action' => 'index', 'idx' => $id_zabd]);
    $this->Html->addCrumb("$mod_title", ['controller' => 'TbMetodo', 'action' => 'index', 'idx' => $id_zabd]);
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
                    <h3 class="box-title"><strong>
                            <?= __('DATOS GENERALES') ?>
                        </strong></h3>
                </div>
                <?php echo $this->Form->create($TbMetodo, [
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
                                        <!-- Datos de método o acción -->
                                        <div class="col-xs-12 col-md-12 col-lg-6">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Datos de método o acción</h3>
                                                </div>
                                                <div class="box-body">
                                                    <?php echo $this->Form->control('metodo', [
                                                        'label' => 'Nombre la Método o Acción <b style="color:#dd4b39;">(*)</b>', 'escape' => false,
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
            </div>

            <div class="box-footer">
                <div class="col-sm-12 text-center">
                    <!-- < ?php echo $this->Form->button('GRABAR',['class'=>'btn btn-success', 'id'=>'btnTbMetodo']) ?> -->
                    <?php echo $this->Form->button('GRABAR', ['class' => 'btn btn-success', 'id' => 'btnTbMetodo']) ?>

                    <?php echo $this->Html->link('CANCELAR', ['controller' => 'TbMetodo', 'action' => 'index','idx'=>$id_zabd], ['class' => 'btn btn-default',]) ?>
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