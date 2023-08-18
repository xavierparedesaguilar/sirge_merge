
<?php $this->assign('title', $mod_title); ?>

<!-- Page Content -->
<section class="content-header">
Módulo <?php echo $mod_modulo  ?> <h1><?php echo $mod_title ?></h1>
<?php echo($Zabd->nombre)?>

    <?php
        $this->Html->addCrumb("$mod_modulo", ['controller' => 'Zabd', 'action' => 'index']);
        $this->Html->addCrumb($Zabd->cod_zabd, ['controller' => 'TbComunidad', 'action' => 'index', 'idx' => $Zabd->id]);
        $this->Html->addCrumb("$mod_title", ['controller' => 'TbComunidad', 'action' => 'index', 'idx' => $Zabd->id]);
        $this->Html->addCrumb($TbComunidad->id, ['controller' => 'TbComunidad', 'action' => 'view', 'idx' => $Zabd->id, 'id' => $TbComunidad->id]);
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
                        ['controller' => 'TbComunidad', 'action' => 'index', 'idx' => $Zabd->id],
                        ['class' => 'btn  btn-default', 'data-toggle' => "tooltip", 'title' => "Regresar", 'escape' => false]
                    )
                    ?>
                <h3 class="box-title">  <strong> | Ver registro | </strong> <?php echo ($mod_title) ?></h3>
                    <div class="pull-right box-tools">
                    <?php if ($permiso['edit']) { ?>
                        <?php echo $this->Html->link('<i class="fa fa-edit" ></i>',
                                    ['controller' => 'TbComunidad', 'action' => 'edit', 'idx' => $TbComunidad->tb_zabd_id, 'id' => $TbComunidad->id],
                                    ['class' => 'btn btn-primary','data-toggle'=> "tooltip",  'title'=> "Editar", 'escape'=>false] );?>
                    <?php } ?>
                    <?php if ($permiso['delete']) { ?>
                        <?php echo $this->Html->link('<i class="fa fa-trash" ></i>', "#",['class' => 'btn btn-danger delete-btn','data-toggle'=> "tooltip",  'title'=> "Eliminar",'escape' => false, "data-id"=>$TbComunidad->id])?>
                    <?php } ?>

                        <?php echo $this->Html->link('<i class="fa fa-arrow-left" ></i>',
                                ['controller' => 'TbComunidad', 'action' => 'index', 'idx' => $TbComunidad->tb_zabd_id],
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
                                    <th scope="row"><?= __('Nombre de la comunidad campesina') ?></th>
                                    <td><?= h($TbComunidad->nombre_comunidad) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Nombre del predio de la comunidad campesina') ?></th>
                                    <td><?= h($TbComunidad->nom_predio) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('N° de folio del expediente - ZABD') ?></th>
                                    <td><?= h($TbComunidad->folio_exp) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('N° de páginas del expediente – ZABD') ?></th>
                                    <td><?= h($TbComunidad->pagina_exp) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Partida electrónica') ?></th>
                                    <td><?= h($TbComunidad->partida_electronica) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Ficha registral') ?></th>
                                    <td><?= h($TbComunidad->ficha_registral) ?></td>
                                </tr>
                           
                                <tr>
                                    <th scope="row"><?= __('Superficie (ha) según partida electrónica Sunarp') ?></th>
                                    <td><?= $this->Number->format($TbComunidad->superficie_pe) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Superficie (ha) según catastro Sunarp') ?></th>
                                    <td><?= $this->Number->format($TbComunidad->superficie_cat) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Superfice (ha) de la comunidad') ?></th>
                                    <td><?= $this->Number->format($TbComunidad->superficie_comunidad_zabd) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('% de la superficie de la comunidad') ?></th>
                                    <td><?= $this->Number->format($TbComunidad->porcentaje_superficie_zabd) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Altitud mínima') ?></th>
                                    <td><?= $this->Number->format($TbComunidad->altitud_min) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Altitud máxima') ?></th>
                                    <td><?= $this->Number->format($TbComunidad->altitud_max) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Altitud intermedia') ?></th>
                                    <td><?= $this->Number->format($TbComunidad->altitud_inter) ?></td>
                                </tr>

                                </table>
                            </div>
                        </div>
                    </div>
               
                </div>
                <div class="box-footer">
                    <div class="col-sm-12 text-center">
                    <?php if ($permiso['edit']) { ?>
                        <?php echo $this->Html->link('EDITAR', ['controller' => 'TbComunidad', 'action' => 'edit', 'idx' => $TbComunidad->tb_zabd_id, 'id' => $TbComunidad->id], ['class' => 'btn btn-primary'] ); ?>
                    <?php } ?>
                    <?php if ($permiso['delete']) { ?>
                        <?php echo $this->Html->link('ELIMINAR', "#",['class' => 'btn btn-danger delete-btn', 'escape' => false, "data-id"=>$TbComunidad->id])?>
                    <?php } ?>

                        <?php echo $this->Html->link('REGRESAR',['controller' => 'TbComunidad', 'action' => 'index', 'idx' => $TbComunidad->tb_zabd_id], ['class' => 'btn  btn-default']) ?>

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

<?php $url = $this->Html->link('Confirmar', ['controller' => 'TbComunidad', 'action' => 'delete', 'idx' => $TbComunidad->tb_zabd_id,'id' => $TbComunidad->id], ['class' => 'btn btn-success btn-flat btnEliminar' ]) ?>

<script>
    $(".delete-btn").click(function(){
        $("#ajax_button").html('<?php echo $url ?>');
        $("#trigger").click();
    });
</script>
