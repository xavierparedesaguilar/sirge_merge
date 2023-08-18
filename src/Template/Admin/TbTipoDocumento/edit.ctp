<?php $this->assign('title', $mod_title); ?>


<section class="content-header">
Módulo <?php echo $mod_modulo  ?> <h1><?php echo $mod_title ?></h1>
<?php echo($Zabd->nombre)?>

    <?php
    $this->Html->addCrumb("$mod_modulo", ['controller' => 'Zabd', 'action' => 'index']);
    $this->Html->addCrumb("Trámite documentario", ['controller' => 'TbTramiteDocumentario', 'action' => 'index', 'idx' => $id_zabd]);
    $this->Html->addCrumb("$mod_title", ['controller' => 'TbTipoDocumento', 'action' => 'index', 'idx' => $id_zabd]);
    $this->Html->addCrumb('Editar');

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

</section>

<!-- Page Body -->
<div class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="box box-success">
                <div class="box-header with-border">
                <?php echo $this->Html->link(
                        '<i class="fa fa-arrow-left" ></i>',
                        ['controller' => 'TbTipoDocumento', 'action' => 'index', 'idx' => $id_zabd],
                        ['class' => 'btn  btn-default', 'data-toggle' => "tooltip", 'title' => "Regresar", 'escape' => false]
                    )
                    ?>
                    <h3 class="box-title"> <b> | Editar registros | </b> <?php echo ($mod_title) ?></h3>
                    <h3 class="box-title" style="display:none;"> <strong> Registro <?php echo ($mod_title) ?> </strong> </h3>
                </div>
                <?php echo $this->Form->create($TbTipoDocumento, [
                    // 'url' => ['controller' => 'TbTipoDocumento', 'action' => 'add','idx'=>$id_zabd],
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
                                        <!-- Datos de tipo de documento -->
                                        <div class="col-xs-12 col-md-12 col-lg-6">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Datos de tipo de documento</h3>
                                                </div>
                                                <div class="box-body">
                                                    <?php echo $this->Form->control('tipo_documento', [
                                                        'label' => 'Nombre la tipo de documento <b style="color:#dd4b39;">(*)</b>', 'escape' => false,
                                                        'class' => 'form-control text-uppercase',
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
                        <?php echo $this->Form->button('GRABAR', ['class' => 'btn btn-success', 'id' => 'btnInsituAccesion']) ?>
                        <?php echo $this->Html->link('CANCELAR', ['controller' => 'TbTipoDocumento', 'action' => 'index','idx'=>$id_zabd], ['class' => 'btn btn-default',]) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>