<?php $this->assign('title', $modulo); ?>

<!-- Page Content -->
<section class="content-header">
    <h1>Módulo <?php echo $modulo ?> - Nuevo</h1>

    <?php
        $this->Html->addCrumb('Recursos Fitogenéticos', '/admin/fitogenetico');
        $this->Html->addCrumb('Gestión Inventario', '/admin/fitogenetico/gestion-inventario');
        $this->Html->addCrumb('Banco In Vitro', ['controller' => 'BankInvitro', 'action' => 'index']);
        $this->Html->addCrumb($id, ['controller' => 'PropagationInvitro', 'action' => 'index','id'=>$id]);
        $this->Html->addCrumb('Propagación');
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

<div class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-default box box-success"> 
                    <div class="panel-heading box-header with-border">
                        <h4><i class="fa fa-file-text-o" aria-hidden="true"></i> Nuevo de Registro de Propagación: Lote <?php echo$id?></h4>
                        <div class="pull-right box-tools"> 
                            <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/gestion-inventario/banco-in-vitro/'.$bankInvitro->id.'/propagacion', true) ?>"
                            class="btn btn-default waves-effect m-l-5"><i class="fa fa-arrow-left" ></i> </a>
                        </div>
                    </div>
                    <?php echo $this->Form->create($propagationInvitro, [
                        // 'novalidate',
                        'url' => ['controller' => 'PropagationInvitro', 'action' => 'add' ,'id'=>$id],
                       
                        'autocomplete' => "off",
                        'id' => "form_propagationInvitro",
                         // 'novalidate'
                    ]); ?>
                    <div class="box-body">
                        <div class="col-xs-12 col-md-12 col-lg-6">
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <h4 class="box-title"><i class="fa fa-toggle-on" aria-hidden="true"></i> Datos de Propagación<hr></h4>
                                </div>
                            </div>
                            <div class="row">                            
                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                  
                                        <?php echo $this->Form->control('fecha_propagacion', [
                                                                'label' => ['text' => 'Fecha de Propagación <b style="color:#dd4b39;">(*)</b>' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Fecha que se realiza la renovación o propagación del material"></i>'],
                                                                'escape' => false,
                                                                'value'=>$propagationInvitro->prodate ,
                                                                'class' => 'form-control',
                                        ]); ?>           
                                
                                </div>               

                               <div class="col-lg-6 col-sm-12 col-xs-12">
                                   
                                        <?php echo $this->Form->control('proper', [
                                                                'label' => ['text' => 'Periodo de Propagación <b style="color:#dd4b39;">(*)</b>' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Periodo de propagación del material"></i>'],
                                                                'escape' => false,
                                                                'class' => 'form-control',
                                        ]); ?>                                        
                                    
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                    <div class="form-group">                                        
                                        <?php echo $this->Form->control('propagator', [
                                                                'label' => ['text' => 'Nombre del Propagador <b style="color:#dd4b39;">(*)</b>' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Nombre del personal que realizó la renovación del material"></i>'],
                                                                'escape' => false,
                                                                'class' => 'form-control',
                                        ]); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                    <div class="form-group">                                        
                                        <?php echo $this->Form->control('sigpro', [
                                                                'label' => ['text' => 'Inicales del Propagador <b style="color:#dd4b39;">(*)</b>' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Nombre del personal que realizó la renovación del material"></i>'],
                                                                'escape' => false,
                                                                'class' => 'form-control',
                                        ]); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12 col-lg-6">
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <h4 class="box-title"><i class="fa fa-toggle-on" aria-hidden="true"></i>  Motivo de la Propagación<hr></h4>
                                </div>
                            </div>
                            <div class="row">
                                 <div class="col-lg-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                                <?php echo $this->Form->input('prorem', ['type' => 'textarea',
                                                    'label' => 'Descripción' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Motivo que esta realizando la propagación"></i>',
                                                    'placeholder'=> false, 'escape' => false,'class' =>'comment', 'rows' => '5', 'cols' => '5']); ?> 
                                    </div>
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
                                    <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/gestion-inventario/banco-in-vitro/'.$bankInvitro->id.'/propagacion', true) ?>"
                                class="btn btn-default waves-effect m-l-5"> <i class="fa fa-times"></i> CANCELAR </a>
                                    
                                    <?php 
                                    // echo $this->Form->button('GRABAR',['class'=>'btn btn-success', 'id'=>'btnSpecie'])
                                    ?>                                
                                    <button type="submit" class="btn btn-success" id="btnPropagationInvitro"><i class="fa fa-save"></i> GUARDAR REGISTRO</button>
                            </div>
                        </div>                                             
                    </div>
                    <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<!-- <div class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong><?= __('DATOS GENERALES') ?></strong></h3>
                </div>
                    <?php echo $this->Form->create($propagationInvitro, [
                        // 'novalidate',
                        'url' => ['controller' => 'PropagationInvitro', 'action' => 'add' ,'id'=>$id],
                        'class' => 'row p-10',
                        'autocomplete' => "off",
                        'id' => "form_propagationInvitro",
                         // 'novalidate'
                    ]); ?>
                <div class="box-body">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                            <div id="tabla1" class="tab-pane in active">
                                <div class="row">

                                        <div class="col-lg-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <?php echo $this->Form->control('fecha_propagacion', [
                                                            'label' => ['text' => 'Fecha de Propagación' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Fecha que se realiza la renovación o propagación del material"></i>'],
                                                            'escape' => false,
                                                            'class' => 'form-control'
                                                            // 'readonly' => true
                                                ]); ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <?php echo $this->Form->control('propagator', [
                                                            'label' => ['text' => 'Propagador' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Nombre del personal que realizó la renovación del material"></i>'],
                                                            'escape' => false,
                                                            'class' => 'form-control',
                                                ]); ?>
                                            </div>
                                        </div>

                                         <div class="col-lg-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <?php echo $this->Form->control('proper', [
                                                            'label' => ['text' => 'Periodo de Propagación' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Periodo de propagación del material"></i>'],
                                                            'escape' => false,
                                                            'class' => 'form-control',
                                                ]); ?>
                                            </div>
                                        </div>

                                </div>

                                <div class="row">
                                         <div class="col-lg-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <?php echo $this->Form->input('prorem', ['type' => 'textarea',
                                                    'label' => 'Motivo de la Propagación' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Motivo que esta realizando la propagación"></i>',
                                                 'placeholder'=> false, 'escape' => false,'class' =>'comment', 'rows' => '5', 'cols' => '5']); ?>                                            </div>
                                        </div>

                                </div>

                            </div>
                    </div>


                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-success waves-effect m-r-5" id="btnPropagationInvitro">GRABAR</button>
                        <a href =  "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/gestion-inventario/banco-in-vitro/'.$bankInvitro->id.'/propagacion', true) ?>"
                           class="btn btn-default waves-effect m-l-5"> CANCELAR
                        </a>
                    </div>

                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div> -->

<?php

$this->Html->css('/assets/js/datetime/bootstrap-datepicker3.min.css', ['block' => true]);
$this->Html->script(['/assets/js/datetime/bootstrap-datepicker.min.js', '/assets/js/datetime/bootstrap-datepicker.es.min.js'], ['block' => true]);
$this->Html->scriptBlock('
    $("#fecha-propagacion").datepicker({autoclose: true,todayHighlight: true, language: "es", format: "dd-mm-yyyy"});
', ['block' => true]);

?>