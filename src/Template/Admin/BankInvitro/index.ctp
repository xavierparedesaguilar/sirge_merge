<?php $this->assign('title', $titulo); ?>

<!-- Page Content -->
<!-- Page Content -->
<section class="content-header">
<h1>Recursos Fitogenéticos - Inventarios - Banco <em>In vitro</em></h1>

  <?php
        $this->Html->addCrumb('Recursos Fitogenéticos', '/admin/fitogenetico');
        $this->Html->addCrumb('Gestión Inventario', '/admin/fitogenetico/gestion-inventario');
        $this->Html->addCrumb('Banco In Vitro', ['controller' => 'BankInvitro', 'action' => 'index']);

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
                    <h4><i class="fa fa-list-alt" aria-hidden="true"></i> Listado de Registros de Inventario</h4>
                    <div class="pull-right box-tools">

                        <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/gestion-inventario', true) ?>"
						class="btn btn-default"><i class="fa fa-arrow-left" ></i>  </a>

                        <?php if($permiso['add']){ ?>

                            <?php echo $this->Html->link('<i class="fa fa-plus" ></i>',
                                        ['controller' => 'BankInvitro', 'action' => 'add'],
                                        ['class' => 'btn btn-success', 'data-toggle'=> "tooltip",  'title'=> "Nuevo Registro", 'escape'=>false] )
                            ?>

                        <?php } ?>

                        <?php if($permiso['import']) { ?>

                            <?php echo $this->Html->link('<i class="fa fa-cloud-upload" ></i>',
                                        ['controller' => 'BankInvitro', 'action' => 'import'],
                                        ['class' => 'btn btn-warning', 'data-toggle'=> "tooltip",  'title'=> "Importar Registro", 'escape'=>false] )
                            ?>

                        <?php } ?>
                        
                        <?php if($permiso['export']) { ?>

                             <button type="button" data-toggle="tooltip"  title="Exportar Registro" id="export" class="btn btn-info waves-effect m-r-5" >
                                     <i class="fa fa-download" ></i>
                             </button>

                        <?php } ?>

                    </div>
                </div>
                
                 <div class="box-body">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table id="tablaListado" class="table table-striped table-bordered table-hover">
                                <thead class="headTablaListado">
                                    <tr class=" text-center th-head-inputs">
                                        <th style="min-width: 10px;">N°</tg>
                                        <th style="min-width: 35px;">LOTE</th>
                                        <th style="min-width: 70px;">CÓDIGO DE<br>ACCESIÓN</th>
                                        <th style="min-width: 80px;">NOMBRE DE<br>LA ACCESIÓN</th>
                                        <th style="min-width: 70px;">OTRO CÓDIGO</th>                                      
                                        <th style="min-width: 170px;">COLECCIÓN</th>
                                        <th style="min-width: 165px;">NOMBRE CIENTÍFICO</th>
                                        <th style="min-width: 100px;">NOMBRE COMÚN</th>
                                        <th style="min-width: 80px;">FECHA DE<br>INTRODUCCIÓN</th>
                                        <th style="min-width: 80px;">ALMACENAMIENTO</th>
                                        <th style="min-width: 80px;">STOCK<br>Num. de Tubos</th>
                                        <th style="min-width: 80px;">NUM. DE<br> EXPLANTES</th>
                                        <th style="min-width: 70px;">UBICACIÓN DEL MATERIAL<br>Estanderia - Nivel - Gradilla</th>
                                        <th style="min-width: 80px;">DISPONIBILIDAD<br>DEL LOTE</th>
                                        <th style="min-width: 200px;" >OPCIONES</th>
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
                                    <?php 
                                    $item = 1;  
                                        $per = 0;
                                        $conn = \Cake\Datasource\ConnectionManager::get('default');
                                        
                                        if( $current_user['role_id'] == 1 ){
                                            $per = 1;
                                        }else {
                                            $sqlAcceso ="SELECT estado FROM permiso_estacion AS p WHERE p.idusuario =".$current_user['id'];
                                            $stmtAcceso = $conn->prepare($sqlAcceso);
                                            $stmtAcceso->execute();
                                        
                                            if( $stmtAcceso->rowCount() > 0){
                                                $rowAcceso = $stmtAcceso->fetch();
                                                
                                                if($rowAcceso[0] == 1){
                                                    $per = 1;
                                                }
                                            }
                                        }
                                      foreach ($bankInvitrolist as $bankInvitrolist){      
                                    ?>	
                                    <?php if(($permiso['station_id']==$bankInvitro->passport->station_current_id || $per == 1) || $permiso['role_id']==1){ ?>	 

                                    <tr>
                                        <td><?php echo $this->Number->format($item) ?></td>
                                        <td>
                                            <center>
                                                <span>
                                                    <strong>

                                                        <?php echo $this->Html->link(h($bankInvitrolist['lotnumb']),
                                                            ['controller' => 'BankInvitro', 'action' => 'view', $bankInvitrolist['id']],
                                                            ['class' => 'badge badge-success', 'escape' => false, 'data-toggle' => "tooltip", 'title' => "Ver Detalle"])
                                                        ?>
                                                    </strong>
                                                </span>
                                            </center>
                                        </td>
                                        <td><?php echo h($bankInvitrolist['accenumb'])?></td>
                                        <td><?php echo h($bankInvitrolist['accname'])?></td>
                                        <td><?php echo h($bankInvitrolist['othernumb'])?></td>
                                        <td><?php echo h($bankInvitrolist['colname'])?></td>
                                        <td><em><?php echo h($bankInvitrolist['specie'])?></em> <?php echo h($bankInvitrolist['autor'])?></td>
                                        <td><?php echo h($bankInvitrolist['cropname'])?></td>                                    
                                        <td><center><?php echo ($bankInvitrolist['fecha'] == NULL || $bankInvitrolist['fecha']=='')? '' : date("d-m-Y", strtotime($bankInvitrolist['fecha']))  ?></center></td>
                                        <td><?php echo h($bankInvitrolist['almacen'])?></td>
                                                                               
                                        <td>
                                        <center>
                                             <strong>                                            
                                                <?php 
                                                    $contenedor=$bankInvitrolist['tubenumb'] ;
                                                    if($contenedor!=''){
                                                        echo"<span class='badge badge-warning'><strong>".$contenedor."</strong></span>";
                                                    }else{
                                                        echo"<span class='badge badge-danger'><strong>0</strong></span>";
                                                    } 
                                                 ?>
                                             </strong>
                                        </center>
                                        </td>
                                        <td>
                                        <center>                                       
                                            <?php
                                                $explante=$bankInvitrolist['explnumb'];
                                                if($explante!=''){
                                                    echo"<span class='badge badge-warning'><strong>".$explante."</strong></span>";
                                                }else{
                                                    echo"<span class='badge badge-danger'><strong>0</strong></span>";
                                                } 
                                            ?>          
                                        </center>
                                        </td> 
                                        <td><center><?php echo h($bankInvitrolist['estanderia'])?></center></td>                                                      
                                        <td><center><?php echo ($this->Number->format($bankInvitrolist['availability']) == 331) ? 'SI' : 'NO' ?></center></td>
                                        <td>
                                        <center>
                                                <?php
                                                /*$validar=$permiso['role_id']==1?true:$permiso['station_id']==$bankInvitro->passport->station_current_id;*/
                                                ?>

                                                    <?php echo $this->Html->link('<i class="fa  fa-share-alt"></i>',
                                                                                            ['controller' => 'propagationInvitro', 'action' => 'index', $bankInvitrolist['id']],
                                                                                            ['class' => 'btn btn-default btn-xs', 'escape' => false, 'data-toggle' => "tooltip", 'title' => "Propagación"])
                                                        ?>

                                                    <?php echo $this->Html->link('<i class="fa fa-cubes" aria-hidden="true"></i>',
                                                                                        ['controller' => 'conservationInvitro', 'action' => 'index','id'=> $bankInvitrolist['id']],
                                                                                        ['class' => 'btn btn-default btn-xs', 'escape' => false, 'data-toggle' => "tooltip", 'title' => "Conservación"])
                                                                                ?>

                                                    <?php echo $this->Html->link('<i class="fa  fa-sign-in"></i>',
                                                                                        ['controller' => 'inputInvitro', 'action' => 'index', $bankInvitrolist['id']],
                                                                                        ['class' => 'btn btn-success btn-xs', 'escape' => false, 'data-toggle' => "tooltip", 'title' => "Entrada"])
                                                                                ?>


                                                    <?php echo $this->Html->link('<i class="fa  fa-sign-out"></i>',
                                                                                        ['controller' => 'outputInvitro', 'action' => 'index', $bankInvitrolist['id']],
                                                                                        ['class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => "tooltip", 'title' => "Salida"])
                                                                                ?>


                                                    <?php  if($permiso['view']) {?>

                                                            <?php echo $this->Html->link('<i class="fa  fa-search-plus"></i>',
                                                                                                ['controller' => 'BankInvitro', 'action' => 'view', $bankInvitrolist['id']],
                                                                                                ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => "tooltip", 'title' => "Ver Detalle"])
                                                            ?>

                                                    <?php  } ?>

                                                    <?php  if($permiso['edit'] /*&& $validar*/) {?>


                                                        <?php echo $this->Html->link('<i class="fa fa-pencil-square-o"></i>',
                                                                                            ['controller' => 'BankInvitro', 'action' => 'edit', $bankInvitrolist['id']],
                                                                                            ['class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => "tooltip", 'title' => "Editar Registro"])
                                                        ?>

                                                    <?php  } ?>

                                                    <?php  if($permiso['delete'] /*&& $validar*/) {?>

                                                        <?php echo $this->Html->link('<i class="fa fa-trash-o"></i>', "#",
                                                                                            ['class' => 'btn btn-danger btn-xs delete-btn', 'escape' => false, "data-id"=>$bankInvitrolist['id'], 'data-toggle' => "tooltip", 'title' => "Eliminar Registro"])
                                                        ?>

                                                    <?php } ?>
                                        </center>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                    $item++;
                                        }
                                ?>
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
        $("#ajax_button").html("<a href='<?php echo $this->Url->build('/'.$this->request->url.'/eliminar/', true) ?>"+ $(this).attr("data-id")+"' class='btn btn-success btn-flat'><i class='fa fa-check' aria-hidden='true'></i> Confirmar</a>");
        $("#trigger").click();
    });
</script>