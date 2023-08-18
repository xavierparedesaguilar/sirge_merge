<?php $this->assign('title', $titulo); ?>

<!-- Page Content -->
<section class="content-header">
<h1>Recursos Fitogenéticos - Inventarios - Banco de Semillas</h1>

    <?php
        $this->Html->addCrumb('Recursos Fitogenéticos', '/admin/fitogenetico');
        $this->Html->addCrumb('Gestión Inventario', '/admin/fitogenetico/gestion-inventario');
        $this->Html->addCrumb('Banco Semilla', ['controller' => 'BankSeed', 'action' => 'index']);
        $this->Html->addCrumb($id, ['controller' => 'InputSeed', 'action' => 'index','id'=>$id]);
        $this->Html->addCrumb('Entrada');
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
<!-- Page Header -->
<div class="col-xs-12 col-md-12 col-lg-12" id="mensaje_info">

</div>

<div class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-default box box-success">
                <div class="panel-heading box-header with-border box-title">
                    <h4><i class="fa  fa-sign-in"></i> Listado de Entradas de Material: LOTE <?php echo $id ?> </h4>
                    <div class="pull-right box-tools">
                        <?php echo $this->Html->link('<i class="fa fa-arrow-left" ></i>',
                                ['controller' => 'BankSeed', 'action' => 'index'],
                                ['class' => 'btn  btn-default', 'data-toggle'=> "tooltip",  'title'=> "Regresar", 'escape'=>false])
                        ?>

                        <?php if($permiso['add']) { ?>

                        <?php echo $this->Html->link('<i class="fa fa-plus" ></i>',
                                    ['controller' => 'InputSeed', 'action' => 'add','id'=>$id],
                                    ['class' => 'btn btn-success', 'data-toggle'=> "tooltip",  'title'=> "Nueva Entrada de Banco Semilla", 'escape'=>false] )
                        ?>

                        <?php } ?>



                        <!-- <?php if($permiso['export']) { ?>

                             <button type="button" data-toggle="tooltip"  title="Exportar Listado de <?php echo $titulo_lista ?>" id="export" class="btn btn-info waves-effect m-r-5" >
                                     <i class="fa fa-download" ></i>
                            </button>

                        <?php } ?> -->


                    </div>
                </div>
                <div class="box-body">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table id="tablaListado" class="table table-striped table-bordered table-hover">
                                <thead class="headTablaListado">
                                    <tr class="text-uppercase text-center th-head-inputs">
                                        <th style="min-width: 10px;">N°</th>
                                        <th style="min-width: 65px;">COD. DEL DONANTE</th>
                                        <th style="min-width: 170px;">NOM. DEL DONANTE</th>
                                        <th style="min-width: 100px;">CÓDIGO DE ACCESIóN </th>
                                        <th style="min-width: 80px;">FECHA DE ENTRADA</th>
                                        <th style="min-width: 50px;">PESO DE LA SEMILLA</th>
                                        <th style="min-width: 50px;">NUM. DE SEMILLAS</th>
                                        <th style="min-width: 370px;">DESCRIPCIÓN</th>
                                        <th style="min-width: 50px;">OPCIONES</th>
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
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $item = 1; ?>
                                        <?php foreach ($inputSeed as $inputSeed): ?>
                                        <tr>
                                            <td><?php echo $this->Number->format($item) ?></td>
                                            <td><?= h($inputSeed->donorcore) ?></td>
                                            <td><?= h($inputSeed->donorname) ?></td>
                                            <td><?= h($inputSeed->donornumb) ?></td>
                                            <td><center><?= empty($inputSeed->enterdate)? '' : date("d-m-Y", strtotime($inputSeed->enterdate))  ?></center></td>
                                            <td><center><?= h($inputSeed->weightent) + 0.00?> g.</center></td>
                                            <td><center><?= h($inputSeed->numtubent) ?></center></td>
                                            <td><?= h($inputSeed->rement) ?></td>
                                            <td class="text-center">
                                                <!-- <?php if($permiso['view']) { ?>
                                                    <a href="<?php echo $this->Url->build('/'.$this->request->url.'/ver/'.$inputSeed->id, true) ?>" class="btn btn-info btn-xs" data-toggle = "tooltip" title = "Ver información de la Entrada de Material."><i class="fa  fa-search-plus"></i></a>
                                                <?php } ?> -->
                                                <?php
                                                    /*$validar=$permiso['role_id']==1?true:$permiso['station_id']==$passport['station_current_id'];*/
                                                ?>

                                                <?php if($permiso['edit'] /*&& $validar*/) { ?>

                                                <a href="<?php echo $this->Url->build('/'.$this->request->url.'/editar/'.$inputSeed->id, true) ?>" class="btn btn-primary btn-xs" data-toggle = "tooltip" title = "Editar Registro"><i class="fa fa-pencil-square-o"></i></a>

                                                <?php } ?>

                                                <?php if($permiso['delete'] /*&& $validar*/ ) { ?>

                                                <?php echo $this->Html->link('<i class="fa fa-trash-o"></i>', "#",
                                                    ['class' => 'btn btn-danger btn-xs delete-btn', 'escape' => false, "data-id"=>$inputSeed->id, 'data-toggle' => "tooltip", 'title' => "Eliminar Registro"])
                                                ?>

                                                <?php } ?>

                                            </td>
                                        </tr>
                                        <?php $item++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<a data-target="#ConfirmDelete" role="button" data-toggle="modal" id="trigger"></a>
<div class="modal fade" id="ConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm ">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><strong><i class="fa fa-trash-o"></i> Eliminar</strong></h4>
            </div>
            <div class="modal-body">
            <p><h4>¿Desea eliminar el registro actual?</h4></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left " data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                <div id="ajax_button"></div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de exportar archivo excel  -->
<!-- <div class="modal fade" id="exportar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center" id="myModalLabel"><strong>MENSAJE</strong></h4>
            </div>
            <?php echo $this->Form->create(NULL, ['url' => ['action' => 'exportartabla', 'id'=>$id]]); ?>
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
</div> -->

<script>

    $(function () {
        tablaListadoDataTable($('#tablaListado').attr('id'));
		document.getElementById("tablaListado").parentElement.classList.add("table-responsive");
    });

    $(".delete-btn").click(function(){
        $("#ajax_button").html("<a href='<?php echo $this->Url->build('/'.$this->request->url.'/eliminar/', true) ?>"+ $(this).attr("data-id")+"' class='btn btn-success btn-flat btnEliminar'>Confirmar</a>");
        $("#trigger").click();
    });
</script>