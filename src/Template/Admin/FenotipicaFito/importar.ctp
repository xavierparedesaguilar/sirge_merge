
<?php $this->assign('title', $mod_parent); ?>

<!-- Page Content -->
<section class="content-header">
    <h1>Recursos Fitogenéticos - Módulo Caracterización - <?php echo $mod_parent ?></h1>

    <?php
        $this->Html->addCrumb('Recursos Fitogenéticos', '/admin/fitogenetico');
        $this->Html->addCrumb('Caracterización','/admin/fitogenetico/caracterizacion');
        $this->Html->addCrumb('Fenotípica', ['controller' => 'FenotipicaFito', 'action' => 'index']);
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

<div class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-default box box-success"> 
                <div class="panel-heading box-header with-border">
                    <h4><?= __('<i class="fa fa-cloud-download"></i> Importación de Descriptores y Estados')?></h4>   
                    <div class="box-tools pull-right">
                        <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/caracterizacion/Fenotipica', true) ?>"
                        class="btn btn-default"><i class="fa fa-arrow-left" ></i>  </a>  
                    </div>               
                </div>
                <div class="box-body">
                   <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="nav-tabs-custom tab-success">
                            <ul class="nav nav-tabs " id="myTab">
                                <li class="active"><a data-toggle="tab" aria-expanded="true" href="#tabla1">  <i class="fa fa-envira"></i> DESCRIPTORES</a></li>
                                <li class="tab-red"><a data-toggle="tab" aria-expanded="true" href="#tabla2"> <i class="fa fa-pagelines"></i> ESTADOS DE DESCRIPTOR</a></li>                                
                            </ul>
                            <div class="tab-content">
                               <div id="tabla1" class="tab-pane  active">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-8">                                     
                                            <?php echo $this->Form->create($descriptor, [
                                                'url'         => ['controller' => 'FenotipicaFito', 'action' => 'importar'],
                                                'autocomplete'=> "off",
                                                'id'          => "form_import_descriptor",
                                                'enctype'     => 'multipart/form-data',
                                            ]); ?>

                                            <?php echo $this->Form->control('form_tipo', [ 'type' => 'hidden', 'value' => '1' ]) ?>
                                            <div class="row">
                                                <div class="col-lg-12"><h4>:: Importación de Descriptores' (.xlsx) <b style="color:#dd4b39;">(*)</b><hr></h4></div>
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
                                                        'options' => $especie_idx,
                                                        'value'   => $value_specie,
                                                        'id'      => 'especie_idx',
                                                        'label'   => __('Nombre Científico <b style="color:#dd4b39;">(*)</b>'), 'escape'=> false,
                                                        'class'   => 'form-control select2',
                                                        'empty'   => '-- SELECCIONE --',
                                                    ]); ?>
                                                </div>
                                                <div class="col-lg-4 col-sm-12 col-xs-12">
                                                    <?php echo $this->Form->control('nombre_comun', [
                                                        'label'    => ['text' => 'Nombre Común '],
                                                        'class'    => 'form-control',
                                                        'value'=>$especie_nombre,
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
                                                    <button type="submit" class="btn btn-success" id="btnCargaDescriptor"><i class="fa fa-upload" aria-hidden="true"></i> SUBIR ARCHIVO</button>
                                                    <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/caracterizacion/Fenotipica', true) ?>"
                                                        class="btn btn-default"> <i class="fa fa-times"></i> CANCELAR
                                                    </a>
                                                </div>                                                
                                            </div>
                                            <?= $this->Form->end() ?>
                                            
                                        </div>
                                        <div class="col-xs-12 col-md-12 col-lg-4">
                                            <div class="col-lg-12"><h4><i class="fa fa-file-excel-o" aria-hidden="true"></i> Formato de Importación<hr></h4></div> 
                                            <div class="col-lg-12">
                                                Descargar formato para datos de Descriptores (.xlsx)<br><p></p> 
                                                <!-- <a href="<?php echo $this->Url->build('/admin/fitogenetico/datos-pasaporte/exportar') ?>"  class="btn btn-info" >DESCARGAR FORMATO </a> -->
                                                <?php echo $this->Html->link('<i class="fa fa-cloud-download" aria-hidden="true"></i> DESCARGAR FORMATO', ['controller' => 'FenotipicaFito', 'action' => 'exportardescriptores'], ['class' => 'btn btn-info', 'data-toggle' => "tooltip", 'escape' => false] ); ?>
                                            </div>                                             
                                        </div>                                     
                                    </div>
                                    <!-- <div class="overlay" id="carga_descriptor" style="display: none;"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div> -->                                    
                               </div>
                               
                               <div id="tabla2" class="tab-pane">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-8">                                     
                                            <?php echo $this->Form->create($descriptor, [
                                                'url'         => ['controller' => 'FenotipicaFito', 'action' => 'importar'],
                                                'autocomplete'=> "off",
                                                'id'          => "form_import_estados",
                                                'enctype'     => 'multipart/form-data',
                                            ]); ?>

                                            <?php echo $this->Form->control('form_tipo', [ 'type' => 'hidden', 'value' => '2' ]) ?>
                                            <div class="row">
                                                <div class="col-lg-12"><h4>:: Importación de Estados de Descriptores (.xlsx) <b style="color:#dd4b39;">(*)</b><hr></h4></div>
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
                                                        'value'=>$especie_nombre_idy,
                                                        'class'    => 'form-control',
                                                        'id'       => 'cropname',
                                                        'disabled' => true,
                                                      ]); ?>
                                                </div>                            
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-sm-12 col-xs-12">
                                                    <?php echo $this->Form->control('file_estado', [
                                                            'label' => ['text' => 'Subir Archivo de Excel <b style="color:#dd4b39;">(*)</b>', 'escape'=> false , 'escape' => false],
                                                            'type'  => 'file',
                                                            'class' => 'form-control file-input',
                                                    ]); ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 text-rigth">
                                                    <button type="submit" class="btn btn-success" id="btnCargaEstados"><i class="fa fa-upload" aria-hidden="true"></i> SUBIR ARCHIVO</button>
                                                    <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/caracterizacion/Fenotipica', true) ?>"
                                                        class="btn btn-default"> <i class="fa fa-times"></i> CANCELAR
                                                    </a>
                                                </div>                                                
                                            </div>
                                            <?= $this->Form->end() ?>
                                            
                                        </div>
                                        <div class="col-xs-12 col-md-12 col-lg-4">
                                            <div class="col-lg-12"><h4><i class="fa fa-file-excel-o" aria-hidden="true"></i> Formato de Importación<hr></h4></div> 
                                            <div class="col-lg-12">
                                                Descargar formato para Estados de Descriptores (.xlsx)<br><p></p> 
                                                <!-- <a href="<?php echo $this->Url->build('/admin/fitogenetico/datos-pasaporte/exportar') ?>"  class="btn btn-info" >DESCARGAR FORMATO </a> -->
                                                <?php echo $this->Html->link('<i class="fa fa-cloud-download" aria-hidden="true"></i> DESCARGAR FORMATO', ['controller' => 'FenotipicaFito', 'action' => 'exportarestados'], ['class' => 'btn btn-info', 'data-toggle' => "tooltip", 'escape' => false] ); ?>
                                                
                                            </div>                                             
                                        </div>                           
                                    </div>
                               </div>                                
                            </div>
                        </div>
                   </div>                   
                </div>  
                <div class="overlay" id="carga_descriptor" style="display: none;"><i class="fa fa-spinner fa-spin "></i></div>                
                <div class="overlay" id="carga_state" style="display: none;"><i class="fa fa-spinner fa-spin"></i></div>                
            </div>
        </div>       
    </div>
     <!-- VISTA PRELIMINAR DE LOS REGISTROS DE DESCRIPTORES QUE SE VAN A CARGAR -->
    <?php if(isset($temp_descriptor)){ ?>
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-default box box-success"> 
                    <div class="panel-heading ">
                        <h4><i class="fa fa-cloud-download"></i> Lista de Descriptores - Vista Premilinar</h4>                    
                    </div>                
                    <div class="box-body">
                        <div class="table-responsive"  style="height: 350px">
                            <table class="table table-hover table-striped table-bordered">
                                            <thead class="headTablaListado">
                                                <tr>
                                                    <th>#</th>
                                                    <?php
                                                        $temp_map = $temp_descriptor[0];
                                                        $temp_map = $temp_map->toArray();

                                                        foreach ($temp_map as $key=> $value) {

                                                            if($key != 'id' && $key != 'recurso' && $key != 'user_id' && $key != 'tipo_carga' && $key != 'campo_4')
                                                            {
                                                                if($key == 'motivo_error'){
                                                                    echo "<th style='min-width: 300px; text-align: center;'>MOTIVO DE ERROR";
                                                                }
                                                                else if($key == 'coleccion')
                                                                    echo "<th class='bg-primary  text-white' style='min-width: 100px; text-align: center;'> COLECCIÓN";
                                                                else if($key == 'especie')
                                                                    echo "<th class='bg-primary  text-white' style='min-width: 100px; text-align: center;'> NOM. CIENTÍFICO";
                                                                else if ($key == 'campo_1')
                                                                    echo '<th>DESCRIPTOR';
                                                                else if($key == 'campo_2')
                                                                    echo '<th>TÍTULO DEL DESCRIPTOR';
                                                                else if($key == 'campo_3')
                                                                    echo '<th>DESCRIPCIÓN';
                                                                else
                                                                    echo mb_strtoupper($key, 'UTF-8');
                                                                    echo "</th>";
                                                            }
                                                        }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                    for ($i=0; $i < count($temp_descriptor); $i++) {

                                                        $temp_map = $temp_descriptor[$i];
                                                        $temp_map = $temp_map->toArray();

                                                        if($temp_descriptor[$i]['motivo_error'] != ''){
                                                            echo "<tr class='danger'>";
                                                        } else {
                                                            echo "<tr>";
                                                        }
                                                        echo "<td>".($i+1)."</td>";

                                                        foreach ($temp_map as $key=> $value) {

                                                            if($key != 'id' && $key != 'recurso' && $key != 'user_id' && $key != 'tipo_carga' && $key != 'campo_4')
                                                            {
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
                        <div class="col-xs-12 col-md-12 col-lg-12 text-right">                                                                                   
                            <?php echo $this->Form->create($descriptor, [
                                'url' => ['controller' => 'FenotipicaFito', 'action' => 'uploadfile'],
                                'autocomplete' => "off",
                                'id' => "form_cargar_fenotipica",
                            ]); ?>
                                <?php echo $this->Form->control('form_tipo', [ 'type' => 'hidden', 'value' => '1' ]) ?>
                                <?php echo $this->Form->control('especie_id', [ 'type' => 'hidden', 'value' => $model_specie->id ]); ?>
                                <?php echo $this->Form->control('colection_id',[ 'type'=> 'hidden', 'value' => $model_specie->collection_id ]); ?>
                                <?php echo $this->Form->control('tipo_agrupacion', [ 'type' => 'hidden', 'value' => $tipo_agrupacion ]) ?>
                                <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/caracterizacion/Fenotipica', true) ?>"
                                    class="btn btn-default"> <i class="fa fa-times"></i>CANCELAR</a>
                                <button type="submit" class="btn btn-success" id="btnCargaDescripFinal"><i class="fa fa-save"></i> GUARDAR REGISTRO</button>           
                             <?= $this->Form->end() ?>                                               
                        </div>
                    </div>
                     <div class="overlay" id="carga_descrip_final" style="display: none;"><i class="fa fa-spinner fa-spin"></i></div>
                </div>
            </div>
        </div>
    <?php } ?>

   


    <!-- VISTA PRELIMINAR DE LOS REGISTROS DE ESTADOS DE DESCRIPTORES QUE SE VAN A CARGAR -->
    <?php if(isset($temp_state)){ ?>
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-default box box-success"> 
                    <div class="panel-heading ">
                        <h4><i class="fa fa-cloud-download"></i> Lista de Estados - Vista Premilinar</h4>                    
                    </div>
                    <div class="box-body">
                       <div class="table-responsive"  style="height: 350px">
                                                <table class="table table-hover table-striped table-bordered">
                                                    <thead class="headTablaListado">
                                                        <tr>
                                                            <th>#</th>
                                                            <?php

                                                                $temp_map = $temp_state[0];
                                                                $temp_map = $temp_map->toArray();

                                                                foreach ($temp_map as $key=> $value) {

                                                                    if($key != 'id' && $key != 'recurso' && $key != 'user_id' && $key != 'tipo_carga' && $key != 'campo_4')
                                                                    {
                                                                        if($key == 'motivo_error')
                                                                            echo "<th style='min-width: 200px; text-align: center;'>MOTIVO DE ERROR";
                                                                        elseif($key == 'coleccion')
                                                                            echo "<th class='bg-primary  text-white' style='min-width: 100px; text-align: center;'> COLECCIÓN";
                                                                        else if($key == 'especie')
                                                                            echo "<th class='bg-primary  text-white' style='min-width: 100px; text-align: center;'> NOM. CIENTÍFICO";
                                                                        else if ($key == 'campo_1')
                                                                            echo '<th>DESCRIPTOR';
                                                                        else if($key == 'campo_2')
                                                                            echo '<th>ESTADO';
                                                                        else if($key == 'campo_3')
                                                                            echo '<th>NOMBRE DEL ESTADO';
                                                                        else
                                                                            echo mb_strtoupper($key, 'UTF-8');
                                                                        echo "</th>";
                                                                    }
                                                                }
                                                            ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php

                                                            for ($i=0; $i < count($temp_state); $i++) {

                                                                $temp_map = $temp_state[$i];
                                                                $temp_map = $temp_map->toArray();

                                                                if($temp_state[$i]['motivo_error'] != ''){

                                                                    echo "<tr class='danger'>";

                                                                } else {

                                                                    echo "<tr>";
                                                                }

                                                                echo "<td>".($i+1)."</td>";

                                                                foreach ($temp_map as $key=> $value) {

                                                                    if($key != 'id' && $key != 'recurso' && $key != 'user_id' && $key != 'tipo_carga' && $key != 'campo_4')
                                                                    {
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
                        <div class="col-xs-12 col-md-12 col-lg-12 text-right">                                                                                   
                            <?php echo $this->Form->create($descriptor, [
                                'url' => ['controller' => 'FenotipicaFito', 'action' => 'uploadfile'],
                                'autocomplete' => "off",
                                'id' => "form_cargar_fenotipica",
                            ]); ?>
                                <?php echo $this->Form->control('form_tipo', [ 'type' => 'hidden', 'value' => '2' ]) ?>
                                <?php echo $this->Form->control('especie_id', [ 'type' => 'hidden', 'value' => $model_specie->id ]); ?>
                                <?php echo $this->Form->control('colection_id',[ 'type'=> 'hidden', 'value' => $model_specie->collection_id ]); ?>
                                <?php echo $this->Form->control('tipo_agrupacion', [ 'type' => 'hidden', 'value' => $tipo_agrupacion ]) ?>
                                                
                                <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/caracterizacion/Fenotipica', true) ?>"
                                class="btn btn-default"> <i class="fa fa-times"></i>CANCELAR</a>
                                <button type="submit" class="btn btn-success" id="btnCargaStateFinal"><i class="fa fa-save"></i> GUARDAR REGISTRO</button>                             
                            <?= $this->Form->end() ?>                                               
                        </div>
                    </div> 
                    <div class="overlay" id="carga_state_final" style="display: none;"><i class="fa fa-spinner fa-spin"></i></div>                  
                </div>            
            </div>
        </div>
    <?php } ?>
   
</div>

<?php

$this->Html->css(['/assets/js/select2/select2.min.css'], ['block' => 'css']);
$this->Html->css(['/assets/js/fileinput/css/fileinput.min.css'], ['block' => 'css']);
$this->Html->script(['/assets/js/select2/select2.js'], ['block' => 'script']);
$this->Html->script(['/assets/js/fileinput/js/fileinput.min.js', '/assets/js/fileinput/js/locales/es.js'], ['block' => 'script']);
$this->Html->scriptBlock('$("select").select2();', ['block' => 'script']);
$this->Html->scriptBlock('$("#file-carga, #file-estado").fileinput({ showUpload: false, language: "es", allowedFileExtensions: ["xlsx", "xls"] });', ['block' => 'script']);

?>