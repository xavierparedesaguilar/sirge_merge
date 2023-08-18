
<?php $this->assign('title', $modulo); ?>

<!-- Page Content -->
<section class="content-header">
    <h1>Recursos Fitogenéticos- Módulo Datos Pasaporte</h1>

    <?php
        $this->Html->addCrumb('Recursos Fitogenéticos', '/admin/fitogenetico');
        $this->Html->addCrumb('Datos Pasaporte', ['controller' => 'PassportFito', 'action' => 'index']);
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
                <div class="panel-heading">
                  <h4><i class="fa fa-cloud-upload"></i> Importación de Registros - Datos Pasaporte</h4>       
                </div>
                <?php echo $this->Form->create($passportFito, [
                    'url'         => ['controller' => 'PassportFito', 'action' => 'import'],
                    'autocomplete'=> "off",
                    'id'          => "form_import_passport",
                    'enctype'     => 'multipart/form-data',
                ]); ?>
                <div class="box-body">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                       <div class="col-lg-9">
                            <div class="row">
                                    <h4>:: Subir Formato de Importación (.xlsx) <b style="color:#dd4b39;">(*)</b> <hr></h4>
                            </div>
                            <div class="row">
                                
                                <div class="col-lg-4 col-sm-12 col-xs-12">
                                    <?php echo $this->Form->control('coleccion_id',[
                                            'type'    => 'select',
                                            'options' => $colecciones,
                                            'label'   => 'Colección <b style="color:#dd4b39;">(*)</b>', 'escape'=> false ,
                                            'class'   => 'form-control select2',
                                            'empty'   => '-- SELECCIONE --',
                                            'id'      => 'coleccion',
                                    ]); ?>
                                </div>

                                <div class="col-lg-4 col-sm-12 col-xs-12">
                                    <?php echo $this->Form->control('passport.specie_id', [
                                            'type'    => 'select',
                                            'options' => [],
                                            'label'   => __('Nombre Científico <b style="color:#dd4b39;">(*)</b>'), 'escape'=> false,
                                            'class'   => 'form-control select2',
                                            'empty'   => '-- SELECCIONE --',
                                            'id'      => 'especie_idx',
                                    ]); ?>
                                </div>

                                <div class="col-lg-4 col-sm-12 col-xs-12">
                                    <?php echo $this->Form->control('nombre_comun', [
                                                'label'    => ['text' => 'Nombre Común '],
                                                'escape' => false,
                                                'class'    => 'form-control',
                                                'disabled' => true,
                                    ]); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-xs-12">
                                    <?php echo $this->Form->control('file_carga', [
                                                'label' => ['text' => 'Subir Archivo de Excel <b style="color:#dd4b39;">(*)</b>', 'escape'=> false , 'escape' => false],
                                                'type'  => 'file',
                                                'class' => 'form-control file-input',
                                    ]); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-rigth">
                                 <button type="submit" class="btn btn-success" id="btnImportPassport">SUBIR ARCHIVO</button>
                        
                                    <?php echo $this->Html->link('CANCELAR', ['controller' => 'PassportFito', 'action' => 'index'], ['class' => 'btn btn-default']) ?>
                                </div>
                            </div>
                       </div>
                       <div class="col-lg-3">
                            <div class="row">
                                  <div class="col-lg-12"><h4><i class="fa fa-file-excel-o" aria-hidden="true"></i> Formato de Importación<hr></h4></div> 
                                  <div class="col-lg-12">
                                         La plantilla esta en formato Excel (.xlsx)<br><p></p>
                                         <a href="<?php echo $this->Url->build('/admin/fitogenetico/datos-pasaporte/exportar') ?>"  class="btn btn-info" >
                                             DESCARGAR FORMATO
                                         </a>
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
<?php if(isset($temp_passport_fito)){ ?>

        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-default"> 
                <div class="panel-heading ">
                    <h4><i class="fa fa-cloud-upload"></i> Lista de Registros - Vista Premilinar</h4>
                </div>
                <div class="box-body">
                    <div class="table-responsive"  style="height: 350px">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <?php

                                        $temp_map = $temp_passport_fito[0];
                                        $temp_map = $temp_map->toArray();

                                        $item = 1;

                                        foreach ($temp_map as $key=> $value) {

                                            if($key != 'id' && $key != 'resource_id' && $key != 'user_id' ){

                                                if($key == 'motivo_error'){
                                                    echo "<th class='bg-secondary' style='min-width: 300px; text-align: center;'>";
                                                }else {
                                                    echo "<th style='min-width: 200px; text-align: center;'>";
                                                }

                                                if($item > 6){

                                                    echo mb_strtoupper($header_excel[($item-7)], 'UTF-8');

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

                                    for ($i=0; $i < count($temp_passport_fito); $i++) {

                                        $temp_map = $temp_passport_fito[$i];
                                        $temp_map = $temp_map->toArray();

                                        if($temp_passport_fito[$i]['motivo_error'] !== ''){

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
  
                        <?php echo $this->Form->create($passportFito, [
                              'url' => ['controller' => 'PassportFito', 'action' => 'uploadfile'],
                              'autocomplete' => "off",
                              'id' => "form_cargar_passport",
                        ]); ?>         

                        <?php echo $this->Form->control('file_input', [ 'type' => 'hidden', 'value' => $file_input ]); ?>
                        <?php echo $this->Form->control('especie_id', [ 'type' => 'hidden', 'value' => $especies->id ]); ?>
                        <?php echo $this->Form->control('colection_id',[ 'type'=> 'hidden', 'value' => $especies->collection_id ]); ?>
                        <?php echo $this->Form->control('total_data', [ 'type' => 'hidden', 'value' => $total_data ]); ?>

                         <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/datos-pasaporte', true) ?>"
                           class="btn btn-default"><i class="fa fa-times"></i>  CANCELAR
                        </a> 
                        <button type="submit" class="btn btn-success" id="btnCargarPassport"><i class="fa fa-save"></i> GUARDAR REGISTRO</button>
                        
                        <?= $this->Form->end() ?>
                    </div>   
                    <div class="overlay" id="carga_passport" style="display: none;">
                       <i class="fa fa-refresh fa-spin"></i>
                     </div>    
                </div>
                
                
                
            </div>
        </div>

<?php } ?>

    </div>
</div>

<?php

$this->Html->css(['/assets/js/select2/select2.min.css'], ['block' => 'css']);
$this->Html->css(['/assets/js/fileinput/css/fileinput.min.css'], ['block' => 'css']);
$this->Html->script(['/assets/js/select2/select2.js'], ['block' => 'script']);
$this->Html->script(['/assets/js/fileinput/js/fileinput.min.js', '/assets/js/fileinput/js/locales/es.js'], ['block' => 'script']);
$this->Html->scriptBlock('$("select").select2();', ['block' => 'script']);
$this->Html->scriptBlock('$("#file-carga").fileinput({ showUpload: false, language: "es", allowedFileExtensions: ["xlsx", "xls"] });', ['block' => 'script']);

?>