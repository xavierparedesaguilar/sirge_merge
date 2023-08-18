<?php $this->assign('title', $mod_title); ?>

<!-- Page Content -->
<section class="content-header">
    Módulo <?php echo $mod_modulo  ?> <h1><?php echo $mod_title ?></h1>
    <?php echo ($Zabd->nombre) ?>

    <?php
    $this->Html->addCrumb("$mod_modulo", ['controller' => 'Zabd', 'action' => 'index']);
    $this->Html->addCrumb($Zabd->cod_zabd, ['controller' => 'TbPadronComuneros', 'action' => 'index', 'idx' => $Zabd->id]);
    $this->Html->addCrumb('Registros', ['controller' => 'TbPadronComuneros', 'action' => 'index', 'idx' => $Zabd->id]);
    $this->Html->addCrumb($TbPadronComuneros->id, ['controller' => 'TbPadronComuneros', 'action' => 'view', 'idx' => $Zabd->id, 'id' => $TbPadronComuneros->id]);
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
                        ['controller' => 'TbPadronComuneros', 'action' => 'index', 'idx' => $Zabd->id],
                        ['class' => 'btn  btn-default', 'data-toggle' => "tooltip", 'title' => "Regresar", 'escape' => false]
                    )
                    ?>
                <h3 class="box-title">  <strong> | Ver registro | </strong> <?php echo ($mod_title) ?></h3>
                    <div class="pull-right box-tools">
                        <?php if ($permiso['edit']) { ?>
                            <?php echo $this->Html->link(
                                '<i class="fa fa-edit" ></i>',
                                ['controller' => 'TbPadronComuneros', 'action' => 'edit', 'idx' => $TbPadronComuneros->tb_zabd_id, 'id' => $TbPadronComuneros->id],
                                ['class' => 'btn btn-primary', 'data-toggle' => "tooltip",  'title' => "Editar", 'escape' => false]
                            ); ?>
                        <?php } ?>

                        <?php if ($permiso['delete']) { ?>
                            <?php echo $this->Html->link('<i class="fa fa-trash" ></i>', "#", ['class' => 'btn btn-danger delete-btn', 'data-toggle' => "tooltip",  'title' => "Eliminar", 'escape' => false, "data-id" => $TbPadronComuneros->id]) ?>
                        <?php } ?>

                        <?php echo $this->Html->link(
                            '<i class="fa fa-arrow-left" ></i>',
                            ['controller' => 'TbPadronComuneros', 'action' => 'index', 'idx' => $TbPadronComuneros->tb_zabd_id],
                            ['class' => 'btn  btn-default', 'data-toggle' => "tooltip",  'title' => "Regresar", 'escape' => false]
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
                                        <th scope="row"><?= __('Tipo de documento') ?></th>
                                        <td><?php

                                            $documento = '';
                                            if ($TbPadronComuneros->tipo_documento == NULL || $TbPadronComuneros->tipo_documento == '') {
                                                echo $documento;
                                            } elseif ($TbPadronComuneros->tipo_documento == 1) {
                                                echo $documento = 'DNI';
                                            } elseif ($TbPadronComuneros->tipo_documento == 2) {
                                                echo $documento = 'PTP';
                                            } elseif ($TbPadronComuneros->tipo_documento == 3) {
                                                echo $documento = 'C. Extranjería';
                                            }


                                            ?></td>
                                    </tr>

                                    <tr>
                                        <th scope="row"><?= __('Número de documento de Identidad') ?></th>
                                        <td><?= $TbPadronComuneros->numero_documento_identidad ?></td>
                                    </tr>

                                    <tr>
                                        <th scope="row"><?= __('Nombres completos') ?></th>
                                        <td><?= h($TbPadronComuneros->nombres_apellidos) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Fecha de nacimiento') ?></th>
                                        <td><?php

                                            $fecha = '';
                                            if ($TbPadronComuneros->fecha_nacimiento == NULL || $TbPadronComuneros->fecha_nacimiento == '') {
                                                echo $fecha;
                                            } else {
                                                echo $fecha = (date("d-m-Y", strtotime($TbPadronComuneros->fecha_nacimiento)));
                                            }

                                            ?></td>
                                    </tr>


                                    <!--  -->
                                
                                        <tr>
                                            <th scope="row"><?= __('Género o sexo') ?></th>
                                            <td><?php
                                                $sexo = $TbPadronComuneros->genero;
                                                if ($sexo == NULL || $sexo == '') {
                                                    echo '';
                                                } elseif($sexo == 'M') {
                                                    echo "Masculino (M)";
                                                }
                                                elseif($sexo == 'F'){
                                                    echo "Femenino (F)";
                                                }

                                                ?></td>
                                        </tr>

                                        <tr>
                                            <th scope="row"><?= __('Distrito') ?></th>
                                            <td><?= $TbPadronComuneros->ubigeo->distrito ?></td>

                                        </tr>
                                        <tr>
                                            <th scope="row"><?= __('Provincia') ?></th>
                                            <td><?= $TbPadronComuneros->ubigeo->provincia ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?= __('Departamento') ?></th>
                                            <td><?= $TbPadronComuneros->ubigeo->departamento->nombre?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?= __('Comunidad registrada a la que pertenece') ?></th>
                                            <td><?= $TbPadronComuneros->tb_centro_poblado->centro_poblado ?></td>
                                        </tr>


                                    <!--  -->

                                    <tr>
                                        <th scope="row"><?= __('Primera observación') ?></th>
                                        <td><?= h($TbPadronComuneros->observacion1) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Segunda observación') ?></th>
                                        <td><?= h($TbPadronComuneros->observacion2) ?></td>
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
                            <?php echo $this->Html->link('EDITAR', ['controller' => 'TbPadronComuneros', 'action' => 'edit', 'idx' => $TbPadronComuneros->tb_zabd_id, 'id' => $TbPadronComuneros->id], ['class' => 'btn btn-primary']); ?>
                        <?php } ?>

                        <?php if ($permiso['delete']) { ?>
                            <?php echo $this->Html->link('ELIMINAR', "#", ['class' => 'btn btn-danger delete-btn', 'escape' => false, "data-id" => $TbPadronComuneros->id]) ?>
                        <?php } ?>

                        <?php echo $this->Html->link('REGRESAR', ['controller' => 'TbPadronComuneros', 'action' => 'index', 'idx' => $TbPadronComuneros->tb_zabd_id], ['class' => 'btn  btn-default']) ?>

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

<?php $url = $this->Html->link('Confirmar', ['controller' => 'TbPadronComuneros', 'action' => 'delete', 'idx' => $TbPadronComuneros->tb_zabd_id, 'id' => $TbPadronComuneros->id], ['class' => 'btn btn-success btn-flat btnEliminar']) ?>

<script>
    $(".delete-btn").click(function() {
        $("#ajax_button").html('<?php echo $url ?>');
        $("#trigger").click();
    });
</script>
