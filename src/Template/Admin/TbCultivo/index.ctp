<?php $this->assign('title', $mod_modulo);
?>

<section class="content-header">
    <h1>Módulo
        <?php echo $mod_modulo . ' - ' . $mod_title . '  ' . $father_name; ?>
    </h1>

    <?php
    $this->Html->addCrumb("$mod_modulo", ['controller' => 'Zabd', 'action' => 'index']);
    $this->Html->addCrumb("Conocimiento Tradicional", ['controller' => 'TbConocimientoTradicional', 'action' => 'index', 'idx' => $Idx]);
    $this->Html->addCrumb("$mod_title");

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
<div class="col-xs-12 col-md-12 col-lg-12" id="mensaje_info">

</div>
<div class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <?php echo $this->Html->link(
                        '<i class="fa fa-arrow-left" ></i>',
                        ['controller' => 'TbConocimientoTradicional', 'action' => $action, 'idx' => $Idx, 'id' => $Id],
                        ['class' => 'btn  btn-default', 'data-toggle' => "tooltip", 'title' => "Regresar", 'escape' => false]
                    )
                    ?>
                    <h3 class="box-title"><strong>Registro de
                            <?php echo $mod_title . '  ' . $father_name ?>

                        </strong></h3>
                    <div class="pull-right box-tools">
                        <?php if ($permiso['add']) { ?>

                            <?php echo $this->Html->link('<i class="fa fa-plus"></i>', ['controller' => 'TbCultivo', 'action' => 'add', 'idx' => $Idx, 'id' => $Id], ['class' => 'btn btn-success', 'data-toggle' => "tooltip", 'title' => "Agregar $mod_title", 'escape' => false]); ?>
                        <?php } ?>



                        <?php if ($permiso['export']) { ?>

                            <button type="button" data-toggle="tooltip" title="Exportar listado de <?php echo $mod_title ?>" id="export" class="btn btn-info waves-effect m-r-5">
                                <i class="fa fa-download"></i>
                            </button>

                        <?php } ?>


                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="tablaListado" class="table table-striped table-bordered table-hover">
                            <thead class="headTablaListado">
                                <tr class="text-uppercase text-center th-head-inputs">
                                    <th style="min-width: 40px;">N°</th>
                                    <th style="min-width: 120px"><?php echo $mod_title ?></th>
                                    <!-- <th style="min-width: 120px">Etapa</th> -->
                                    <th style="min-width: 120px;">
                                        <?= __('Opciones') ?>
                                    </th>
                                </tr>
                            </thead>
                            <tfoot class="footTablaListado">
                                <tr class="text-uppercase">
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <!-- <th></th> -->
                                </tr>
                            </tfoot>
                            <?php
                            // var_dump("Hello"); exit;      
                            // $item = 1;
                            ?>
                            <tbody>
                                <?php foreach ($TbCultivo as $rs) : ?>
                                    <tr>

                                        <td>
                                            <?php echo $this->Number->format($rs->id) ?>
                                            <!-- < ?= $item ?> -->
                                        </td>

                                        <td>
                                            <?php echo $rs->cultivo ?>
                                        </td>
                                        <!-- <td>
                                            < ?= h($rs->tb_organizacion->nombre_organizacion) ?>
                                        </td> -->

                                        <td class="text-center">
                                            <!-- < ?php if ($permiso['view']) { ?>
                                                < ?php echo $this->Html->link(
                                                    '<i class="fa fa-search-plus"></i>',
                                                    ['controller' => 'TbCultivo', 'action' => 'view', 'idx' => $Idx,'id' => $rs->id ],
                                                    ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => "tooltip", 'title' => "Ver información de $mod_title."]
                                                )
                                                ?>
                                            < ?php } ?> -->
                                            <?php if ($permiso['edit']) { ?>
                                                <?php echo $this->Html->link(
                                                    '<i class="fa fa-pencil-square-o"></i>',
                                                    ['controller' => 'TbCultivo', 'action' => 'edit', 'idx' => $Idx, 'id' => $Id, 'idy' => $rs->id],
                                                    ['class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => "tooltip", 'title' => "Editar $mod_title."]
                                                )
                                                ?>
                                            <?php } ?>
                                            <?php if ($permiso['delete']) { ?>
                                                <?php
                                                echo $this->Html->link(
                                                    '<i class="fa fa-trash-o"></i>',
                                                    "#",
                                                    ['class' => 'btn btn-danger btn-xs delete-btn', 'escape' => false, "data-id" => $rs->id, 'data-toggle' => "tooltip", 'title' => "Eliminar $mod_title."]
                                                )
                                                ?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <!-- < ?php $item++ ?> -->
                                <?php endforeach; ?>
                            </tbody>


                        </table>
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
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="tablaListado" class="table table-striped table-bordered table-hover">
                            <thead class="headTablaListado">
                                <tr class="text-uppercase text-center th-head-inputs">
                                    <th style="min-width: 40px;">N°</th>
                                    <th style="min-width: 120px"><?php echo $mod_title ?></th>
                                    <!-- <th style="min-width: 120px">Etapa</th> -->
                                    <th style="min-width: 120px;">
                                        <?= __('Opciones') ?>
                                    </th>
                                </tr>
                            </thead>
                            <tfoot class="footTablaListado">
                                <tr class="text-uppercase">
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <!-- <th></th> -->
                                </tr>
                            </tfoot>
                            <?php
                            // var_dump("Hello"); exit;      
                            // $item = 1;
                            ?>
                            <tbody>
                                <?php foreach ($TbCultivo as $rs) : ?>
                                    <tr>

                                        <td>
                                            <?php echo $this->Number->format($rs->id) ?>
                                            <!-- < ?= $item ?> -->
                                        </td>

                                        <td>
                                            <?php echo $rs->cultivo ?>
                                        </td>
                                        <!-- <td>
                                            < ?= h($rs->tb_organizacion->nombre_organizacion) ?>
                                        </td> -->

                                        <td class="text-center">
                                            <!-- < ?php if ($permiso['view']) { ?>
                                                < ?php echo $this->Html->link(
                                                    '<i class="fa fa-search-plus"></i>',
                                                    ['controller' => 'TbCultivo', 'action' => 'view', 'idx' => $Idx,'id' => $rs->id ],
                                                    ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => "tooltip", 'title' => "Ver información de $mod_title."]
                                                )
                                                ?>
                                            < ?php } ?> -->
                                            <?php if ($permiso['edit']) { ?>
                                                <?php echo $this->Html->link(
                                                    '<i class="fa fa-pencil-square-o"></i>',
                                                    ['controller' => 'TbCultivo', 'action' => 'edit', 'idx' => $Idx, 'id' => $Id, 'idy' => $rs->id],
                                                    ['class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => "tooltip", 'title' => "Editar $mod_title."]
                                                )
                                                ?>
                                            <?php } ?>
                                            <?php if ($permiso['delete']) { ?>
                                                <?php
                                                echo $this->Html->link(
                                                    '<i class="fa fa-trash-o"></i>',
                                                    "#",
                                                    ['class' => 'btn btn-danger btn-xs delete-btn', 'escape' => false, "data-id" => $rs->id, 'data-toggle' => "tooltip", 'title' => "Eliminar $mod_title."]
                                                )
                                                ?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <!-- < ?php $item++ ?> -->
                                <?php endforeach; ?>
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Cancelar</button>
                <div id="ajax_button"></div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de exportar archivo excel  -->
<div class="modal fade" id="exportar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center" id="myModalLabel"><strong>MENSAJE</strong></h4>
            </div>
            <?php echo $this->Form->create(NULL, ['url' => ['action' => 'exportartabla', 'idx' => $Idx, 'id' => $Id]]); ?>
            <div class="modal-body">
                <p id="mensaje"></p>
                <?php echo $this->Form->control('filename', ['type' => 'hidden', 'id' => 'filename']) ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success" id="btnReportesTabla">Aceptar</button>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>
    $(function() {
        tablaListadoDataTable();
    });

    $(".delete-btn").click(function() {
        $("#ajax_button").html("<a href='<?php echo $this->Url->build('/' . $this->request->url . '/eliminar/', true) ?>" + $(this).attr("data-id") + "' class='btn btn-success btn-flat btnEliminar'>Confirmar</a>");
        $("#trigger").click();
    });
</script>