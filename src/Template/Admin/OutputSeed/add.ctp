
<?php $this->assign('title', $modulo); ?>

<!-- Page Content -->
<section class="content-header">
<h1>Recursos Fitogenéticos - Inventarios - Banco de Semillas</h1>

    <?php
        $this->Html->addCrumb('Recursos Fitogenéticos', '/admin/fitogenetico');
        $this->Html->addCrumb('Gestión Inventario', '/admin/fitogenetico/gestion-inventario');
        $this->Html->addCrumb('Banco Semilla', ['controller' => 'BankSeed', 'action' => 'index']);
        $this->Html->addCrumb($id, ['controller' => 'OutputSeed', 'action' => 'index','id'=>$id]);
        $this->Html->addCrumb('Salida');
        $this->Html->addCrumb('Crear');
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
<div class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-default box box-success">
                <div class="panel-heading  box-header with-border">
                    <h4><i class="fa fa-file-text-o" aria-hidden="true"></i> Nuevo Registro de Salida de Material</h4>
                    <div class="pull-right box-tools"> 
                        <?php echo $this->Html->link('<i class="fa fa-arrow-left" ></i>',
                                    ['controller' => 'OutputSeed', 'action' => 'index','id'=> $outputSeed->bank_seed_id],
                                    ['class' => 'btn  btn-default', 'data-toggle'=> "tooltip",  'title'=> "Regresar", 'escape'=>false])
                        ?>
                    </div> 
                </div>

                    <?php echo $this->Form->create($outputSeed, [
                        //'novalidate',
                        'url' => ['controller' => 'OutputSeed', 'action' => 'add' ,'id'=>$id],
                        // 'class' => 'row p-10',
                        'autocomplete' => "off",
                        'id' => "form_outputSeed",
                         //'novalidate'
                     ]); ?>
                <div class="box-body">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12"><h4><i class="fa fa-toggle-on"></i> Datos del Solicitante<hr></h4></div> 
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                    <div class="form-group">            
                                          <?php echo $this->Form->control('reqname', [
                                                            'label' => ['text' => 'Nombre del Solicitante' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Nombre del solicitante"></i>'],
                                                            'escape' => false,
                                                            'class' => 'form-control',
                                        ]); ?>
                                    </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        
                                        <?php echo $this->Form->control('reqcode', [
                                                            'label' => ['text' => 'Documento de Solicitante' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Ejm: Informe 002-INIA/DRGB-."></i>'],
                                                            'escape' => false,
                                                            'class' => 'form-control',
                                        ]); ?>
                                    </div>
                            </div> 
                        </div>
                        <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('fecha_salida', [
                                                            'label' => ['text' => 'Fecha Salida del material <b style="color:#dd4b39;">(*)</b>' . ' '],
                                                            'escape' => false,
                                                            'class' => 'form-control',
                                                            // 'readonly' => true
                                         ]); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('reason', [
                                                            'label' => ['text' => 'Motivo de Salida del material <b style="color:#dd4b39;">(*)</b>' . ' '],
                                                            'escape' => false,
                                                            'class' => 'form-control',
                                        ]); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-lg-12"><h4><i class="fa fa-flask" aria-hidden="true"></i> Material<hr></h4></div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('numbagexit', [
                                                            'label' => ['text' => 'Número de Semillas' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Número de bolsas que salen de una accesión"></i>'],
                                                            'escape' => false,
                                                            'class' => 'form-control onlynumbers',
                                        ]); ?>
                                    </div>
                                </div>                               
                            </div> 
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12"><h4><i class="fa fa-toggle-on"></i> Motivo de la salida del Material<hr></h4></div>
                            <div class="col-lg-12 col-sm-12 col-xs-12">

                                 <?php echo $this->Form->input('remexit', ['type' => 'textarea',
                                       'label' => 'Descripción' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Descripción del motivo de la salida del material del banco"></i>',
                                       'escape' => false,
                                       'placeholder'=> false, 'escape' => false,'id'=>'remexi','class' =>'comment', 'rows' => '12', 'cols' => '5']);
                                 ?>

                             </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="col-sm-4 text-left">
                       Los Campos con <b style="color:#dd4b39;" class="text-right">(*)</b> son datos obligatorios
                    </div>
                    <div class="col-sm-8">
                         <div class="row  pull-right">            
                         <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/gestion-inventario/banco-semilla/'.$outputSeed->bank_seed_id.'/salida', true) ?>"
                           class="btn btn-default waves-effect m-l-5"> <i class="fa fa-times"></i> CANCELAR </a>                            
                                                           
                            <button type="submit" class="btn btn-success" id="btnOutputSeed"><i class="fa fa-save"></i> GUARDAR REGISTRO</button>
                        </div>
                    </div>
                </div>
                

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
<?php

$this->Html->css('/assets/js/datetime/bootstrap-datepicker3.min.css', ['block' => true]);
$this->Html->script(['/assets/js/datetime/bootstrap-datepicker.min.js', '/assets/js/datetime/bootstrap-datepicker.es.min.js'], ['block' => true]);
$this->Html->scriptBlock('
    $("#fecha-salida").datepicker({autoclose: true,todayHighlight: true, language: "es", format: "dd-mm-yyyy"});
', ['block' => true]);

?>
