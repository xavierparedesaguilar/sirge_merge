
<?php $this->assign('title', $mod_parent); ?>

<!-- Page Content -->
<section class="content-header">
<h1>Recursos Fitogenéticos - Módulo Caracterización - <?php echo $mod_parent ?></h1>

    <?php
        $this->Html->addCrumb('Recursos Fitogenéticos', '/admin/fitogenetico');
        $this->Html->addCrumb('Caracterización','/admin/fitogenetico/caracterizacion');
        $this->Html->addCrumb('Fenotípica', ['controller' => 'FenotipicaFito', 'action' => 'index']);
        $this->Html->addCrumb('Importar Caracterización');

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
                <div class="panel-heading box-header with-borderr">
                    <h4><i class="fa fa-cloud-download"></i> Importación de Datos de Caracterización</h4>
                    <div class="box-tools pull-right">
                        <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/caracterizacion/Fenotipica', true) ?>"
                        class="btn btn-default"><i class="fa fa-arrow-left" ></i>  </a>  
                    </div> 
                </div>
                
                <div class="box-body">                  
                        <div class="row">
                            <?php echo $this->Form->create($descriptor, [
                                'url'     => ['controller' => 'FenotipicaFito', 'action' => 'exportarCaracterizacion'],
                                'id'      => 'form_formato_caracterizacion',
                            ]); ?>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="col-lg-12"><h4><i class="fa fa-file-excel-o" aria-hidden="true"></i> Formato de Importación (.xlsx)<hr></h4></div>
                                <div class="col-lg-4 col-sm-12 col-xs-12">
                                    <?php echo $this->Form->control('coleccion_id',[
                                        'type'    => 'select',
                                        'options' => $colecciones,
                                        'default' => '',
                                        'label'   => 'Colección <b style="color:#dd4b39;">(*)</b>', 'escape'=> false ,
                                        'class'   => 'form-control select2',
                                        'empty'   => '-- SELECCIONE --',
                                        'id'      => 'coleccion_state',
                                     ]); ?>
                                 </div>
                                 <div class="col-lg-5 col-sm-12 col-xs-12">
                                    <?php echo $this->Form->control('especie_id', [
                                            'type'    => 'select',
                                            'options' => [],
                                            'label'   => __('Nombre Científico <b style="color:#dd4b39;">(*)</b>'), 'escape'=> false,
                                            'class'   => 'form-control select2',
                                            'empty'   => '-- SELECCIONE --',
                                    ]); ?>
                                </div>
                                <div class="col-lg-3 col-sm-12 col-xs-12">
                                    <?php echo $this->Form->control('nombre_comun', [
                                            'label'    => ['text' => 'Nombre Común '],
                                            'class'    => 'form-control',
                                            'disabled' => true,
                                            'id'       => 'cropname',
                                    ]); ?>
                                </div>
                                <div class="col-lg-4 col-sm-12 col-xs-12">
                                        <?php echo $this->Form->button('<i class="fa fa-cloud-download" aria-hidden="true"></i> DESCARGAR FORMATO', ['class' => 'btn btn-info', 'id' => 'btnFormatoCaracterizacion']) ?>
                                       
                                </div> 
                                <div class="col-lg-8 col-sm-12 col-xs-12">                                        
                                        <i>Debe seleccionar la Colección y el Nombre Científico para proceder con la descarga</i>
                                </div>                               
                            </div>                            
                            <?= $this->Form->end() ?>

                            <?php echo $this->Form->create($descriptor, [
                                'url'     => ['controller' => 'FenotipicaFito', 'action' => 'importarCaracterizacion'],
                                'id'      => 'form_caracterizacion',
                                'enctype' => 'multipart/form-data',
                            ]); ?>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="col-lg-12"><h4>:: Importación de Datos de Caracterización (.xlsx)<hr></h4></div>
                                <div class="col-lg-4 col-sm-12 col-xs-12">
                                    <?php echo $this->Form->control('coleccion_id',[
                                            'type'    => 'select',
                                            'options' => $colecciones,
                                            'default' => '',
                                            'label'   => 'Colección <b style="color:#dd4b39;">(*)</b>', 'escape'=> false ,
                                            'class'   => 'form-control select2',
                                            'empty'   => '-- SELECCIONE --',
                                            'id'      => 'coleccion_import',
                                    ]); ?>
                                </div>
                                <div class="col-lg-5 col-sm-12 col-xs-12">
                                    <?php echo $this->Form->control('especie_id', [
                                            'type'    => 'select',
                                            // 'options' => [],
                                            'options' => $especie_idy ,
                                            'value'   => $value_specie_idy,
                                            'label'   => __('Nombre Científico <b style="color:#dd4b39;">(*)</b>'), 'escape'=> false,
                                            'class'   => 'form-control select2',
                                            'empty'   => '-- SELECCIONE --',
                                            'id'      => 'especie_import',
                                    ]); ?>
                                </div>
                                <div class="col-lg-3 col-sm-12 col-xs-12">
                                    <?php echo $this->Form->control('nombre_comun', [
                                            'label'    => ['text' => 'Nombre Común '],
                                            'class'    => 'form-control',
                                            'disabled' => true,
                                            'id'       => 'cropname_import',
                                    ]); ?>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-xs-12">
                                    <?php echo $this->Form->control('file_caracterizacion', [
                                                'label' => ['text' => 'Subir Archivo de Excel <b style="color:#dd4b39;">(*)</b>', 'escape'=> false , 'escape' => false],
                                                'type'  => 'file',
                                                'class' => 'form-control file-input',
                                    ]); ?>
                                </div>
                               
                                <div class="col-sm-12">
                                        <?php echo $this->Form->button('<i class="fa fa-upload" aria-hidden="true"></i> SUBIR ARCHIVO', ['class' => 'btn btn-success', 'name' => 'btn_1', 'id' => 'btnSubirCaracterizacion']) ?>
                                        <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/caracterizacion/Fenotipica', true) ?>"
                                        class="btn btn-default"><i class="fa fa-times"></i> CANCELAR</a>
                                
                                </div>
                            </div>
                            <?= $this->Form->end() ?>
                           
                        </div>    
                       
                </div> 
                <div class="overlay" id="carga" style="display: none;">
            <i class="fa fa-refresh fa-spin"></i>              
            </div>
            
        </div>
    </div>
 </div>


