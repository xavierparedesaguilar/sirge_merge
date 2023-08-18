
<?php $this->assign('title', $titulo); ?>

<!-- Page Content -->
<section class="content-header">
<h1>Recursos Fitogenéticos - Inventarios - Banco <em>In vitro</em></h1>
       <?php
        $this->Html->addCrumb('Recursos Fitogenéticos', '/admin/fitogenetico');
        $this->Html->addCrumb('Gestión Inventario', '/admin/fitogenetico/gestion-inventario');
        $this->Html->addCrumb('Banco In Vitro', ['controller' => 'BankInvitro', 'action' => 'index']);
        $this->Html->addCrumb('LOTE: '. $bankInvitro->id, ['controller' => 'BankInvitro', 'action' => 'view','id'=>$bankInvitro->id]);
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
<div class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-default box box-success"> 
                <div class="panel-heading box-header with-border">
                    <h4><i class="fa  fa-search"></i> Detalle del Registro - Inventario: <strong> <?php echo h($bankInvitro->passport->accenumb) ?> - LOTE <?php echo$bankInvitro->lotnumb;?></strong></h4>
                    <div class="pull-right box-tools">
                        <?php echo $this->Html->link('<i class="fa fa-arrow-left" ></i>',
                                        ['controller' => 'BankInvitro', 'action' => 'index'],
                                        ['class' => 'btn  btn-default', 'data-toggle'=> "tooltip",  'title'=> "Regresar", 'escape'=>false])
                        ?>

                        <?php if($permiso['edit'] && $validar) { ?>

                            <?php echo $this->Html->link('<i class="fa fa-edit" ></i>',
                                ['controller' => 'BankInvitro', 'action' => 'edit', $bankInvitro->id],
                                ['class' => 'btn btn-primary', 'data-toggle'=> "tooltip",  'title'=> "Editar", 'escape'=>false] );
                            ?>

                        <?php  } ?>

                        <?php if($permiso['delete'] && $validar) { ?>

                            <?php echo $this->Html->link('<i class="fa fa-trash" ></i>', "#",
                                    ['class' => 'btn btn-danger delete-btn','data-toggle'=> "tooltip",  'title'=> "Eliminar",
                                    'escape' => false, "data-id"=>$bankInvitro->id])
                            ?>

                        <?php  } ?>
                    </div>               
                </div>
                <div class="box-body">
                   <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="box box-success box-solid">
                             <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                        <div class="box-header with-border">
                                             <h3 class="box-title"><strong><i class="fa fa-file-o"></i> DATOS GENERALES</strong></h3>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">  
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-12 col-lg-12">
                                                    <div class="box-header with-border">
                                                        <h3 class="box-title"><i class="fa fa-toggle-on" aria-hidden="true"></i> Información Datos Pasaporte</h3>
                                                    </div>
                                                    <div class="table-responsive">  
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Código de Accesión (CODPER)') ?></strong></td>
                                                                <td scope="row"><strong><?php echo h($bankInvitro->passport->accenumb) ?></strong></td>
                                                            </tr> 
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Nombre de Accesión') ?></strong></td>
                                                                <td scope="row"><?= h($bankInvitro->passport->accname) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Otro Código de Accesión') ?></strong></td>
                                                                <td scope="row"><?= h($bankInvitro->passport->othenumb) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Colección') ?></strong></td>
                                                                <td scope="row"><?= h($bankInvitro->passport->specie->collection->colname) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Nombre Científico') ?></strong></td>
                                                                <td scope="row"><em><?php echo $bankInvitro->passport->specie->genus.' '.$bankInvitro->passport->specie->species ?></em> <?php echo $bankInvitro->passport->specie->autor?></td>
                                                            </tr>
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Nombre Común') ?></strong></td>
                                                                <td scope="row"><?= h($bankInvitro->passport->specie->cropname) ?></td>
                                                            </tr>                                              
                                                        </table>
                                                    </div>
                                                </div>                                        
                                            </div>
                                                                                                                       
                                        </div>
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                             <div class="row">
                                                <div class="col-xs-12 col-md-12 col-lg-12">
                                                    <div class="box-header with-border">
                                                    <h3 class="box-title"><i class="fa fa-pagelines"></i> Informacion de <em>In vitro</em> - Banco</h3>
                                                    </div>
                                                    <div class="table-responsive">  
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Fecha de Introducción al Banco') ?></strong></td>
                                                                <td scope="row"><?php echo $bankInvitro->acqdate==NULL?'': date('d-m-Y', strtotime($bankInvitro->acqdate)) ?></td>
                                                            </tr> 
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Nonbre del Responsable del material') ?></strong></td>
                                                                <td scope="row"><?php echo h($bankInvitro->responsible) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Lugar de Procedencia del material') ?></strong></td>
                                                                <td scope="row"><?php echo h($bankInvitro->origin) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Disponibilidad del Lote de la Accesión') ?></strong></td>
                                                                <td scope="row"><?php echo $bankInvitro->disponibilidad==NULL?'':$bankInvitro->disponibilidad->name;?></td>
                                                            </tr>
                                                                                                      
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>      
                                        </div>
                                </div>    
                             </div>
                        </div>
                        <div class="box box-success box-solid">
                            <div class="box-body"> 
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                        <div class="box-header with-border">
                                             <h3 class="box-title"><strong><i class="fa fa-pagelines"></i> DATOS DEL MATERIAL</a></strong></h3>
                                        </div>
                                    </div>
                                </div>                           
                                <div class="row">       
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-12 col-lg-12">
                                                    <div class="box-header with-border">
                                                        <h3 class="box-title"><i class="fa fa-thermometer-quarter" aria-hidden="true"></i> Medio de Conservación y Ubicación</h3>
                                                    </div>
                                                    <div class="table-responsive">  
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Lugar de Almacenamiento') ?></strong></td>
                                                                <td scope="row"><strong><?= $bankInvitro->conservacion==NULL?'':$bankInvitro->conservacion->name ?></strong></td>
                                                            </tr> 
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Temperatura (°C)') ?></strong></td>
                                                                <td scope="row"><?= $bankInvitro->temperatura==NULL?'':$bankInvitro->temperatura->name?></td>
                                                            </tr>
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Ubicación del material (estantería)') ?></strong></td>
                                                                <td scope="row"><?= h($bankInvitro->shelving) ?></td>
                                                            </tr>                                                              
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Nivel de Estantería') ?></strong></td>
                                                                <td scope="row"><?= h($bankInvitro->levelshelv)?></td>
                                                            </tr>
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Número de Gradilla') ?></strong></td>
                                                                <td scope="row"><?= h($bankInvitro->rack)?></td>
                                                            </tr>                                                                                                                                                                   
                                                        </table>
                                                    </div>
                                                </div>
                                                                                  
                                            </div>                                     
                                        </div>
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-12 col-lg-12">
                                                    <div class="box-header with-border">
                                                      <h3 class="box-title"><i class="fa fa-steam" aria-hidden="true"></i> Stock del Material</h3>
                                                      <p></p><p>Información del stock del material</p>
                                                    </div>
                                                    <div class="table-responsive">  
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <tr>
                                                                <td scope="row" width="30%"><strong>Cantidad de Tubos por Material</strong></td>
                                                                <td scope="row" width="10%" class="success text-primary"><center><strong><?php echo h($bankInvitro->tubenumb) ?></strong></center></td>
                                                                <td scope="row" width="15%"><strong><?= __('Números de Explantes ') ?></strong></td>
                                                                <td scope="row" width="10%" class="success text-primary"><center><center><strong><?php echo h($bankInvitro->explnumb) ?></strong></center></td>
                                                                <td scope="row" width="15%"><strong><?= __('Tamaño del Tubo ') ?></strong></td>
                                                                <td scope="row" width="15%" class="success text-primary"><strong><?php  echo $bankInvitro->tubo==NULL?'':$bankInvitro->tubo->name ?></strong></td>
                                                            </tr>                                     
                                                        </table>
                                                    </div>
                                                    <div class="box-header with-border">
                                                      <h3 class="box-title"><strong><i class="fa fa-unlock-alt" aria-hidden="true"></i>  Duplicados de Seguridad del Material</strong></h3>                                                    
                                                    </div>
                                                    <div class="table-responsive">  
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <tr>
                                                                <td scope="row" width="40%"><strong><?= __('Ubicación de las replicas del material') ?></strong></td>
                                                                <td scope="row" width="15%"><?php echo h($bankInvitro->duplinstname) ?></td>
                                                                
                                                                <td scope="row" width="15%"><strong><?= __('Cantidad de replicas del material') ?></strong></td>
                                                                <td scope="row" width="15%"><?php echo h($bankInvitro->dupnumb) ?></td>
                                                            </tr>                                       
                                                        </table>
                                                    </div>
                                                    
                                                </div>                                                                                        
                                            </div>
    
                                        </div>
                                </div>                                
                            </div>                            
                        </div>
                        <div class="box box-success box-solid">
                            <div class="box-body"> 
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                        <div class="box-header with-border">
                                             <h3 class="box-title"><strong><i class="fa fa-viadeo" aria-hidden="true"></i> DATOS DE LA PLANTA</strong></h3>
                                        </div>
                                    </div>
                                </div>                           
                                <div class="row">       
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-12 col-lg-12">
                                                    <div class="box-header with-border">
                                                        <h3 class="box-title"><i class="fa fa-pagelines"></i> Estado de la Planta</h3>
                                                    </div>
                                                    <div class="table-responsive">  
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Estado de viabilidad de la Planta') ?></strong></td>
                                                                <td scope="row"><strong><?php echo $bankInvitro->estadoPlanta==NULL ?'':$bankInvitro->estadoPlanta->name?></strong></td>
                                                            </tr> 
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Necrosis de Yema y Tallo') ?></strong></td>
                                                                <td scope="row"><?php echo $bankInvitro->necrosisinput==NULL?'':$bankInvitro->necrosisinput->name ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Defoliación de la Planta (%)') ?></strong></td>
                                                                <td scope="row"><?php echo $bankInvitro->defolacion==NULL?'':$bankInvitro->defolacion->name ?></td>
                                                            </tr>                                                              
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Enraizamiento de la Planta') ?></strong></td>
                                                                <td scope="row"><?php echo $bankInvitro->enraizamiento==NULL?'':$bankInvitro->enraizamiento->name ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Clorosis') ?></strong></td>
                                                                <td scope="row"><?php echo $bankInvitro->Clorosis==NULL?'':$bankInvitro->Clorosis->name ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Fenolización ') ?></strong></td>
                                                                <td scope="row"><?php echo $bankInvitro->fenolizacion==NULL ?'':$bankInvitro->fenolizacion->name ?></td>
                                                            </tr>                                                                                                                                                                   
                                                        </table>
                                                    </div>
                                                </div>
                                                                                  
                                            </div>                                     
                                        </div>
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-12 col-lg-12">
                                                    <div class="box-header with-border">
                                                      <h3 class="box-title"><i class="fa fa-toggle-on" aria-hidden="true"></i>  Medio de Cultivo</h3>
                                                      
                                                    </div>
                                                    <div class="table-responsive">  
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Tipo de Medio de Almacenamiento') ?></strong></td>
                                                                <td scope="row"><strong><?php echo $bankInvitro->almacenamiento ==NULL?'':$bankInvitro->almacenamiento->name ?></strong></td>
                                                            </tr> 
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Tiempo Máximo en el Medio (meses)') ?></strong></td>
                                                                <td scope="row"><?php echo h($bankInvitro->protime) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Medio de Propagación') ?></strong></td>
                                                                <td scope="row"><?php echo $bankInvitro->propagacion==NULL?'':$bankInvitro->propagacion->name ?></td>
                                                            </tr>                                                              
                                                            <tr>
                                                                <td scope="row" width="50%"><strong><?= __('Medio de Conservación') ?></strong></td>
                                                                <td scope="row"><?php echo $bankInvitro->MedConservacion==NULL?'':$bankInvitro->MedConservacion->name ?></td>
                                                            </tr>                                                                                                                                                                                                                             
                                                        </table>
                                                    </div>
                                                    <div class="box-header with-border">
                                                      <h3 class="box-title"><strong><i class="fa fa-toggle-on" aria-hidden="true"></i>  Estado Fitosanitario</strong></h3>                                                    
                                                    </div>
                                                    <div class="table-responsive">  
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <tr>
                                                                <td scope="row" width="30%"><strong><?= __('Estado Fitosanitario de la Planta') ?></strong></td>
                                                                <td scope="row" width="30%"><?php echo $bankInvitro->EstadoFito==NULL?'':$bankInvitro->EstadoFito->name ?></td>
                                                                
                                                                <td scope="row" width="20%"><strong><?= __('Fitopatógenos ') ?></strong></td>
                                                                <td scope="row" width="20%"><?php echo h($bankInvitro->pathogen) ?></td>
                                                            </tr>                                       
                                                        </table>
                                                    </div>
                                                    
                                                </div>                                                                                        
                                            </div>    
                                        </div>
                                </div>                                
                            </div>                            
                        </div>
                        <div class="box box-success box-solid">
                            <div class="box-body"> 
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                        <div class="box-header with-border">
                                             <h3 class="box-title"><strong><i class="fa fa-toggle-on" aria-hidden="true"></i> PROPAGACIÓN y CONSERVACIÓN</strong></h3>
                                        </div>
                                    </div>
                                </div>                           
                                <div class="row">       
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-12 col-lg-12">
                                                    <div class="box-header with-border">
                                                        <h3 class="box-title"><i class="fa fa-share-alt"></i> Propagación del Material</h3>
                                                    </div>
                                                    <div class="table-responsive">  
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <thead class="headTablaListado">
                                                                <tr class=" text-center th-head-inputs">
                                                                    <th style="min-width:10px;">N°</th>                                                                    
                                                                    <th style="min-width:70px;">PROPAGADOR</th>
                                                                    <th style="min-width:20px;">FECHA </th>
                                                                </tr>                                                                
                                                            </thead>
                                                            <tbody>  
                                                             <?php
                                                                 $item = 1;  
                                                                  $propagar=$bankInvitro->Propagar;
                                                                  foreach($propagar as $propagar):
                                                                ?>                                                            
                                                                <tr>
                                                                    <td><?php echo $this->Number->format($item) ?></td>
                                                                    <td><?php echo h($propagar->propagator) ?></td>
                                                                    <td><?php echo h($propagar->prodate) ?></td>
                                                                </tr> 
                                                                <?php $item++; ?>
                                                                <?php endforeach; ?>
                                                            </tbody>                                                                                                                                                  
                                                        </table>
                                                    </div>
                                                </div>
                                                                                  
                                            </div>                                     
                                        </div>
                                        <div class="col-xs-12 col-md-6 col-lg-6">
                                             <div class="row">
                                                <div class="col-xs-12 col-md-12 col-lg-12">
                                                    <div class="box-header with-border">
                                                        <h3 class="box-title"><i class="fa fa-university"></i> Conservación del Material</h3>
                                                    </div>
                                                    <div class="table-responsive">  
                                                        <table class="table table-striped table-bordered table-hover">
                                                           <thead class="headTablaListado">
                                                                <tr class=" text-center th-head-inputs">
                                                                    <th style="min-width:10px;">N°</th>
                                                                    <th style="min-width:20px;">FECHA</th>
                                                                    <th style="min-width:70px;">PERSONAL</th>
                                                                    <th style="min-width:70px;">PERIODO</th>
                                                                    <th style="min-width:70px;">MOTIVO</th>
                                                                </tr>
                                                                <tbody>  
                                                                <?php
                                                                    $items = 1;  
                                                                    $conservar=$bankInvitro->Conservar;
                                                                    foreach($conservar as $conservar):
                                                                    ?>                                                            
                                                                    <tr>
                                                                        <td><?php echo $this->Number->format($items) ?></td>
                                                                        <td><?php echo h($conservar->constime) ?></td>
                                                                        <td><?php echo h($conservar->consresponsible) ?></td>
                                                                        <td><?php echo h($conservar->stoper) ?></td>
                                                                        <td><?php echo h($conservar->consrem) ?></td>
                                                                    </tr> 
                                                                    <?php $items++; ?>
                                                                    <?php endforeach; ?>
                                                                </tbody> 
                                                               
                                                           </thead>                                                                                                                                                      
                                                        </table>
                                                    </div>
                                                </div>
                                                                                  
                                            </div>           
                                            
                                        </div>
                                </div>                                
                            </div>                            
                        </div>
                   </div>
                </div>                         
                <div class="box-footer">
                    <div class="col-sm-12 text-right">
                        <!-- imagen flecha volver: zmdi zmdi-long-arrow-return -->

                        <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/gestion-inventario/banco-in-vitro/'.$bankInvitro->bank_invitro_id, true) ?>"
                           class="btn btn-default"><i class="fa fa-arrow-left" ></i> REGRESAR
                        </a>

                        <?php if($permiso['edit'] && $validar) { ?>

                        <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/gestion-inventario/banco-in-vitro/editar/'.$bankInvitro->id, true) ?>"
                                 class="btn btn-primary"><i class="fa fa-edit" ></i> EDITAR REGISTRO
                        </a>

                        <?php } ?>
                        <?php if($permiso['delete'] && $validar) { ?>

                        <?php echo $this->Html->link('<i class="fa fa-trash" ></i> ELIMINAR', "#",
                            ['class' => 'btn btn-danger delete-btn', 'escape' => false, "data-id"=>$bankInvitro->id, 'data-toggle' => "tooltip", 'title' => "Eliminar el Banco Invitro."])
                            ?>

                        <?php } ?>                                  
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
                    <p><h4>¿Desea eliminar el registro actual?</h4></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <div id="ajax_button"></div>
                </div>
            </div>
        </div>
    </div>


<script>
    $(".delete-btn").click(function(){
        $("#ajax_button").html('<?php echo $this->Html->link('<i class="fa fa-check"></i> Confirmar', ['controller' => 'BankInvitro', 'action' => 'delete', $bankInvitro->id],['class' => 'btn btn-success', 'data-toggle'=> "tooltip",  'title'=> "Editar", 'escape'=>false])?>');
        $("#trigger").click()
    })
</script>

