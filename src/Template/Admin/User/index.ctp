
<?php $this->assign('title', $mod_padre); ?>

<!-- Page Content -->
<section class="content-header">
    <h1>Configuración - Módulo <?php echo $titulo ?></h1>

    <?php
        $this->Html->addCrumb('Usuarios', ['controller'=> 'User', 'action' => 'index']);

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
<div class="col-xs-12 col-md-12 col-lg-12" id="mensaje_info">

</div>

<!-- Page Body -->
<div class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
        <div class="panel panel-default box box-success"> 
                <div class="panel-heading box-header with-border">
                    <h4 class="box-title"><i class="fa fa-user-o" aria-hidden="true"></i> Listado de Usuarios del Sistema</h4>
                    <div class="pull-right box-tools">

                        <?php if($permiso['add']) { ?>
                            <?php
                                echo $this->Html->link('<i class="fa fa-plus" ></i>',['controller' => 'User', 'action' => 'add'],['class' => 'btn btn-success', 'escape' => false, 'data-toggle' => "tooltip", 'title' => "Nuevo Registro"]);
                            ?>
                        <?php } ?>

                        <?php if($permiso['export']) { ?>                            
                             <button type="button" data-toggle="tooltip"  title="Exportar Registros" id="export" class="btn btn-info waves-effect m-r-5" >
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
                                    <td style="min-width: 10px;">N°</td>
                                    <th style="min-width: 350px;">NOMBRES Y APELLIDOS</th>     
                                    <th>USUARIO</th>
                                    <th>PERFIL</th>
                                    <th>Estación Experimental</th>
                                    <th>ESTADO</th>
                                    <th>OPCIONES</th>
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
                                <?php foreach ($user as $user): ?>
                                <tr class="text-uppercase">
                                    <td><?= $item ?></td>
                                    <td><?= h($user->names) ?> <?= h($user->surnames) ?></td>     
                                    <td><?= h($user->username) ?></td>
                                    <td><?php echo $user->role->name ?></td>
                                    <td><?= h($user->station->eea) ?></td>
                                    <td><?= ($this->Number->format($user->status)==1) ? 'ACTIVO' : 'INACTIVO' ?></td>
                                    <td class="text-center">

                                        <?php if($permiso['edit']) { ?>

                                        <?php echo $this->Html->link('<i class="fa fa-key"></i>',
                                            ['action' => 'changePass', $user->id], [
                                             'class'        => 'btn btn-warning btn-xs',
                                             'data-toggle'  => 'modal',
                                             'data-target'  => "#openModal",
                                             'data-tamanio' => 'sm',
                                             'escape'       => false,
                                             'data-toggle'  => "tooltip", 'title' => "Cambiar la contraseña"
                                            ]);
                                        ?>

                                        <?php } ?>


                                        <?php if($permiso['view']) { ?>

                                        <?php echo $this->Html->link('<i class="fa fa-search-plus"></i>',
                                            ['action' => 'view', $user->id], [
                                            'class'        => 'btn btn-success btn-xs',
                                            'data-toggle'  => 'modal',
                                            'data-target'  => "#openModal",
                                            'data-tamanio' => '',
                                            'escape'       => false,
                                            'data-toggle'  => "tooltip", 'title' => "Ver Detalle"
                                            ]);
                                        ?>

                                        <?php } ?>

                                        <?php if($permiso['edit']) {?>

                                        <?= $this->Html->link('<i class="fa fa-pencil-square-o"></i>',
                                                ['controller' => 'User', 'action' => 'edit', $user->id],
                                                ['class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => "tooltip", 'title' => "Editar Registro"])
                                        ?>

                                        <?php } ?>

                                        <?php if($permiso['delete']){ ?>
                                        <?php
                                            echo $this->Html->link('<i class="fa fa-trash-o"></i>', "#",
                                                ['class' => 'btn btn-danger btn-xs delete-btn', 'escape' => false, "data-id"=>$user->id, 'data-toggle' => "tooltip", 'title' => "Eliminar Registro"])
                                        ?>
                                        <?php } ?>

                                    </td>
                                </tr>
                                <?php $item ++; ?>
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
            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><strong><i class="fa fa-trash-o"></i> Eliminar</strong></h4>
            </div>
            <div class="modal-body">
                <p><h4>¿Desea eliminar Usuario?</h4></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
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
            <?php echo $this->Form->create(NULL, ['url' => ['action' => 'exportartabla']]); ?>
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
        
        // $('#tablaListado tbody').on('mouseenter', 'td', function () {
        //     var colIdx = table.cell(this).index().column;
    
        //     $(table.cells().nodes()).removeClass('highlight');
        //     $(table.column(colIdx).nodes()).addClass('highlight');
        // });
    });
    $(".delete-btn").click(function(){
        $("#ajax_button").html("<a href='<?php echo $this->Url->build('/'.$this->request->url.'/eliminar/', true) ?>"+ $(this).attr("data-id")+"' class='btn btn-success btn-flat btnEliminar'>Confirmar</a>");
        $("#trigger").click();
    });
</script>