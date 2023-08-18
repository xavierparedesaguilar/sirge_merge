
<?php $this->assign('title', $mod_padre); ?>

<section class="content-header">
<h1>Recursos Fitogenéticos - Módulo Caracterización - Fenotípica</h1>

    <?php
        $this->Html->addCrumb('Recursos Fitogenéticos', '/admin/fitogenetico');
        $this->Html->addCrumb('Caracterización','/admin/fitogenetico/caracterizacion');
        $this->Html->addCrumb('Fenotípica', ['controller' => 'FenotipicaFito', 'action' => 'index']);
        $this->Html->addCrumb('Descriptor');

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
            <div class="panel panel-default box box-success"> 
                <div class="panel-heading box-header with-border">
                    <h4><i class="fa fa-envira"></i> Lista de Descriptores: <?php echo $especie->collection->colname?> - <i><?php echo $especie->genus .' '.$especie->species?></i> <?php echo $especie->autor?></h4>
                    <div class="pull-right box-tools">
                    <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/caracterizacion/Fenotipica', true) ?>"
                    class="btn btn-default"><i class="fa fa-arrow-left" ></i>  </a>

                    <?php if($permiso['add']){ ?>

                        <?php echo $this->Html->link('<i class="fa fa-plus"></i>', $this->Url->build('/' . $this->request->url . '/crear', true), ['class' => 'btn btn-success','data-toggle' => "modal", 'data-target'  => "#openModal", 'title' => "Agregar Registro.", 'escape' => false] ); ?>
                        
                        <?php } ?>

                    <?php if($permiso['export']) { ?>

                             <button type="button" data-toggle="tooltip"  title="Exportar Registros" id="export" class="btn btn-info waves-effect m-r-5" >
                                     <i class="fa fa-download" ></i>
                            </button>

                        <?php } ?>

                    </div>
                </div>
                <div class="box-body">
                     <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table id="tablaListado" class="table table-striped table-bordered table-hover">
                                <thead class="headTablaListado">
                                    <tr class="text-uppercase text-center th-head-inputs">
                                        <th style="min-width: 10px;">N°</th>                                   
                                        <th style="min-width: 10px;">DESCRIPTOR</th>
                                        <th style="min-width: 10px;">TÍTULO</th>
                                        <th style="min-width: 10px;">TIPO</th>
                                        <th style="min-width: 10px;">METODOLOGÍA DE EVALUACIÓN</th>  
                                        <th style="min-width: 10px;">CATÁLOGO</th>                                    
                                        <th><?= __('Opciones') ?></th>
                                    </tr>
                                </thead>
                                <tfoot class="footTablaListado">
                                        <tr class="text-uppercase">
                                            <td></td>                                      
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
                                    <?php foreach ($descriptor as $descriptor): ?>
                                    <tr>
                                        <td><?php echo $item ?></td>                                 
                                        <td><strong><?= strtoupper(h($descriptor->name)) ?></strong></td>
                                        <td><?= h($descriptor->title) ?></td>                                    
                                        <td><?= ($descriptor->value_type == 1)? 'CUANTITATIVO' : 'CUALITATIVO' ?></td>
                                        <td><?=  substr(h($descriptor->description),0,100) ?><?= (strlen(h($descriptor->description))>100)? '...' : ''?></td>   
                                        <td><center><?= ($descriptor->flg_catalogue == 1)? 'SI' : 'NO' ?></center></td>                                  
                                        <td class="text-center">  
                                            <?php
                                            if($descriptor->value_type == 1){
                                            ?>
                                            <?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>',
                                                    ['controller' => 'DescriptorStateFito', 'action' => 'index', 'idy' => $descriptor->specie->id, 'idx' => $descriptor->id],
                                                    ['class' => 'btn btn-warning btn-xs', 'escape' => false, 'disabled'=>true,'data-toggle' => "tooltip", 'title' => ""])
                                            ?>
                                            <?php 
                                            }else{
                                            ?> 
                                            <?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>',
                                                    ['controller' => 'DescriptorStateFito', 'action' => 'index', 'idy' => $descriptor->specie->id, 'idx' => $descriptor->id],
                                                    ['class' => 'btn btn-warning btn-xs', 'escape' => false,'data-toggle' => "tooltip", 'title' => "Agregar Estado"])
                                            ?>
                                            <?php } ?>
                                        

                                            <?php if ($permiso['view']) { ?>
                                                <?php echo $this->Html->link('<i class="fa  fa-search-plus"></i>',
                                                        ['controller' => 'DescriptorFito', 'action' => 'view', 'idx' => $descriptor->specie->id, 'id' => $descriptor->id],
                                                        ['class' => 'btn btn-success btn-xs', 'escape' => false, 'data-toggle' => "modal", 'data-target'  => "#openModal",'title' => "Ver Detalle"])
                                                ?> 


                                            <?php } ?>

                                            <?php if ($permiso['edit']) { ?>

                                            <?php echo $this->Html->link('<i class="fa fa-pencil-square-o"></i>',
                                                    ['controller' => 'DescriptorFito', 'action' => 'edit', 'idx' => $descriptor->specie->id, 'id' => $descriptor->id],
                                                    ['class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => "modal", 'data-target'  => "#openModal", 'title' => "Editar Registro"])
                                            ?>

                                            <?php } ?>

                                            <?php if ($permiso['delete']) { ?>

                                            <?php echo $this->Html->link('<i class="fa fa-trash"></i>', "#",
                                                    ['class' => 'btn btn-danger btn-xs delete-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Eliminar Registro', 'data-id' => $descriptor->id])
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

<!--Modal  -->
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

<div class="modal fade" id="exportar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title " id="myModalLabel"><strong><i class="fa fa-download" ></i> Exportar Registros</strong></h4>
            </div>
            <?php echo $this->Form->create(NULL, ['url' => ['action' => 'exportartabla', 'idx' => $especie->id]]); ?>
            <div class="modal-body">
                <p><h4>¿Desea descargar el reporte?</h4></p>
                <?php echo $this->Form->control('filename', ['type' => 'hidden', 'id' => 'filename']) ?>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                <button type="submit" class="btn btn-success" id="btnReportesTabla"> <i class="fa fa-check" aria-hidden="true"></i> Aceptar</button>
       
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>



<script>
    $(function () {
        
        tablaListadoDataTable();
		document.getElementById("tablaListado").parentElement.classList.add("table-responsive");
    });

    $(".delete-btn").click(function(){
        $("#ajax_button").html("<a href='<?php echo $this->Url->build('/'.$this->request->url.'/eliminar/', true) ?>"+ $(this).attr("data-id")+"' class='btn btn-success btn-flat btnEliminar'>Confirmar</a>");
        $("#trigger").click();
    });
</script>