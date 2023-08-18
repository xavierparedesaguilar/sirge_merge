<?php $this->assign('title', 'CARACTERIZACIÓN'); ?>

<section class="content-header">
<h1>Recursos Fitogenéticos - Módulo Caracterización - Fenotípica</h1>

    <?php
	
        $this->Html->addCrumb('Recursos Fitogenéticos', '/admin/fitogenetico');
        $this->Html->addCrumb('Caracterización','/admin/fitogenetico/caracterizacion');
        $this->Html->addCrumb('Fenotípica', ['controller' => 'FenotipicaFito', 'action' => 'index']);
        $this->Html->addCrumb( ucfirst(mb_strtolower($coleccion,'UTF-8')).' - '.ucfirst(mb_strtolower($especie,'UTF-8')));

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
                    <h4><i class="fa fa-pagelines"></i> <?= __('Lista de Resultados de Caracterización :  <i>'.$especie.'</i> '.$autor.' ('. ucfirst(mb_strtolower($coleccion,'UTF-8')).')') ?></h4>
                    <div class="pull-right box-tools">

						<a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/caracterizacion/Fenotipica', true) ?>"
						class="btn btn-default"><i class="fa fa-arrow-left" ></i>  </a>

						<?php if(!empty($resultado) && $permiso['edit'] ){ ?>

	                        <!-- <?php echo $this->Html->link('<i class="fa fa-sort-amount-asc" ></i>',
	                                    ['controller' => 'DescriptorFito', 'action' => 'ordenar','idx'=>$idx,'idy'=>$idy],
	                                    ['class' => 'btn btn-warning', 'data-toggle'=> "tooltip",'id'=>'sortable',  'title'=> "Ordenar Descriptores", 'escape'=>false] )
	                        ?> -->

                        <?php }  ?>
						<?php if($permiso['export']) { ?>

                             <button type="button" data-toggle="tooltip"  title="Exportar Regsitros" id="export" class="btn btn-info waves-effect m-r-5" >
                                     <i class="fa fa-download" ></i>
                            </button>

                        <?php } ?>

                    </div>
                </div>
                <div class="box-body">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                    	<?php if(!empty($resultado)){ ?>
							<div class="table-responsive">
	                            <table id="tablaListado" class="table table-striped table-bordered table-hover">
	                                <thead class="headTablaListado">
	                                    <tr>
	                                        <th>N°</th>
	                                        <?php
												$conn = \Cake\Datasource\ConnectionManager::get('default');		
	                                            $header = array_keys($resultado[0]);									

	                                            for($i=0; $i<count($header); $i++){
	                                                if($i < 3){
	                                                    echo "<th style='min-width: 100px' class='bg-primary'><center>";
														echo strtoupper($header[$i]);
													} else{
	                                                    echo "<th style='min-width: 75px' class='p-3 mb-2 bg-success text-black'><center>";

														$sqlTitle="SELECT TITLE FROM DESCRIPTOR WHERE NAME='$header[$i]'";
														 $stmtData = $conn->prepare($sqlTitle);
               										     $stmtData->execute();
														 $rowAcceso = $stmtData->fetch();
														 $title= $rowAcceso[0];		

														echo"<a title='$title'>".strtoupper($header[$i])."</a>";
														
															
														
													}	                                                
	                                                echo "</center></th>";
	                                            }
	                                        ?>
	                                    </tr>
	                                </thead>
									<tfoot class="footTablaListado">
                                    	<tr class="text-uppercase">
											<td></td>
											<?php
												for($i=0; $i<count($header); $i++){
											?>
												<th></th>
											<?php
												}
											?>

										</tr>                                       
                               		 </tfoot>
	                                <tbody>
	                                    <?php 
																		 
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
								 
	                                for($i=0; $i < count($resultado); $i++){
	                                     
										$content = array_values($resultado[$i]);
										$station_current_id = 0;
										 
										$conn = \Cake\Datasource\ConnectionManager::get('default');										  
										
										$sql2="SELECT station_current_id FROM passport WHERE accenumb='".$content[0]."'";
										$obj2 = $conn->prepare($sql2);
										$obj2->execute();
									
										if( $obj2->rowCount() > 0){
											$rowAcceso = $obj2->fetch();
											$station_current_id= $rowAcceso[0];											
										}
										
										if(($permiso['station_id']==$station_current_id ||$per == 1) || $permiso['role_id']==1){

	                                            echo "<tr>";
	                                            echo "<td>".($i+1)."</td>";

	                                            for($j = 0; $j<count($content); $j++){

	                                                echo "<td>";

	                                                if($j < 3)
	                                                	echo $content[$j];
	                                                else if($j > (count($content)-2))
	                                                	echo $content[$j];
	                                                else
	                                                	echo ($content[$j] == -1) ? '' :"<center>".round($content[$j],3)."</center>";

	                                                echo "</td>";
	                                            }
	                                            echo "</tr>";
	                                        }
										}
	                                    ?>
	                                </tbody>
	                            </table>
								
	                        </div>
	                   	<?php } else { ?>
	                   		<div class="callout callout-info">
			                	<h4><i class="icon fa fa-info"></i> MENSAJE !!</h4>
			                	<p>No existen resultado para la colección : <strong><?php echo $coleccion ?></strong> y especie : <strong><?php echo mb_strtoupper($especie,'UTF-8') ?></strong></p>
			              	</div>
				      	<?php } ?>
                    </div>
                </div>
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
            <?php echo $this->Form->create(NULL, ['url' => ['action' => 'export', 'idx'=>$idx,'idy'=>$idy]]); ?>
            <div class="modal-body">
                <p><h4>¿Desea descargar el reporte?</h4></p>
				<?php echo $this->Form->control('filename', ['type' => 'hidden', 'id' => 'filename']) ?>
				                 
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                <button type="submit" class="btn btn-success" id="btnReportesTabla"><i class="fa fa-check" aria-hidden="true"></i> Aceptar</button>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>


<?php if(!empty($resultado)){ ?>
	<script type="text/javascript">
	    $(function () {
	      
		tablaListadoDataTable($('#tablaListado').attr('id'));
		document.getElementById("tablaListado").parentElement.classList.add("table-responsive");
	
        });
	</script>
<?php } ?>