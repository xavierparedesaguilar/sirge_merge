
<?php $this->assign('title', $titulo); ?>

<section class="content-header">
    <h1>Módulo <?php echo $titulo?></h1>



       <?php
        $this->Html->addCrumb('Recursos Zoogenéticos', '/admin/zoogenetico');
        $this->Html->addCrumb('Gestión Inventario', '/admin/zoogenetico/gestion-inventario');
        $this->Html->addCrumb('Banco ADN', ['controller' => 'BankDnaZoo', 'action' => 'index']);
        $this->Html->addCrumb($id, ['controller' => 'InputDnaZoo', 'action' => 'index','id'=>$id]);
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

<div class="col-xs-12 col-md-12 col-lg-12" id="mensaje_info">

</div>

<div class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>Listado de <?php echo $titulo_lista ?></strong></h3>
                    <div class="pull-right box-tools">

                        <?php if($permiso['add']){ ?>

                        <?php echo $this->Html->link('<i class="fa fa-plus" ></i>',
                                    ['controller' => 'InputDnaZoo', 'action' => 'add','id'=>$id],
                                    ['class' => 'btn btn-success', 'data-toggle'=> "tooltip",  'title'=> "Nueva Entrada de Material", 'escape'=>false] )
                        ?>
                        <?php } ?>

                        <?php if($permiso['export']) { ?>

                             <button type="button" data-toggle="tooltip"  title="Exportar Listado de <?php echo $titulo_lista ?>" id="export" class="btn btn-info waves-effect m-r-5" >
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
                 <th style="min-width: 40px;">#</th>
                 <th style="min-width: 165px;">COD. DEL DONANTE</th>
                 <th style="min-width: 170px;">NOM. DEL DONANTE</th>
                 <th style="min-width: 165px;">COD. DE ACCESIÓN</th>
                 <th style="min-width: 160px;">FECHA DE ENTRADA</th>
                 <th style="min-width: 180px;">NUM. DE CRIOVIALES</th>
                 <th style="min-width: 170px;">TIPO DE DEPÓSITO</th>
                 <th style="min-width: 170px;">TIPO DE MUESTRA</th>
                 <th style="min-width: 170px;">ESTADO DE MUESTRA</th>
                 <th style="min-width: 150px;">OPCIONES</th>
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
                                <td></td>
                            </tr>
        </tfoot>
        <tbody>
            <?php $item = 1; ?>
            <?php foreach ($inputDna as $inputDna): ?>
             <tr>
                <td><?php echo $this->Number->format($item) ?></td>
                <td><?php echo ($inputDna->donorcore) ?></td>
                <td><?php echo ($inputDna->donorname) ?></td>
                <td><?php echo ($inputDna->donornumb) ?></td>
                <td><?php echo  $inputDna->enterdate==null || $inputDna->enterdate==''?'':date("d-m-Y", strtotime($inputDna->enterdate))?></td>
                <td><?php echo ($inputDna->numtubent) ?></td>
                <td><?php echo ($inputDna->deposito==null?'':$inputDna->deposito->name ) ?></td>
                <td><?php echo ($inputDna->muestra==null?'':$inputDna->muestra->name ) ?></td>
                <td><?php echo ($inputDna->estado==null?'':$inputDna->estado->name ) ?></td>


                <td>
                        <?php if($permiso['view']){ ?>

                      <a href="<?php echo $this->Url->build('/'.$this->request->url.'/ver/'.$inputDna->id, true) ?>" class="btn btn-info btn-xs" data-toggle = "tooltip" title = "Ver información de la Entrada de Material."><i class="fa  fa-search-plus"></i></a>

                      <?php } ?>



                        <?php

                            /*$validar=$permiso['role_id']==1?true:$permiso['station_id']==$passport['station_current_id'];*/

                       ?>

                      <?php if($permiso['edit'] /*&& $validar*/ ) { ?>

                      <a href="<?php echo $this->Url->build('/'.$this->request->url.'/editar/'.$inputDna->id, true) ?>" class="btn btn-primary btn-xs" data-toggle = "tooltip" title = "Editar información de la Entrada de Material."><i class="fa fa-pencil-square-o"></i></a>

                      <?php } ?>

                      <?php if($permiso['delete'] /*&& $validar*/) { ?>

                      <?php echo $this->Html->link('<i class="fa fa-trash-o"></i>', "#",
                                                ['class' => 'btn btn-danger btn-xs delete-btn', 'escape' => false, "data-id"=>$inputDna->id, 'data-toggle' => "tooltip", 'title' => "Eliminar la Entrada de Material."])
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


<a data-target="#ConfirmDelete" role="button" data-toggle="modal" id="trigger"></a>
<div class="modal fade" id="ConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">MENSAJE</h4>
            </div>
            <div class="modal-body">
                <p>¿Desea eliminar el registro actual?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
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