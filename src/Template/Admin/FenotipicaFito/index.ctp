
<?php $this->assign('title', $mod_padre); ?>

<section class="content-header">
    <h1>Recursos Fitogenéticos - Módulo Caracterización - Fenotípica</h1>

    <?php
        $this->Html->addCrumb('Recursos Fitogenéticos', '/admin/fitogenetico');
        $this->Html->addCrumb('Caracterización','/admin/fitogenetico/caracterizacion');
        $this->Html->addCrumb('Fenotípica');

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

<div class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-default box box-success"> 
                <div class="panel-heading box-header with-border">
			  	    <h4><i class="fa fa-pagelines"></i> Búsqueda de Datos de Caracterización Morfologíca</h4>
                    <div class="pull-right box-tools">
                        <a href = "<?php echo $this->Url->build('/' .$this->Functions->getUrlFirst($this->request->url,0).'/fitogenetico/caracterizacion/', true) ?>" class="btn btn-default"><i class="fa fa-arrow-left" ></i></a>	
                        <button type="button" class="btn btn-default" data-widget="collapse" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-minus"></i></button>
                    </div>
				</div>
              
                <?php echo $this->Form->create(NULL, [
                            'url' => ['controller' => 'FenotipicaFito', 'action' => 'index'],
                            'id'  => 'form_fenotipica',
                ]); ?>

                <div class="box-body" id="collapseExample">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-7"> 
                            <div class="col-lg-12"><h4><i class="fa fa-toggle-on" aria-hidden="true"></i> Búsqueda de Datos de Caracterización<hr></h4></div>
                                 <div class="col-lg-4 col-sm-12 col-xs-12">
                                    <?php echo $this->Form->control('coleccion_id_',[
                                                            'type'    => 'select',
                                                            'options' => $colecciones,
                                                            'label'   => 'Colección <b style="color:#dd4b39;">(*)</b>', 'escape'=> false ,
                                                            'class'   => 'form-control select2',
                                                            'empty'   => '-- SELECCIONE --',
                                                            'id'      => 'coleccion_state',
                                    ]); ?>   
                          
                                </div>
                                <div class="col-lg-4 col-sm-12 col-xs-12">
                                    <?php echo $this->Form->control('especie_id', [
                                                        'type'    => 'select',
                                                        'options' => $especie_idy ,
                                                        'value'   => $value_specie_idy,
                                                        'label'   => __('Nombre Científico <b style="color:#dd4b39;">(*)</b>'), 'escape'=> false,
                                                        'class'   => 'form-control select2',
                                                        'empty'   => '-- SELECCIONE --',
                                    ]); ?>                                                 
                                </div>
                                <div class="col-lg-4 col-sm-12 col-xs-12">
                                  
                                    <?php echo $this->Form->control('nombre_comun', [
                                                        'label'    => ['text' => 'Nombre Común '],
                                                        'value'    =>$especie_nombre,
                                                        'class'    => 'form-control',
                                                        'id'       => 'cropname',
                                                        'disabled' => true,
                                    ]); ?>       
                                </div> 
                                <div class="col-sm-12  text-rigth">
                                    <button type="submit" class="btn btn-success" id="btnFenotipica"><i class="fa fa-search" aria-hidden="true"></i> BUSCAR REGISTRO </button>
                                   

                                    <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/caracterizacion/Fenotipica', true) ?>"
                                              class="btn btn-default"> <i class="fa fa-times"></i> CANCELAR
                                    </a>
                                </div>   
                        </div>
                        <div class="col-xs-12 col-md-12 col-lg-5">  
                            <div class="col-lg-12"><h4><i class="fa fa-toggle-on" aria-hidden="true"></i> Importación de Registros <hr></h4></div>
                            <div class="col-lg-12"><p>Podra importar datos de Caracterización como Descriptores y Estados</p></div>
                            <div class="col-lg-12">
                                <?php if($permiso['import']) { ?>
                                    <?php echo $this->Html->link('<i class="fa fa-cloud-upload"></i> Datos de Carcaterización', $this->Url->build('/' . $this->request->url . '/importar-caracterizacion', true), ['class' => 'btn btn-warning', 'data-toggle' => "tooltip", 'title' => "Importar Caracterización.", 'escape' => false] ); ?>
                                    <?php echo $this->Html->link('<i class="fa fa-cloud-upload"></i> Descriptores y Estados', $this->Url->build('/' . $this->request->url . '/importar', true), ['class' => 'btn btn-success', 'data-toggle' => "tooltip", 'title' => "Importar Descriptores y Estados.", 'escape' => false] ); ?>
                                <?php } ?>  
                            </div>                            
                        </div>                     
                    </div>
                </div>		
                <div class="box-footer"></div>
                <?= $this->Form->end() ?>
                <div class="overlay" id="cargar_data" style="display: none;"><i class="fa fa-spinner fa-spin "></i></div>                
            </div>
        </div>
    </div>
    <!-- TABLA DE RESULTADOS SEGUN LOS FILTROS SELECCIONADOS -->
    <?php if(isset($lista_especie)){?>      
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-default box box-success"> 
                <div class="panel-heading ">
			  	    <h4><i class="fa fa-list-alt" aria-hidden="true"></i> Resultados de Datos de Caracterización Morfologíca</h4>			  		
				</div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="tablaListado" class="table table-striped table-bordered  table-hover row-border order-column" cellspacing="0" width="100%">
                                <thead class="headTablaListado">
                                        <tr class="text-uppercase text-center th-head-inputs">
                                            <td style="min-width: 10px;">N°</td>
                                            <th style="min-width: 250px;">COLECCIÓN</th>
                                            <th style="min-width: 350px;">NOMBRE CIENTÍFICO</th>
                                            <th style="min-width: 200px;">NOMBRE COMÚN</th>
                                            <th style="min-width: 100px;">FAMILIA</th>
                                            <th style="min-width: 50px;">OPCIONES</th>
                                        </tr>
                                </thead>
                                <!-- <tfoot class="footTablaListado">
                                    <tr class="text-uppercase">
                                        <td></td>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <td></td>
                                    </tr>
                                       
                                </tfoot> -->

                                
                                <tbody>
                                    <?php 
                                    $item = 1;
                                    foreach ($lista_especie as $specie):
                                    ?>
                                     <tr>
                                        <td><center><?php echo($item)?></center></td>
                                        <td><?php echo$specie['collection']['colname']?></td>
                                        <td><i><?php echo($specie['genus'].' '.$specie['species'])?></i> <?php echo$specie['autor']?></td>
                                        <td><?php echo$specie['cropname']?></td>
                                        <td><?php echo$specie['family']?></td>
                                        <td><center>
                                            <?php
                                            if( $count_descriptor > 0){ ?>
                                                <?php echo $this->Html->link('<i class="fa fa-envira"></i> Lista de Descriptores y Estados',
                                                        ['controller' => 'DescriptorFito', 'action' => 'index', 'id' => $specie->id],
                                                        ['class' => 'btn btn-info ', 'escape' => false, 'data-toggle' => "tooltip"])
                                                ?>
                                            <?php } 
                                             else { ?>                                             
                                                <?php echo $this->Html->link('<i class="fa fa-envira"></i> Lista de Descriptores y Estados', '',
                                                        ['class' => 'btn btn-info ', 'escape' => false, 'data-toggle' => "tooltip", 'disabled' => 'disabled'])
                                                ?>
                                            <?php } ?>

                                            <?php
                                            if( $count_valdescrip > 0){?>
                                                <?php echo $this->Html->link('<i class="fa fa-pagelines"></i> Lista de Datos de Caracterización',
                                                        ['controller' => 'DescriptorFito', 'action' => 'caracterizacion', 'idx'=> $specie->id, 'idy' => $specie->collection->id ],
                                                        ['class' => 'btn btn-primary ', 'escape' => false, 'data-toggle' => "tooltip"])
                                                ?>                                            
                                            <?php } 
                                            else { ?>
                                               <?php echo $this->Html->link('<i class="fa fa-pagelines"></i> Lista de Datos de Caracterización','',
                                                     ['class' => 'btn btn-primary ', 'escape' => false, 'data-toggle' => "tooltip", 'disabled' => 'disabled'])
                                               ?>
                                             <?php } ?>
                                            </center>
                                        </td>
                                     </tr>
                                     
                                    <?php
                                        $item++;
                                        endforeach;
                                     ?>
                                <tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }
    else {?>
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-default box box-success"> 
                <div class="panel-heading ">
			  	    <h4><i class="fa fa-list-alt" aria-hidden="true"></i> Listado de Datos de Caracterización Morfologíca</h4>			  		
				</div>
                <div class="box-body">
                    
                        <div class="table-responsive">
                            <table id="tablaListado" class="table table-striped table-bordered table-hover">
                                <thead class="headTablaListado">
                                        <tr class="text-uppercase text-center th-head-inputs">
                                            <td style="min-width: 10px;">N°</td>
                                            <th style="min-width: 150px;">COLECCIÓN</th>
                                            <th style="min-width: 200px;">NOMBRE CIENTÍFICO</th>
                                            <th style="min-width: 100px;">NOMBRE COMÚN</th>
                                            <th style="min-width: 100px;">FAMILIA</th>
                                            <th style="min-width: 50px;">OPCIONES</th>
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
                                <?php
                                  $item = 0;
                                  foreach ($stmtData as $specie):
                                ?>
                                    <tr>
                                        <td><center><?php echo($item+1)?></center></td>
                                        <td><?php echo$specie['COL_COLNAME']?></td>
                                        <td><i><?php echo($specie['SP_GENUS'].' '.$specie['SP_SPECIES'])?></i> <?php echo$specie['SP_AUTOR']?></td>
                                        <td><?php echo$specie['SP_CROPNAME']?></td>
                                        <td><?php echo$specie['SP_FAMILY']?></td>
                                        <td><center>
                                            <?php
                                          
                                            $conn = \Cake\Datasource\ConnectionManager::get('default');

                                            /*VERIFICACIÓN DE DESCRIPTORES SEGUN LA ESPECIE SELECCIONADA*/
                                            $count_descriptor ="SELECT ID FROM DESCRIPTOR WHERE SPECIE_ID =".$specie['SPECIE_IDS']." AND STATUS=1";
                                            $count_descriptor = $conn->prepare($count_descriptor);
                                            $count_descriptor->execute();

                                            /*VERIFICACIÓN DE VALORES DE CARCATERFIZACION SEGUN LA ESPECIE SELECCIONADA*/
                                            $count_valdescrip = "SELECT ID FROM DESCRIPTOR_VALUE  WHERE DESCRIPTOR_ID IN (SELECT ID FROM DESCRIPTOR WHERE SPECIE_ID =".$specie['SPECIE_IDS']." AND STATUS=1)";
                                            $count_valdescrip = $conn->prepare($count_valdescrip);
                                            $count_valdescrip->execute();

                                          		                              

                                            if($count_descriptor->rowCount() > 0){ ?>
                                                <?php echo $this->Html->link('<i class="fa fa-envira"></i> Lista de Descriptores y Estados',
                                                        ['controller' => 'DescriptorFito', 'action' => 'index', 'id' => $specie['SPECIE_IDS']],
                                                        ['class' => 'btn btn-info btn-sm', 'escape' => false, 'data-toggle' => "tooltip"])
                                                ?>
                                            <?php } 
                                             else { ?>                                             
                                                <?php echo $this->Html->link('<i class="fa fa-envira"></i> Lista de Descriptores y Estados', '',
                                                        ['class' => 'btn btn-info btn-sm', 'escape' => false, 'data-toggle' => "tooltip", 'disabled' => 'disabled'])
                                                ?>
                                            <?php } ?>

                                            <?php
                                            if($count_valdescrip->rowCount() > 0){?>
                                                <?php echo $this->Html->link('<i class="fa fa-pagelines"></i> Lista de Datos de Caracterización',
                                                        ['controller' => 'DescriptorFito', 'action' => 'caracterizacion', 'idx'=>$specie['SPECIE_IDS'], 'idy' => $specie['COLLECTION_ID'] ],
                                                        ['class' => 'btn btn-primary btn-sm', 'escape' => false, 'data-toggle' => "tooltip"])
                                                ?>                                            
                                            <?php } 
                                            else { ?>
                                               <?php echo $this->Html->link('<i class="fa fa-pagelines"></i> Lista de Datos de Caracterización','',
                                                     ['class' => 'btn btn-primary btn-sm', 'escape' => false, 'data-toggle' => "tooltip", 'disabled' => 'disabled'])
                                               ?>
                                             <?php } ?>
                                            </center>
                                        </td>
                                    </tr>                     
                                <?php
                                  $item++;
                                  endforeach;
                                ?>
                            </table>
                        </div>
                    
                </div>
            </div>
        </div>
      </div>

    <?php }?>    
</div>




<script type="text/javascript">
   
$(function () {
        tablaListadoDataTable($('#tablaListado').attr('id'));
		document.getElementById("tablaListado").parentElement.classList.add("table-responsive");
    });
 </script>
   
<?php

$this->Html->css(['/assets/js/select2/select2.min.css'], ['block' => 'css']);
$this->Html->script(['/assets/js/select2/select2.js'], ['block' => 'script']);
$this->Html->scriptBlock('$("select").select2();', ['block' => 'script']);

?>
