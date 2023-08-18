
<?php $this->assign('title', $mod_title); ?>

<!-- Page Content -->
<section class="content-header">
Módulo <?php echo $mod_modulo  ?> <h1><?php echo $mod_title ?></h1>
<?php echo($Zabd->nombre)?>

    <?php
        $this->Html->addCrumb("$mod_modulo", ['controller' => 'Zabd', 'action' => 'index']);
        $this->Html->addCrumb($Zabd->cod_zabd, ['controller' => 'TbTramiteDocumentario', 'action' => 'index', 'idx' => $Zabd->id]);
        $this->Html->addCrumb('Registros', ['controller' => 'TbTramiteDocumentario', 'action' => 'index', 'idx' => $Zabd->id]);
        $this->Html->addCrumb($TbTramiteDocumentario->id, ['controller' => 'TbTramiteDocumentario', 'action' => 'view', 'idx' => $Zabd->id, 'id' => $TbTramiteDocumentario->id]);
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
                        ['controller' => 'TbTramiteDocumentario', 'action' => 'index', 'idx' => $Zabd->id],
                        ['class' => 'btn  btn-default', 'data-toggle' => "tooltip", 'title' => "Regresar", 'escape' => false]
                    )
                    ?>
                <h3 class="box-title">  <strong> | Ver registro | </strong> <?php echo ($mod_title) ?></h3>
                    <div class="pull-right box-tools">
                    <?php if ($permiso['edit']) { ?>
                        <?php echo $this->Html->link('<i class="fa fa-edit" ></i>',
                                    ['controller' => 'TbTramiteDocumentario', 'action' => 'edit', 'idx' => $TbTramiteDocumentario->tb_zabd_id, 'id' => $TbTramiteDocumentario->id],
                                    ['class' => 'btn btn-primary','data-toggle'=> "tooltip",  'title'=> "Editar", 'escape'=>false] );?>
                    <?php } ?>

                    <!-- < ?php if ($permiso['delete']) { ?>
                        < ?php echo $this->Html->link('<i class="fa fa-trash" ></i>', "#",['class' => 'btn btn-danger delete-btn','data-toggle'=> "tooltip",  'title'=> "Eliminar",'escape' => false, "data-id"=>$TbTramiteDocumentario->id])?>
                    < ?php } ?> -->

                        <?php echo $this->Html->link('<i class="fa fa-arrow-left" ></i>',
                                ['controller' => 'TbTramiteDocumentario', 'action' => 'index', 'idx' => $TbTramiteDocumentario->tb_zabd_id],
                                ['class' => 'btn  btn-default', 'data-toggle'=> "tooltip",  'title'=> "Regresar", 'escape'=>false])
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
                                        <th scope="row"><?= __('Número del documento') ?></th>
                                        <td><?= $TbTramiteDocumentario->numero_documento ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Tipo del documento') ?></th>
                                        <td><?= h($TbTramiteDocumentario->tb_tipo_documento->tipo_documento) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Fecha de salida del trámite') ?></th>
                                        <td><?php echo ($TbTramiteDocumentario->fecha_salida == NULL || $TbTramiteDocumentario->fecha_salida == '') ? '' : date("d-m-Y", strtotime($TbTramiteDocumentario->fecha_salida))  ?></td>

                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Fecha de ingreso del trámite') ?></th>
                                        <td><?php echo ($TbTramiteDocumentario->fecha_ingreso == NULL || $TbTramiteDocumentario->fecha_ingreso == '') ? '' : date("d-m-Y", strtotime($TbTramiteDocumentario->fecha_ingreso))  ?></td>

                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('A quien va dirigido el trámite') ?></th>
                                        <td><?= h($TbTramiteDocumentario->dirigido_a) ?></td>
                                    </tr>
                                
                                    <tr>
                                        <th scope="row"><?= __('Asunto del trámite') ?></th>
                                        <td><?= h($TbTramiteDocumentario->asunto_tramite) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Referencia del trámite') ?></th>
                                        <td><?= h($TbTramiteDocumentario->referencia_tramite) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Número del folio del expediente') ?></th>
                                        <td><?= h($TbTramiteDocumentario->numero_folio_expediente) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Número de página del expediente') ?></th>
                                        <td><?= h($TbTramiteDocumentario->numero_pagina_expediente) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Detalle de los documentos adjuntos') ?></th>
                                        <td><?= h($TbTramiteDocumentario->documentos_adjuntos) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Número de folio del expediente adjunto') ?></th>
                                        <td><?= h($TbTramiteDocumentario->numero_folio_expediente_adjunto) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Número de página del expediente adjunto') ?></th>
                                        <td><?= h($TbTramiteDocumentario->numero_pagina_expediente_adjunto) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Descripción del trámite') ?></th>
                                        <td><?= h($TbTramiteDocumentario->descripcion_tramite) ?></td>
                                    </tr>
                                    <!-- <tr>
                                        <th scope="row"><?= __('Zona a la que pertenece') ?></th>
                                        <td><?php echo($TbTramiteDocumentario->tb_zabd->nombre); ?></td>
                                    </tr> -->
                          
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- <br>
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><strong>Otros datos</strong></h3>
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
                        <?php echo $this->Html->link('EDITAR', ['controller' => 'TbTramiteDocumentario', 'action' => 'edit', 'idx' => $TbTramiteDocumentario->tb_zabd_id, 'id' => $TbTramiteDocumentario->id], ['class' => 'btn btn-primary'] ); ?>
                    <?php } ?>
                   
                    <!-- < ?php if ($permiso['delete']) { ?>
                        < ?php echo $this->Html->link('ELIMINAR', "#",['class' => 'btn btn-danger delete-btn', 'escape' => false, "data-id"=>$TbTramiteDocumentario->id])?>
                    < ?php } ?> -->

                        <?php echo $this->Html->link('REGRESAR',['controller' => 'TbTramiteDocumentario', 'action' => 'index', 'idx' => $TbTramiteDocumentario->tb_zabd_id], ['class' => 'btn  btn-default']) ?>

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

<?php $url = $this->Html->link('Confirmar', ['controller' => 'TbTramiteDocumentario', 'action' => 'delete', 'idx' => $TbTramiteDocumentario->tb_zabd_id,'id' => $TbTramiteDocumentario->id], ['class' => 'btn btn-success btn-flat btnEliminar' ]) ?>

<script>
    $(".delete-btn").click(function(){
        $("#ajax_button").html('<?php echo $url ?>');
        $("#trigger").click();
    });
</script>
