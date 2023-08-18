<?php $this->assign('title', $modulo); ?>
<!-- Page Content -->
<section class="content-header">
<h1>Recursos Fitogenéticos - Inventarios - Banco <em>In vitro</em></h1>
    <?php  
        $this->Html->addCrumb('Recursos Fitogenéticos', '/admin/fitogenetico');
        $this->Html->addCrumb('Gestión Inventario', '/admin/fitogenetico/gestion-inventario');
        $this->Html->addCrumb('Banco In Vitro', ['controller' => 'BankInvitro', 'action' => 'index']);
        $this->Html->addCrumb('Importar');

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
            <div class="panel panel-default box box-success"> 
                <div class="panel-heading  box-header with-border">
                    <h4><i class="fa fa-cloud-upload"></i> Importación de Registros - Inventario</h4> 
                    <div class="pull-right box-tools">
                        <?php echo $this->Html->link('<i class="fa fa-arrow-left" ></i>',
                                        ['controller' => 'BankInvitro', 'action' => 'index'],
                                        ['class' => 'btn  btn-default', 'data-toggle'=> "tooltip",  'title'=> "Regresar", 'escape'=>false])
                        ?>
                    </div>                                    
                </div>
                <?php echo $this->Form->create($bankInvitro, [
                        'url'         => ['controller' => 'BankInvitro', 'action' => 'import'],
                        'autocomplete'=> "off",
                        'id'          => "form_import_bankinvitro",
                        'enctype'     => 'multipart/form-data',        
                     ]); ?>  
         
                <div class="box-body">                      
                   <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="row">
                                    <h4>:: Subir Formato de Importación (.xlsx) <b style="color:#dd4b39;">(*)</b> <hr></h4>
                                </div>
                                <div class="row">
                                   <div class="col-lg-11">                                    
                                       <?php echo $this->Form->control('file_carga', [
                                                    'label' => ['text' => 'La Interfaz de Importación le va permitir subir datos masivos', 'escape' => false, 'escape' => false],
                                                    'type'  => 'file',                                               
                                                    'class' => 'form-control file-input',
                                        ]); ?>
                                         <button type="submit" class="btn btn-success" id="btnImportBankInitro"><i class="fa fa-upload" aria-hidden="true"></i> SUBIR ARCHIVO</button>        
                                         <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/gestion-inventario/banco-in-vitro', true) ?>"
                                         class="btn btn-default"> <i class="fa fa-times"></i> CANCELAR</a>    
                                         
                                   </div>                                   
                                </div>     
                            </div>
                            <div class="col-lg-3">
                                <div class="row">
                                  <div class="col-lg-12"><h4><i class="fa fa-file-excel-o" aria-hidden="true"></i> Formato de Importación<hr></h4></div> 
                                  <div class="col-lg-12">
                                         La plantilla esta en formato Excel (.xlsx)<br><p></p>
                                         <a href="<?php echo $this->Url->build('/admin/fitogenetico/gestion-inventario/banco-in-vitro/exportar') ?>"  class="btn btn-info" >
                                             DESCARGAR FORMATO
                                         </a>
                                  </div> 
                                </div>                         
                            </div>
                        </div>
                   </div>
                </div>
                <?= $this->Form->end() ?>
                <div class="overlay" id="carga" style="display: none;">
                 <i class="fa fa-refresh fa-spin"></i>
                </div>
             </div>
        </div>


        <!-- VISTA PRELIMINAR DE LOS REGISTROS QUE SE VAN A CARGAR -->
        <?php 
          if(isset($temp_bankinvitro)){ ?>
                <div class="col-xs-12 col-md-12 col-lg-12">
            
                        <div class="panel panel-default"> 
                            <div class="panel-heading ">
                                <h4><i class="fa fa-cloud-upload"></i> Lista de Registros - Vista Premilinar</h4>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive"  style="height: 250px">
                                    <table class="table table-hover table-striped table-bordered">
                                        <thead class="headTablaListado">
                                            <tr>
                                                <th style='min-width: 30px;'>#</th>
                                            <?php
                                                        $temp_map = $temp_bankinvitro[0];
                                                        $temp_map = $temp_map->toArray(); 
                                                        $item = 1;                                             

                                                        foreach ($temp_map as $key=> $value) {
                                                            
                                                            if($key != 'id' && $key != 'resource_id' && $key != 'user_id' ){
                                                                if($key == 'motivo_error'){
                                                                    echo "<th style='min-width: 300px; text-align: center;'>";
                                                                }elseif($key == 'accenumb'){
                                                                    echo "<th class='bg-primary  text-white' style='min-width: 100px; text-align: center;'>";
                                                                }elseif($key == 'fecha_intro'){
                                                                    echo "<th class='bg-primary  text-white' style='min-width: 100px; text-align: center;'>";
                                                                }elseif($key == 'responsible'){
                                                                    echo "<th class='bg-primary  text-white' style='min-width: 150px; text-align: center;'>";
                                                                }elseif($key == 'origin'){
                                                                    echo "<th class='bg-primary  text-white' style='min-width: 150px; text-align: center;'>";
                                                                }elseif($key == 'storoom'){
                                                                    echo "<th class='bg-primary  text-white' style='min-width: 150px; text-align: center;'>";
                                                                }elseif($key == 'temp'){
                                                                    echo "<th class='bg-primary  text-white' style='min-width: 50px; text-align: center;'>";
                                                                }elseif($key == 'shelving'){
                                                                    echo "<th class='bg-primary text-white' style='min-width: 50px; text-align: center;'>";
                                                                }elseif($key == 'levelshelv'){
                                                                    echo "<th class='bg-primary  text-white' style='min-width: 50px; text-align: center;'>";
                                                                }elseif($key == 'rack'){
                                                                    echo "<th class='bg-primary  text-white' style='min-width: 50px; text-align: center;'>";
                                                                }elseif($key == 'tubenumb'){
                                                                    echo "<th class='bg-primary  text-white' style='min-width: 50px; text-align: center;'>";
                                                                }elseif($key == 'explnumb'){
                                                                    echo "<th class='bg-primary  text-white' style='min-width: 50px; text-align: center;'>";
                                                                }elseif($key == 'tubesize'){
                                                                    echo "<th class='bg-primary  text-white' style='min-width: 50px; text-align: center;'>";
                                                                }elseif($key == 'storage'){
                                                                    echo "<th class='bg-primary  text-white' style='min-width: 50px; text-align: center;'>";
                                                                }else {
                                                                    echo "<th style='min-width: 150px; text-align: center;'>";
                                                                }
                                                                if($item > 2){
                                                                    echo mb_strtoupper($header_excel[($item-3)], 'UTF-8');
                                                                } else {
                                                                    echo mb_strtoupper($key, 'UTF-8');
                                                                }
                                                                echo "</th>";
                                                            }
                                                            $item ++;
                                                        }
                                                    ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                                    for ($i=0; $i < count($temp_bankinvitro); $i++) {

                                                        $temp_map = $temp_bankinvitro[$i];
                                                        $temp_map = $temp_map->toArray();

                                                        if($temp_bankinvitro[$i]['motivo_error'] <>''){
                                                            echo "<tr class='danger'>";
                                                        } else {
                                                            echo "<tr>";
                                                        }

                                                        echo "<td>".($i+1)."</td>";

                                                        foreach ($temp_map as $key=> $value) {
                                                            if($key != 'id' && $key != 'resource_id' && $key != 'user_id' ){
                                                                echo "<td>";
                                                                echo mb_strtoupper($value, 'UTF-8');
                                                                echo "</td>";
                                                            }
                                                        }
                                                        echo "</tr>";
                                                }
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div> 
                            <div class="box-footer">
                                <div class="col-sm-4 text-left">
                                   Los Campos con <b style="color:#337AB7;" class="text-right">(*)</b> son datos obligatorios
                                </div>
                                <div class="col-sm-8 text-right">                            
                                    <?php echo $this->Form->create($bankInvitro, [
                                            'url' => ['controller' => 'BankInvitro', 'action' => 'uploadfile'],
                                            'autocomplete' => "off",
                                            'id' => "form_cargar_bankinvitro",
                                        ]); ?>            
                                        <?php echo $this->Form->control('file_input', [ 'type' => 'hidden', 'value' => $file_input ]); ?>     

                                        <?php echo $this->Form->control('total_data', [ 'type' => 'hidden', 'value' => $total_data ]); ?> 

                                        <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/gestion-inventario/banco-in-vitro', true) ?>"
                                        class="btn btn-default"> <i class="fa fa-times"></i> CANCELAR</a>      
                                        <button type="submit" class="btn btn-success" id="btnCargarBankInvitro"><i class="fa fa-save"></i> GUARDAR REGISTRO</button>
                                    <?= $this->Form->end() ?>
                                </div>   
                                <div class="overlay" id="carga_bankinvitro" style="display: none;">
                                <i class="fa fa-refresh fa-spin"></i>
                               </div>    
                            </div>                   
                    </div>           
                </div>        
        <?php } ?>
    </div>
</div>
        

<?php
$this->Html->css(['/assets/js/fileinput/css/fileinput.min.css'], ['block' => 'css']);
$this->Html->script(['/assets/js/fileinput/js/fileinput.min.js', '/assets/js/fileinput/js/locales/es.js'], ['block' => 'script']);
$this->Html->scriptBlock('$("#file-carga").fileinput({ showUpload: false, language: "es", allowedFileExtensions: ["xlsx", "xls"] });', ['block' => 'script']);
?>