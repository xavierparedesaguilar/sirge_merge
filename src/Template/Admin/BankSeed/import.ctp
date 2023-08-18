<?php $this->assign('title', $titulo); ?>

<!-- Page Content -->
<section class="content-header">
    <h1>Recursos Fitogenéticos - Inventarios - Banco de Semillas</h1>
    <?php
        $this->Html->addCrumb('Recursos Fitogenéticos', '/admin/fitogenetico');
        $this->Html->addCrumb('Gestión Inventario', '/admin/fitogenetico/gestion-inventario');
        $this->Html->addCrumb('Banco Semilla', ['controller' => 'BankSeed', 'action' => 'index']);
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
<!-- Page Body -->
<div class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
             <div class="panel panel-default box box-success"> 
                <div class="panel-heading box-header with-border">
                    <h4><i class="fa fa-cloud-upload"></i> Importación de Registros - Inventario</h4> 
                    <div class="pull-right box-tools">
                                <?php echo $this->Html->link('<i class="fa fa-arrow-left" ></i>',
                                                ['controller' => 'BankSeed', 'action' => 'index'],
                                                ['class' => 'btn  btn-default', 'data-toggle'=> "tooltip",  'title'=> "Regresar", 'escape'=>false])
                                ?>
                    </div>                                    
                </div>
                <?php echo $this->Form->create($bankSeed, [
                        'url'         => ['controller' => 'BankSeed', 'action' => 'import'],
                        'autocomplete'=> "off",
                        'id'          => "form_import_bankseed",
                        'enctype'     => 'multipart/form-data',        
                ]); ?>  
            
             <div class="box-body">                      
                   <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="row">
                                    <h4>:: Subir Formato de Importación (.xlsx) <b style="color:#dd4b39;">(*)</b> <hr></h4>
                                </div>
                                <div class="row">
                                   <div class="col-lg-11">                                    
                                       <?php echo $this->Form->control('file_cargas', [
                                                    'label' => ['text' => 'La Interfaz de Importación le va permitir subir datos masivos', 'escape' => false, 'escape' => false],
                                                    'type'  => 'file',                                             
                                                    'class' => 'form-control file-input',
                                        ]); ?>
                                         <button type="submit" class="btn btn-success" id="btnImportBankSeed"><i class="fa fa-upload" aria-hidden="true"></i> SUBIR ARCHIVO</button>        
                                         <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/gestion-inventario/banco-semilla', true) ?>"
                                         class="btn btn-default"> <i class="fa fa-times"></i> CANCELAR</a>    
                                         
                                   </div>                                   
                                </div>     
                            </div>
                            <div class="col-lg-3">
                                <div class="row">
                                  <div class="col-lg-12"><h4><i class="fa fa-file-excel-o" aria-hidden="true"></i> Formato de Importación<hr></h4></div> 
                                  <div class="col-lg-12">
                                         La plantilla esta en formato Excel (.xlsx)<br><p></p>
                                         <a href="<?php echo $this->Url->build('/admin/fitogenetico/gestion-inventario/banco-in-vitro/exportarxls') ?>"  class="btn btn-info" >
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
    </div>
</div>
<?php
$this->Html->css(['/assets/js/fileinput/css/fileinput.min.css'], ['block' => 'css']);
$this->Html->script(['/assets/js/fileinput/js/fileinput.min.js', '/assets/js/fileinput/js/locales/es.js'], ['block' => 'script']);
$this->Html->scriptBlock('$("#file-cargas").fileinput({ showUpload: false, language: "es", allowedFileExtensions: ["xlsx", "xls"] });', ['block' => 'script']);
?>