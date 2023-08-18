
<?php $this->assign('title', $mod_padre); ?>

<section class="content-header">
<h1>Recursos Fitogenéticos - Módulo Caracterización - Fenotípica</h1>

    <?php
        $this->Html->addCrumb('Recursos Fitogenéticos', '/admin/fitogenetico');
        $this->Html->addCrumb('Caracterización','/admin/fitogenetico/caracterizacion');
        $this->Html->addCrumb('Fenotípica', ['controller' => 'FenotipicaFito', 'action' => 'index']);
        $this->Html->addCrumb('Descriptor', ['controller' => 'DescriptorFito', 'action' => 'index', 'id' => $especie->id ]);
        $this->Html->addCrumb($descriptor->name, ['controller' => 'DescriptorStateFito', 'action' => 'index', 'idx' => $descriptor->id, 'idy' => $especie->id ]);
        $this->Html->addCrumb('Estados');

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
                    <h4><i class="fa fa-pagelines"></i> Lista de Estados</h4>
                    <div class="box-tools pull-right">
                  
                        <?php echo $this->Html->link('<i class="fa fa-arrow-left"></i>',['controller' => 'DescriptorFito', 'action' => 'index', 'id' => $especie->id], ['class' => 'btn btn-default', 'escape' => false] ); ?>   
                        <?php if ($permiso['add']) { ?>
                            <?php echo $this->Html->link('<i class="fa fa-plus"></i>',['controller' => 'DescriptorStateFito', 'action' => 'add', 'idy' => $descriptor->specie_id, 'idx' => $descriptor->id], ['class' => 'btn btn-success','data-toggle' => "modal", 'data-target'  => "#openModal", 'title' => "Agregar Estado", 'escape' => false] ); ?>

                        <?php } ?>
                    </div>
                </div>
                <div class="box-body">
                    <div>
                        <table id="tablaListado" class="table table-striped table-bordered table-hover">
                            <thead class="headTablaListado">
                                <tr class="text-uppercase text-center th-head-inputs">
                                    <th style="min-width: 1px;">N°</th>
                                    <th style="min-width: 10px;">ABREVIATURA</th>
                                    <th style="min-width: 100px;">DESCRITPOR</th>
                                    <th style="min-width: 10px;">ESTADO</th>
                                    <th style="min-width: 200px;">NOMBRE DE ESTADO</th>                                   
                                    <th style="min-width: 10px;"><?= __('OPCIONES') ?></th>
                                </tr>
                            </thead>
                            <tfoot class="footTablaListado">
                                    <tr class="text-uppercase">
                                        <td></td>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <td></td>
                                    </tr>
                            </tfoot>
                            <tbody>
                                <?php $item = 1; ?>
                                <?php foreach ($descriptorState as $descriptorState): ?>
                                <tr>
                                    <td><?php echo $item ?></td>
                                    <td><strong><?= strtoupper(h($descriptor->name)) ?></strong></td>  
                                    <td><?= h($descriptor->title) ?></td>  
                                    <td class="text-center"><?= h($descriptorState->code) ?></td>
                                    <td><?= h($descriptorState->label) ?></td>                                   
                                    <td class="text-center">
                                    <?php if ($permiso['edit']) { ?>

                                        <?php echo $this->Html->link('<i class="fa fa-pencil-square-o"></i>',
                                                ['controller' => 'DescriptorStateFito', 'action' => 'edit', 'idy' => $descriptorState->descriptor->specie_id, 'idx' => $descriptorState->descriptor->id, 'id' => $descriptorState->id],
                                                ['class' => 'btn btn-primary btn-xs', 'escape' => false,  'data-toggle' => "modal", 'data-target'  => "#openModal", 'title' => "Editar Estado"])
                                        ?>

                                    <?php } ?>

                                    <?php if ($permiso['delete']) { ?>
                                        <?php echo $this->Html->link('<i class="fa fa-trash"></i>', "#",
                                                ['class' => 'btn btn-danger btn-xs delete-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Eliminar Estado', 'data-id' => $descriptorState->id])
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
            <p><h4>¿Desea eliminar el Estado actual?</h4></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left " data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                <div id="ajax_button"></div>
            </div>
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
