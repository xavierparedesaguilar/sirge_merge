<?php $this->assign('title', $mod_title); ?>

<section class="content-header">
    Módulo <?php echo $mod_modulo  ?> <h1><?php echo $mod_title ?></h1>
    <?php echo ($Zabd->nombre) ?>

    <?php
    $this->Html->addCrumb("$mod_modulo", ['controller' => 'Zabd', 'action' => 'index']);
    $this->Html->addCrumb("$mod_title", ['controller' => 'TbDiversidadFauna', 'action' => 'index', 'idx' => $Zabd->id]);
    $this->Html->addCrumb('Ver');

    echo $this->Html->getCrumbList(
        [
            'firstClass' => false,
            'lastClass'  => 'active',
            'class'      => 'breadcrumb',
            'escape'     => false
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
                        ['controller' => 'TbDiversidadFauna', 'action' => 'index', 'idx' =>$TbDiversidadFauna->tb_zabd_id, 'id'=>0],
                        ['class' => 'btn  btn-default', 'data-toggle' => "tooltip", 'title' => "Regresar", 'escape' => false]
                    )
                    ?>
                    <h3 class="box-title"> <strong> | Ver registro | </strong> <?php echo ($mod_title) ?></h3>
                    <div class="pull-right box-tools">
                        <!-- < ?php if ($permiso['edit']) { ?>
                            < ?php echo $this->Html->link(
                                '<i class="fa fa-edit" ></i>',
                                ['controller' => 'TbDiversidadFauna', 'action' => 'edit', 'idx' => $TbDiversidadFauna->tb_zabd_id, 'id' => $TbDiversidadFauna->id],
                                ['class' => 'btn btn-primary', 'data-toggle' => "tooltip",  'title' => "Editar", 'escape' => false]
                            ); ?>
                        < ?php } ?>
                        < ?php if ($permiso['delete']) { ?>
                            < ?php echo $this->Html->link('<i class="fa fa-trash" ></i>', "#", ['class' => 'btn btn-danger delete-btn', 'data-toggle' => "tooltip",  'title' => "Eliminar", 'escape' => false, "data-id" => $TbDiversidadFauna->id]) ?>
                        < ?php } ?> -->

                    </div>
                    <br>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <!-- 
            $TbDiversidadFauna = $this->TbDiversidadFauna->find()->contain(['TbCentroPoblado', 'TbCultivo', 'TbVariedades', 'TbParientesSilvestres', 'TbNombresComunes', 'TbNombresCientificos', 'TbFamilias', 'Zabd'])->where(['tb_zabd_id' => $Zabd->id, 'TbDiversidadFauna.status' => 1])->all();

                                     -->
                                    <tr>
                                        <th scope="row"><?= __('Código de la Zona de Agrobiodiversidad') ?></th>
                                        <td><?= $Zabd->cod_zabd ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Comunidad registrada') ?></th>
                                        <td><?= h($TbDiversidadFauna->tb_centro_poblado->centro_poblado) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Clase') ?></th>
                                        <td><?= h($TbDiversidadFauna->tb_clase->clase) ?></td>
                                    </tr>
                     
                                    <tr>
                                        <th scope="row"><?= __('Nombre común') ?></th>
                                        <td><?= h($TbDiversidadFauna->tb_nombres_comune->nombre_comun) ?></td>
                                    </tr>

                                    <tr>
                                        <th scope="row"><?= __('Nombre local') ?></th>
                                        <td><?= h($TbDiversidadFauna->nombre_local) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Nombre científico') ?></th>
                                        <td><?= h($TbDiversidadFauna->tb_nombres_cientifico->nombre_cientifico) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Familia') ?></th>
                                        <td><?= h($TbDiversidadFauna->tb_familia->familia) ?></td>
                                    </tr>
      
                                    <tr>
                                        <th scope="row"><?= __('Observación') ?></th>
                                        <td ><?= h($TbDiversidadFauna->observacion) ?></td>
                                    </tr>


                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- <br>
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><strong>Parientes Silvestres</strong></h3>
                                </div>
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="box-footer">
                    <div class="col-sm-12 text-center">
                        <?php if ($permiso['edit']) { ?>
                            <?php echo $this->Html->link('EDITAR', ['controller' => 'TbDiversidadFauna', 'action' => 'edit', 'idx' => $TbDiversidadFauna->tb_zabd_id, 'id' => $TbDiversidadFauna->id], ['class' => 'btn btn-primary']); ?>
                        <?php } ?>
                        <?php if ($permiso['delete']) { ?>
                            <?php echo $this->Html->link('ELIMINAR', "#", ['class' => 'btn btn-danger delete-btn', 'escape' => false, "data-id" => $TbDiversidadFauna->id]) ?>
                        <?php } ?>

                        <?php echo $this->Html->link('REGRESAR', ['controller' => 'TbDiversidadFauna', 'action' => 'index', 'idx' => $TbDiversidadFauna->tb_zabd_id], ['class' => 'btn  btn-default']) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal  -->
<a data-target="#ConfirmDelete" role="button" data-toggle="modal" id="trigger"></a>
<div class="modal fade" id="ConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center" id="myModalLabel"><strong>MENSAJE</strong></h4>
            </div>
            <div class="modal-body">
                ¿Desea eliminar el registro actual?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Cancelar</button>
                <div id="ajax_button"></div>
            </div>
        </div>
    </div>
</div>

<?php $url = $this->Html->link('Confirmar', ['controller' => 'TbDiversidadFauna', 'action' => 'delete', 'idx' => $TbDiversidadFauna->tb_zabd_id, 'id' => $TbDiversidadFauna->id], ['class' => 'btn btn-success btn-flat btnEliminar']) ?>

<script>
    $(".delete-btn").click(function() {
        $("#ajax_button").html('<?php echo $url ?>');
        $("#trigger").click();
    });
</script>