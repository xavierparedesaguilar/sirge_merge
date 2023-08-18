
<?php $this->assign('title', $mod_modulo); ?>

<section class="content-header">
Módulo <?php echo $mod_modulo  ?> <h1><?php echo $mod_title ?></h1>
<?php echo($Zabd->nombre)?>

    <?php
        $this->Html->addCrumb("$mod_modulo", ['controller' => 'Zabd', 'action' => 'index']);
        $this->Html->addCrumb($Zabd->cod_zabd, ['controller' => 'TbTramiteDocumentario', 'action' => 'index', 'idx' => $Zabd->id]);
        $this->Html->addCrumb("$mod_title");

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
<div class="col-xs-12 col-md-12 col-lg-12" id="mensaje_info">

</div>
<div class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="box box-success">
                <div class="box-header with-border">
                <?php echo $this->Html->link(
                        '<i class="fa fa-arrow-left" ></i>',
                        ['controller' => 'Zabd', 'action' => 'index', 'idx' => $Zabd->id],
                        ['class' => 'btn  btn-default', 'data-toggle' => "tooltip", 'title' => "Regresar", 'escape' => false]
                    )
                    ?>
                    <h3 class="box-title"> <b> | Tabla de registros | </b> <?php echo ($mod_title) ?></h3>
                    <h3 class="box-title" style="display:none;"> <strong> Registro <?php echo ($mod_title) ?> </strong> </h3>
                    <div class="pull-right box-tools">
                    <?php if ($permiso['add']) { ?>
                        <?php echo $this->Html->link('<i class="fa fa-plus"></i>',['controller' => 'TbTramiteDocumentario', 'action' => 'add', 'idx' => $Zabd->id], ['class' => 'btn btn-success','data-toggle' => "tooltip", 'title' => "Agregar $mod_title", 'escape' => false] ); ?>
                    <?php } ?>

                     <?php if($permiso['export']) { ?>

                             <button type="button" data-toggle="tooltip"  title="Exportar listado de <?php echo $mod_title ?>" id="export" class="btn btn-info waves-effect m-r-5" >
                                     <i class="fa fa-download" ></i>
                            </button>

                    <?php } ?>

                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="tablaListado" class="table table-striped table-bordered table-hover">
                        <thead class="headTablaListado">
                                <tr class="text-uppercase text-center th-head-inputs">
                                    <th style="min-width: 40px;">ID</th>
                                    <th style="min-width: 40px;">N°</th>
                                    <th style="min-width: 120px;">TIPO DE DOCUMENTO</th>
                                    <th style="min-width: 140px">NÚMERO DE DOCUMENTO</th>
                                    <th style="min-width: 120px">FECHA DE SALIDA</th>
                                    <th style="min-width: 120px">FECHA DE INGRESO</th>
                                    <th style="min-width: 120px">DIRIGIDO A:</th>
                                    <th style="min-width: 120px">ASUNTO DE TRÁMITE</th>

                                    <th style="min-width: 120px;"><?= __('Opciones') ?></th>
                                </tr>
                            </thead>
                            <tfoot class="footTablaListado">
                                <tr class="text-uppercase">
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>

                                </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach ($TbTramiteDocumentario as $rs): 
                                    ?>
                                <tr>
                                    <td><?= $this->Number->format($rs->id) ?></td>
                                    <td><?php echo $rs->numero_correlativo ?></td>
                                    <td><?= h($rs->tb_tipo_documento->tipo_documento) ?></td>
                                    <td><?= h($rs->numero_documento) ?></td>
                                    <td><?php echo ($rs->fecha_salida == NULL || $rs->fecha_salida=='')? '' : date("d-m-Y", strtotime($rs->fecha_salida))  ?></td>
                                    <td><?php echo ($rs->fecha_ingreso == NULL || $rs->fecha_ingreso=='')? '' : date("d-m-Y", strtotime($rs->fecha_ingreso))  ?></td>
                                    <td><?php echo $rs->dirigido_a ?></td>
                                    <td><?php echo $rs->asunto_tramite ?></td>
                                    <td class="text-center">
                                    <?php if ($permiso['view']) { ?>
                                        <?php echo $this->Html->link('<i class="fa fa-search-plus"></i>',
                                                ['controller' => 'TbTramiteDocumentario', 'action' => 'view', 'id' => $rs->id, 'idx' => $rs->tb_zabd_id],
                                                ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => "tooltip", 'title' => "Ver información de $mod_title."])
                                        ?>
                                    <?php } ?>
                                    <?php if ($permiso['edit']) { ?>
                                        <?php echo $this->Html->link('<i class="fa fa-pencil-square-o"></i>',
                                                ['controller' => 'TbTramiteDocumentario', 'action' => 'edit', 'id' => $rs->id, 'idx' => $rs->tb_zabd_id],
                                                ['class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => "tooltip", 'title' => "Editar $mod_title."])
                                        ?>
                                    <?php } ?>
                                    <?php if ($permiso['delete']) { ?>
                                        <?php
                                            echo $this->Html->link('<i class="fa fa-trash-o"></i>', "#",
                                                ['class' => 'btn btn-danger btn-xs delete-btn', 'escape' => false, "data-id"=>$rs->id, 'data-toggle' => "tooltip", 'title' => "Eliminar $mod_title."])
                                        ?>
                                    <?php } ?>
                                    </td>
                                </tr>
                                <!-- < ?php $item ++ ?> -->
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
            <?php echo $this->Form->create(NULL, ['url' => ['action' => 'exportartabla', 'idx' => $Zabd->id]]); ?>
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
    $(function () {
        tablaListadoDataTable();
    });

    $(".delete-btn").click(function(){
        $("#ajax_button").html("<a href='<?php echo $this->Url->build('/'.$this->request->url.'/eliminar/', true) ?>"+ $(this).attr("data-id")+"' class='btn btn-success btn-flat btnEliminar'>Confirmar</a>");
        $("#trigger").click();
    });
</script>