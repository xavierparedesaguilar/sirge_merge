<?php $this->assign('title', $modulo); ?>

<!-- Page Content -->
<section class="content-header">
<h1>Recursos Fitogenéticos - Inventarios - Banco <em>In vitro</em></h1>

    <?php
        $this->Html->addCrumb('Recursos Fitogenéticos', '/admin/fitogenetico');
        $this->Html->addCrumb('Gestión Inventario', '/admin/fitogenetico/gestion-inventario');
        $this->Html->addCrumb('Banco In Vitro', ['controller' => 'BankInvitro', 'action' => 'index']);
        $this->Html->addCrumb($id, ['controller' => 'ConservationInvitro', 'action' => 'index','id'=>$id]);
        $this->Html->addCrumb('Conservación');
        $this->Html->addCrumb($child, ['controller' => 'ConservationInvitro', 'action' => 'edit','id'=>$id,'child'=>$child]);
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
                        <div class="panel-heading box-header with-border">
                            <h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Actualización de Registro de Conservación: Lote <?php echo$id?></h4>
                            <div class="pull-right box-tools"> 
                                            <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/gestion-inventario/banco-in-vitro/'.$bankInvitro->id.'/conservacion', true) ?>"
                                            class="btn btn-default waves-effect m-l-5"><i class="fa fa-arrow-left" ></i> </a>
                            </div>
                        </div> 
                        <?php echo $this->Form->create($conservationInvitro, [
                            //'novalidate',
                            'autocomplete' => "off",
                            'id' => "form_conservationInvitro",
                            //'novalidate'
                        ]); ?>
                        <div class="box-body">
                            <div class="col-xs-12 col-md-12 col-lg-6"> 
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                        <h4 class="box-title"><i class="fa fa-toggle-on" aria-hidden="true"></i> Datos de Conservación<hr></h4>                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <?php echo $this->Form->control('consresponsible', [
                                                                        'label' => ['text' => 'Personal Responsable' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Nombre del personal responsable del material"></i>'],
                                                                        'escape' => false,
                                                                        'class' => 'form-control',
                                            ]); ?>
                                        </div>
                                    </div>  
                                </div>                         
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 col-xs-12">
                                        <?php echo $this->Form->control('fecha_conservacion', [
                                                                    'label' => ['text' => 'Fecha Conservación' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Fecha que se realiza la conservación del material"></i>'],
                                                                    'escape' => false,
                                                                    'class' => 'form-control',
                                                                    'value'=> $conservationInvitro->constime,
                                                                    // 'readonly' => true
                                         ]); ?>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 col-xs-12">
                                        <?php echo $this->Form->control('stoper', [
                                                                    'label' => ['text' => 'Periodo de Conservación' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Periodo de conservación del material"></i>'],
                                                                    'escape' => false,
                                                                    'class' => 'form-control',
                                        ]); ?>
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
                                        <?php echo $this->Form->input('consrem', ['type' => 'textarea',
                                                                      'label' => 'Motivo de Conservación' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Motivo que esta realizando la conservación"></i>',
                                                                      'escape' => false,
                                                                      'placeholder'=> false, 'escape' => false,
                                                                      'class' =>'comment', 'rows' => '5',
                                                                       'cols' => '5']);
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
                                        <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/gestion-inventario/banco-in-vitro/'.$conservationInvitro->bank_invitro_id.'/conservacion', true) ?>"
                                    class="btn btn-default waves-effect m-l-5"> <i class="fa fa-times"></i> CANCELAR </a>                                    
                                        <?php 
                                        // echo $this->Form->button('GRABAR',['class'=>'btn btn-success', 'id'=>'btnSpecie'])
                                        ?>                                
                                        <button type="submit" class="btn btn-success" id="btnConservationInvitro"><i class="fa fa-save"></i> GUARDAR REGISTRO</button>
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
    $("#fecha-conservacion").datepicker({autoclose: true,todayHighlight: true, language: "es", format: "dd-mm-yyyy"});
', ['block' => true]);

?>