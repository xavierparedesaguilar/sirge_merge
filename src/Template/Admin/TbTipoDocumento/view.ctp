<?php $this->assign('title', $mod_title); ?>

<!-- Page Content -->

<section class="content-header">
Módulo <?php echo $mod_modulo  ?> <h1><?php echo $mod_title ?></h1>
<?php echo($Zabd->nombre)?>

    <?php
    $this->Html->addCrumb("$mod_modulo", ['controller' => 'Zabd', 'action' => 'index']);
    $this->Html->addCrumb("Trámite documentario", ['controller' => 'TbTramiteDocumentario', 'action' => 'index', 'idx' => $id_zabd]);
    $this->Html->addCrumb("$mod_title", ['controller' => 'TbTipoDocumento', 'action' => 'index', 'idx' => $id_zabd]);
    $this->Html->addCrumb('Ver');

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
                        ['controller' => 'TbTipoDocumento', 'action' => 'index', 'idx' => $id_zabd],
                        ['class' => 'btn  btn-default', 'data-toggle' => "tooltip", 'title' => "Regresar", 'escape' => false]
                    )
                    ?>
                    <h3 class="box-title"> <b> | Ver registros | </b> <?php echo ($mod_title) ?></h3>
                    <h3 class="box-title" style="display:none;"> <strong> Registro <?php echo ($mod_title) ?> </strong> </h3>
                    <div class="pull-right box-tools">
                        <?php if ($permiso['edit']) { ?>
                            <?php echo $this->Html->link(
                                '<i class="fa fa-edit" ></i>',
                                ['controller' => 'TbTipoDocumento', 'action' => 'edit', 'idx' => $id_zabd, 'id' => $TbTipoDocumento->id],
                                ['class' => 'btn btn-primary', 'data-toggle' => "tooltip", 'title' => "Editar", 'escape' => false]
                            ); ?>
                        <?php } ?>
                        <?php if ($permiso['delete']) { ?>
                            <?php echo $this->Html->link('<i class="fa fa-trash" ></i>', "#", ['class' => 'btn btn-danger delete-btn', 'data-toggle' => "tooltip", 'title' => "Eliminar", 'escape' => false, "data-id" => $TbTipoDocumento->id]) ?>
                        <?php } ?>

                        <?php echo $this->Html->link(
                            '<i class="fa fa-arrow-left" ></i>',
                            ['controller' => 'TbTipoDocumento', 'action' => 'index', 'idx' => $id_zabd],
                            ['class' => 'btn  btn-default', 'data-toggle' => "tooltip", 'title' => "Regresar", 'escape' => false]
                        )
                        ?>



                    </div>
                    <br>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <th scope="row"><?= __('Tipo de Documento') ?></th>
                                        <td><?= h($TbTipoDocumento->tipo_documento) ?></td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="box-footer">
                    <div class="col-sm-12 text-center">
                        <?php if ($permiso['edit']) { ?>
                            <?php echo $this->Html->link('EDITAR', ['controller' => 'TbTipoDocumento', 'action' => 'edit', 'id' => $TbTipoDocumento->id,  'idx' => $id_zabd], ['class' => 'btn btn-primary']); ?>
                        <?php } ?>

                        <?php if ($permiso['delete']) { ?>
                            <?php echo $this->Html->link('ELIMINAR', "#", ['class' => 'btn btn-danger delete-btn', 'escape' => false, "data-id" => $TbTipoDocumento->id]) ?>
                        <?php } ?>

                        <?php echo $this->Html->link('REGRESAR', ['controller' => 'TbTipoDocumento', 'action' => 'index', 'idx' => $id_zabd], ['class' => 'btn  btn-default']) ?>

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

<?php $url = $this->Html->link('Confirmar', ['controller' => 'TbTipoDocumento', 'action' => 'delete', 'idx' => $id_zabd, 'id' => $TbTipoDocumento->id], ['class' => 'btn btn-success btn-flat btnEliminar']) ?>

<script>
    $(".delete-btn").click(function() {
        $("#ajax_button").html('<?php echo $url ?>');
        $("#trigger").click();
    });
</script>