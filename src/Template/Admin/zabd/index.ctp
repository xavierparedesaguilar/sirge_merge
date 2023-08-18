<?php

// use App\Model\Entity\Zabd;

$this->assign('title', $mod_modulo); ?>

<section class="content-header">
    <h1>Módulo <?php echo ($mod_modulo) ?></h1>

    <?php

    $this->Html->addCrumb("$mod_modulo");

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
                    <h3 class="box-title"><strong>Registro de <?php echo ($mod_modulo) ?></strong></h3>
                    <div class="pull-right box-tools">
                        <?php if ($mod_modulo) { ?>

                            <?php echo $this->Html->link('<i class="fa fa-plus" ></i>', ['controller' => 'Zabd', 'action' => 'add'], ['class' => 'btn btn-success', 'data-toggle' => "tooltip", 'title' => "Agregar $mod_modulo", 'escape' => false]) ?>

                        <?php } ?>

                        <?php if ($permiso['export']) { ?>

                            <button type="button" data-toggle="tooltip" title="Exportar listado de <?php echo $mod_modulo ?>" id="export" class="btn btn-info waves-effect m-r-5">
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
                                    <th style="min-width: 40px;">#</th>
                                    <th style="min-width: 120px">CÓD. ZABD</th>
                                    <th style="min-width: 140px">NOMBRE ZABD</th>
                                    <th style="min-width: 120px">RESOLUCIÓN</th>
                                    <th style="min-width: 120px">FECHA DE RECONOCIMIENTO</th>
                                    <th style="min-width: 120px">DEPARTAMENTO</th>
                                    <th style="min-width: 120px">PROVINCIA</th>
                                    <th style="min-width: 120px">DISTRITO</th>
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
                                <!-- < ?php $item = 1; ?> -->
                                <?php foreach ($zabd as $key => $value) : ?>
                                    <tr>
                                        <!-- <td>< ?php echo $this->Number->format($item) ?></td> -->
                                        <td><?php echo $value->id ?></td>
                                        <td><?php echo $value->cod_zabd ?></td>
                                        <td><?= h($value->nombre) ?></td>
                                        <td><?= h($value->resolucion) ?></td>
                                        <td><?php echo ($value->fec_reconocimiento == NULL || $value->fec_reconocimiento == '') ? '' : date("d-m-Y", strtotime($value->fec_reconocimiento))  ?></td>
                                        <td><?php echo $value->ubigeo->departamento->nombre ?></td>
                                        <td><?php echo $value->ubigeo->provincia ?></td>
                                        <td><?= $value->ubigeo->distrito ?></td>

                                        <td class="">

                                            <div class="btn-group">

                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                        Opciones
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#"><?php echo $this->Html->link(
                                                                            '<i class="">Accesibilidad a la zona</i>',
                                                                            ['controller' => 'TbRecorrido', 'action' => 'index', 'idx' => $value->id],
                                                                            ['class' => '', 'escape' => false,  'title' => "Rutas de acceso a la ZABD"]
                                                                        )
                                                                        ?></a></li>
                                                        <li><a href="#"><?php echo $this->Html->link(
                                                                            '<i class="">Trámite documentario</i>',
                                                                            ['controller' => 'TbTramiteDocumentario', 'action' => 'index', 'idx' => $value->id],
                                                                            ['class' => '', 'escape' => false,  'title' => "Trámite documentario campesina"]
                                                                        )
                                                                        ?></a></li>
                                                        <li><a href="#"><?php echo $this->Html->link(
                                                                            '<i class="">Comunidad campesina</i>',
                                                                            ['controller' => 'TbComunidad', 'action' => 'index', 'idx' => $value->id],
                                                                            ['class' => '', 'escape' => false,  'title' => "Comunidad campesina"]
                                                                        )
                                                                        ?></a></li>
                                                        <li><a href="#"><?php echo $this->Html->link(
                                                                            '<i class="">Padrón de comuneros</i>',
                                                                            ['controller' => 'TbPadronComuneros', 'action' => 'index', 'idx' => $value->id],
                                                                            ['class' => '', 'escape' => false,  'title' => "Padrón de comuneros "]
                                                                        )
                                                                        ?></a></li>
                                                        <li><a href="#"><?php echo $this->Html->link(
                                                                            '<i class="">Conocimiento tradicional</i>',
                                                                            ['controller' => 'TbConocimientoTradicional', 'action' => 'index', 'idx' => $value->id],
                                                                            ['class' => '', 'escape' => false,  'title' => "Conocimientos tradicionales"]
                                                                        )
                                                                        ?></a></li>
                                                        <li><a href="#"><?php echo $this->Html->link(
                                                                            '<i class="">Diversidad cultivo</i>',
                                                                            ['controller' => 'TbDiversidadCultivos', 'action' => 'index', 'idx' => $value->id],
                                                                            ['class' => '', 'escape' => false,  'title' => "Agrobiodiversidad de cultivos"]
                                                                        )
                                                                        ?></a></li>
                                                        <li><a href="#"><?php echo $this->Html->link(
                                                                            '<i class="">Diversidad crianza</i>',
                                                                            ['controller' => 'TbDiversidadCrianzas', 'action' => 'index', 'idx' => $value->id],
                                                                            ['class' => '', 'escape' => false,  'title' => "Agrobiodiversidad de crianza"]
                                                                        )
                                                                        ?></a></li>
                                                        <li>
                                                            <a href="#">
                                                                <?php echo $this->Html->link(
                                                                    '<i class="">Diversidad fauna</i>',
                                                                    ['controller' => 'TbDiversidadFauna', 'action' => 'index', 'idx' => $value->id],
                                                                    ['class' => '', 'escape' => false,  'title' => "Diversidad de fauna"]
                                                                )
                                                                ?>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <?php echo $this->Html->link(
                                                                    '<i class="">Diversidad flora</i>',
                                                                    ['controller' => 'TbDiversidadFlora', 'action' => 'index', 'idx' => $value->id],
                                                                    ['class' => '', 'escape' => false,  'title' => "Diversidad de flora"]
                                                                )
                                                                ?>
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>



                                            <?php if ($value->id) { ?>
                                                <?php echo $this->Html->link(
                                                    '<i class="fa fa-search-plus"></i>',
                                                    ['controller' => 'Zabd', 'action' => 'view', $value->id],
                                                    ['class' => 'btn btn-default', 'escape' => false, 'data-toggle' => "tooltip", 'title' => "Ver información del zona de agrobiodiversidad."]
                                                )
                                                ?>
                                            <?php } ?>
                                            <?php if ($value->id) { ?>

                                                <?php echo $this->Html->link(
                                                    '<i class="fa fa-pencil-square-o"></i>',
                                                    ['controller' => 'Zabd', 'action' => 'edit', $value->id],
                                                    ['class' => 'btn btn-primary ', 'escape' => false, 'data-toggle' => "tooltip", 'title' => "Editar zona de agrobiodiversidad."]
                                                )
                                                ?>
                                            <?php } ?>
                                            <?php
                                            echo $this->Html->link(
                                                '<i class="fa fa-trash-o"></i>',
                                                "#",
                                                ['class' => 'btn btn-danger delete-btn', 'escape' => false, "data-id" => $value->id, 'data-toggle' => "tooltip", 'title' => "Eliminar zona de agrobiodiversidad"]
                                            )
                                            ?>
                                            <!-- < ?php if($permiso['delete']) { ?> -->

                                            <!-- < ?php } ?> -->

                                        </td>
                                    </tr>
                                    <!-- < ?php $item++; ?> -->
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
            <?php echo $this->Form->create(NULL, ['url' => ['action' => 'exportartabla']]); ?>
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