<?php

if(isset($resultado)){

?>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-default box box-success"> 
            <div class="panel-heading ">
                      <h4><i class="fa fa-cloud-download"></i> Lista de Datos de Caracterización - Vista Premilinar</h4>                    
                    </div>
                <div class="box-body">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="table-responsive"  style="height: 350px">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th  class='bg-primary text-white'>N°</th>
                                        <?php

                                            $header = array_keys($resultado[0]);

                                            for($i=0; $i<count($header); $i++){
                                                if($i < 3)
                                                    echo "<th style='min-width: 160px' class='bg-primary text-white'><center>";
                                                else
                                                    echo "<th class='bg-success text-white'><center>";

                                                echo strtoupper($header[$i]);
                                                echo "</center></th>";
                                            }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                  

                                        for($i=0; $i < count($resultado); $i++){

                                            $content = array_values($resultado[$i]);

                                            echo "<tr>";
                                            echo "<td>".($i+1)."</td>";

                                            for($j = 0; $j<count($content); $j++){

                                                echo "<td>";

                                                if($j < 3) {

                                                    if($j == 2) {

                                                        if(substr($content[$j],0,2) == '1_')
                                                            echo "<center><span class='label label-danger'>".substr($content[$j],2,20)."</span></center>";
                                                        else
                                                            echo $content[$j];

                                                    } else {

                                                        echo $content[$j];

                                                    }
                                                } else {

                                                    if($content[$j] == '' || $content[$j] == 0){

                                                        echo $content[$j];

                                                    } else {

                                                        if(substr($content[$j],0,2) == '1_')
                                                            echo "<center><span class='label label-danger'>".round(substr($content[$j],2,20),2)."</span></center>";
                                                        else
                                                            echo round($content[$j], 2);
                                                    }

                                                }

                                                echo "</td>";
                                            }
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <?php echo $this->Form->create($descriptor, [
                        'url' => ['controller' => 'FenotipicaFito', 'action' => 'cargarCaracterizacion'],
                        'id' => "form_cargar_caract",
                    ]); ?>
                    <?php echo $this->Form->control('especie_id', ['type'=>'hidden', 'value' => $x_especie]) ?>
                    <?php echo $this->Form->control('coleccion_id', ['type'=>'hidden', 'value' => $x_coleccion]) ?>
                    <div class="col-sm-8 text-LEFT">
                        <strong>TOTAL DE REGISTROS: <?=count($resultado)?></strong>
                    </div>
                    
                    <div class="col-sm-4 text-right">
                        <?php echo $this->Form->button('<i class="fa fa-save"></i> GUARDAR REGISTRO', ['class' => 'btn btn-success', 'name' => 'btn_2', 'id' => 'btnCargarCaracterizacion']) ?>
                        <?php echo $this->Html->link('CANCELAR',['controller'=>'FenotipicaFito','action'=>'index'],['class'=>'btn btn-default']) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>

                <div class="overlay" id="carga_caract" style="display: none;">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
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
$this->Html->scriptBlock('$("#file-caracterizacion").fileinput({ showUpload: false, language: "es", allowedFileExtensions: ["xlsx", "xls"] });', ['block' => 'script']);

?>