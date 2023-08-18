<?php $this->assign('title', $mod_modulo); ?>

<!-- Page Content -->
<section class="content-header">
    Módulo <?php echo $mod_modulo  ?> <h1><?php echo $mod_title ?></h1>
    <?php echo ($zabd->nombre) ?>
    <?php
    $this->Html->addCrumb('Zona de Agrobiodiversidad', ['controller' => 'Zabd', 'action' => 'index']);
    $this->Html->addCrumb($zabd->cod_zabd, ['controller' => 'Zabd', 'action' => 'view', 'id' => $zabd->id]);
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
                        ['controller' => 'Zabd', 'action' => 'index', 'idx' => $Zabd->id],
                        ['class' => 'btn  btn-default', 'data-toggle' => "tooltip", 'title' => "Regresar", 'escape' => false]
                    )
                    ?>
                    <h3 class="box-title"> <strong> | Ver registro | </strong> <?php echo ($mod_modulo) ?></h3>
                    <div class="pull-right box-tools">

                        <?php if ($permiso['edit']) { ?>

                            <?php echo $this->Html->link(
                                '<i class="fa fa-edit" ></i>',
                                ['controller' => 'Zabd', 'action' => 'edit', $zabd->id],
                                ['class' => 'btn btn-primary', 'data-toggle' => "tooltip",  'title' => "Editar", 'escape' => false]
                            ); ?>
                        <?php } ?>

                        <?php if ($permiso['delete']) { ?>

                            <?php echo $this->Html->link('<i class="fa fa-trash" ></i>', "#", ['class' => 'btn btn-danger delete-btn', 'data-toggle' => "tooltip",  'title' => "Eliminar", 'escape' => false, "data-id" => $zabd->id]) ?>

                        <?php } ?>

                        <?php echo $this->Html->link(
                            '<i class="fa fa-arrow-left" ></i>',
                            ['controller' => 'Zabd', 'action' => 'index'],
                            ['class' => 'btn  btn-default', 'data-toggle' => "tooltip",  'title' => "Regresar", 'escape' => false]
                        )
                        ?>

                    </div>
                    <br>
                </div>

                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Datos generales</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-6">
                                <table class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <th scope="row"><?= __('Nombre la zona de agrobiodiversidad') ?></th>
                                        <td><?= h($zabd->nombre) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Número de resolución ministerial') ?></th>
                                        <td><?= h($zabd->resolucion) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Fecha de reconocimiento zona de agrobiodiversidad') ?></th>
                                        <!-- <td>< ?= $this->Number->format($zabd->fec_reconocimiento) ?></td> -->
                                        <td><?php echo ($zabd->fec_reconocimiento == NULL || $zabd->fec_reconocimiento == '') ? '' : date("d-m-Y", strtotime($zabd->fec_reconocimiento))  ?></td>

                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Datos de ubicación</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tr>
                                            <th scope="row"><?= __('Departamento') ?></th>
                                            <td><?= $zabd->ubigeo->departamento->nombre ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?= __('Provincia') ?></th>
                                            <td><?= $zabd->ubigeo->provincia ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?= __('Distrito') ?></th>
                                            <td><?= $zabd->ubigeo->distrito ?></td>
                                        </tr>

                                        <tr>
                                            <th scope="row"><?= __('Área') ?></th>
                                            <td><?= h($zabd->area) ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tr>
                                            <th scope="row"><?= __('Latitud') ?></th>
                                            <td><?= h($zabd->latitud) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?= __('Longitud') ?></th>
                                            <td><?= h($zabd->longitud) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?= __('Altitud mínimo') ?></th>
                                            <td><?= h($zabd->altitud_min) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?= __('Altitud máximo') ?></th>
                                            <td><?= h($zabd->altitud_max) ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="box box-success">

                        <div class="box-body">

                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tr>
                                            <th scope="row"><?= __('Observación') ?></th>
                                            <td><?= $this->Text->autoParagraph(h($zabd->observacion)); ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Resolución de la zona de agrobiodiversidad </h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <div class="box-body">
                                        <center>
                                            <?php if ($zabd->doc_resolucion == NULL || $zabd->doc_resolucion == '') { ?>
                                                <?php if ($permiso['edit']) { ?> No se encuentra la resolución
                                                    <?php echo $this->Html->link('Ir a agregar', ['controller' => 'Zabd', 'action' => 'edit', $zabd->id], ['class' => 'btn btn-link']); ?>
                                                <?php } ?>
                                            <?php } else {  ?>
                                                <iframe src="<?php echo $this->Url->build('/', true) . $zabd->doc_resolucion ?>" style="height: 307px;"></iframe>
                                            <?php } ?>
                                        </center>
                                    </div>
                                    <div class="box-footer">
                                        <center>
                                            <?php if ($zabd->doc_resolucion != NULL || $zabd->doc_resolucion != '') { ?>
                                                <a href="<?php echo $this->Url->build('/', true) . $zabd->doc_resolucion ?>" data-fancybox="images">Ver Documento</a>
                                            <?php } ?>
                                        </center>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Mapa de la zona de agrobiodiversidad</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-6 ">
                                    <center>
                                        <?php if ($zabd->mapa_img == NULL || $zabd->mapa_img == '') { ?>
                                            <?php if ($permiso['edit']) { ?> No se encuentra el mapa
                                                <?php echo $this->Html->link('Ir a agregar', ['controller' => 'Zabd', 'action' => 'edit', $zabd->id], ['class' => 'btn btn-link']); ?>
                                            <?php } ?>
                                        <?php } else {

                                            echo $this->Html->link(
                                                $this->Html->image('/' . $zabd->mapa_img, ['class' => "img-responsive", 'style' => "height: 307px"]),
                                                '/' . $zabd->mapa_img,
                                                ['escapeTitle' => false, 'data-fancybox' => "images"]
                                            );
                                        } ?>
                                    </center>
                                </div>

                            </div>
                        </div>
                    </div>




                </div>
                <div class="box-footer">
                    <div class="col-sm-12 text-center">
                        <?php if ($permiso['edit']) { ?>
                            <?php echo $this->Html->link('EDITAR', ['controller' => 'Zabd', 'action' => 'edit', $zabd->id], ['class' => 'btn btn-primary']); ?>
                        <?php } ?>
                        <?php if ($permiso['delete']) { ?>
                            <?php echo $this->Html->link('ELIMINAR', "#", ['class' => 'btn btn-danger delete-btn', 'escape' => false, "data-id" => $zabd->id]) ?>
                        <?php } ?>
                        <?php echo $this->Html->link('REGRESAR', ['controller' => 'Zabd', 'action' => 'index'], ['class' => 'btn  btn-default']) ?>
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

<?php $url = $this->Html->link('Confirmar', ['controller' => 'Zabd', 'action' => 'delete', 'id' => $zabd->id], ['class' => 'btn btn-success btn-flat btnEliminar']) ?>

<script>
    $(".delete-btn").click(function() {
        $("#ajax_button").html('<?php echo $url ?>');
        $("#trigger").click();
    });
</script>

<?php

$this->Html->css(['/assets/js/fancybox/dist/jquery.fancybox.min.css'], ['block' => 'css']);
$this->Html->script(['/assets/js/fancybox/dist/jquery.fancybox.min.js'], ['block' => 'script']);

$this->Html->scriptBlock('$("[data-fancybox]").fancybox();', ['block' => true]);

?>