<?php $this->assign('title', $modulo); ?>

<!-- Page Content -->
<section class="content-header">
<h1>Recursos Fitogenéticos - Inventarios - Banco <em>In vitro</em></h1>

    <?php
        $this->Html->addCrumb('Recursos Fitogenéticos', '/admin/fitogenetico');
        $this->Html->addCrumb('Gestión Inventario', '/admin/fitogenetico/gestion-inventario');
        $this->Html->addCrumb('Banco In Vitro', ['controller' => 'BankInvitro', 'action' => 'index']);
        $this->Html->addCrumb('LOTE: '.$id, ['controller' => 'OutputInvitro', 'action' => 'index','id'=>$id]);
        $this->Html->addCrumb('Salida');
        $this->Html->addCrumb($child, ['controller' => 'OutputInvitro', 'action' => 'edit','id'=>$id,'child'=>$child]);
        $this->Html->addCrumb('Editar');
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
                <div class="panel-heading ">
                    <h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Actualización de Registro de Salida de Material</h4>
                    <div class="pull-right box-tools"> 
                        <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/gestion-inventario/banco-in-vitro/'.$bankInvitro->id.'/salida', true) ?>"
                        class="btn btn-default waves-effect m-l-5"><i class="fa fa-arrow-left" ></i> </a>
                    </div>  
                </div>
                <?php echo $this->Form->create($outputInvitro, [
                         // 'novalidate',
    
                        'autocomplete' => "off",
                        'id' => "form_outputInvitro",
                         // 'novalidate'
                ]); ?>
                <div class="box-body">
                    <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12"><h4><i class="fa fa-toggle-on"></i> Datos del Solicitante<hr></h4></div>  
                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('reqname', [
                                              'label' => ['text' => 'Nombre del Solicitante <b style="color:#dd4b39;">(*)</b>' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Nombre del solicitante"></i>'],
                                               'escape' => false,
                                              'class' => 'form-control',
                                         ]); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('reqcode', [
                                              'label' => ['text' => 'Código del Solicitante' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Código dado al Instituto o Persona"></i>'],
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
                                              'label' => ['text' => 'Fecha Salida del Materia <b style="color:#dd4b39;">(*)</b>'],
                                              'escape' => false,
                                              'value'=>$outputInvitro->exitdate,
                                              'class' => 'form-control',
                                               // 'readonly' => true
                                        ]); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-lg-12"><h4><i class="fa fa-flask" aria-hidden="true"></i> Material<hr></h4></div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('tubexitnumb', [
                                              'label' => ['text' => 'Número de Tubos <b style="color:#dd4b39;">(*)</b>' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Número de tubo que salen de la accesión"></i>'],
                                              'escape' => false,
                                              'class' => 'form-control onlynumbers',
                                        ]); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('explexitnumb', [
                                             'label' => ['text' => 'Número de Explantes <b style="color:#dd4b39;">(*)</b>' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Número de explantes qdel material"></i>'],
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
                                    <div class="form-group">
                                        <?php echo $this->Form->input('remexit', ['type' => 'textarea',
                                                    'label' => 'Descripción del motivo de la salida del material del banco' ,
                                                    'escape' => false,
                                                    'placeholder'=> false,'escape' => false,'id'=>'remexit','class' =>'comment', 'rows' => '12', 'cols' => '5']); 
                                        ?>
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
                            <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/gestion-inventario/banco-in-vitro/'.$outputInvitro->bank_invitro_id.'/salida', true) ?>"
                           class="btn btn-default waves-effect m-l-5"> <i class="fa fa-times"></i> CANCELAR </a>
                            
                            <?php 
                            // echo $this->Form->button('GRABAR',['class'=>'btn btn-success', 'id'=>'btnSpecie'])
                            ?>                                
                            <button type="submit" class="btn btn-success" id="btnOutputInvitro"><i class="fa fa-save"></i> GUARDAR REGISTRO</button>
                        </div>
                    </div>
                </div>
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