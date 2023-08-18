
<?php $this->assign('title', $modulo); ?>

<!-- Page Content -->
<section class="content-header">
<h1>Recursos Fitogenéticos - Inventarios - Banco <em>In vitro</em></h1>


    <?php
        $this->Html->addCrumb('Recursos Fitogenéticos', '/admin/fitogenetico');
        $this->Html->addCrumb('Gestión Inventario', '/admin/fitogenetico/gestion-inventario');
        $this->Html->addCrumb('Banco In Vitro', ['controller' => 'BankInvitro', 'action' => 'index']);
        $this->Html->addCrumb('LOTE: '.$id, ['controller' => 'inputInvitro', 'action' => 'index','id'=>$id]);
        $this->Html->addCrumb('Entrada');
        $this->Html->addCrumb($child, ['controller' => 'inputInvitro', 'action' => 'edit','id'=>$id,'child'=>$child]);
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
                    <h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Actualización de Registro de Entrada de Material</h4>
                    <div class="pull-right box-tools">                   
                      <?php echo $this->Html->link('<i class="fa fa-arrow-left" ></i>',
                                    ['controller' => 'InputInvitro', 'action' => 'index','id'=> $inputInvitro->bank_invitro_id],
                                    ['class' => 'btn  btn-default', 'data-toggle'=> "tooltip",  'title'=> "Regresar", 'escape'=>false])
                        ?>
                    </div>
                </div>
                <?php echo $this->Form->create($inputInvitro, [
                         // 'novalidate',
                         'autocomplete' => "off",
                         'id' => "form_inputInvitro",
                ]); ?>
                <div class="box-body">
                    <div class="col-lg-6">
                        <div class="row">
                           <div class="col-lg-12"><h4><i class="fa fa-toggle-on"></i> Datos del Donante<hr></h4></div>  
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <?php echo $this->Form->control('donorname', [
                                         'label' => ['text' => 'Nombre del Donante' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Nombre del Donante del Material"></i>'],
                                         'escape' => false,
                                         'class' => 'form-control',
                                    ]); ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <?php echo $this->Form->control('donorcore', [
                                          'label' => ['text' => 'Código del Donante' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Código dado al Instituto donante o Persona"></i>'],
                                          'escape' => false,
                                          'class' => 'form-control',
                                    ]); ?>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo $this->Form->control('donornumb', [
                                          'label' => ['text' => 'Código de Accesión' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Código del Material del Donante"></i>'],
                                          'escape' => false,
                                          'class' => 'form-control',
                                    ]); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo $this->Form->control('fecha_entrada', [
                                          'label' => ['text' => 'Fecha Entrada del material' . ' '],
                                          'escape' => false,
                                          'class' => 'form-control',
                                          'id'=>'fecha_entrada',
                                          'value'=>$inputInvitro->enterdate
                                           // 'readonly' => true
                                    ]); ?>
                                </div>            
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-12"><h4><i class="fa fa-flask" aria-hidden="true"></i> Material<hr></h4></div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo $this->Form->control('tubentnumb', [
                                          'label' => ['text' => 'Número de Tubos de Entrada' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Número de tubo que entran de una accesión in vitro"></i>'],
                                          'escape' => false,
                                          'class' => 'form-control',
                                    ]); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php echo $this->Form->control('explentnumb', [
                                          'label' => ['text' => 'Número de Explantes de Entrada' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Número de explantes que entran in vitro de una accesión"></i>'],
                                          'escape' => false,
                                          'class' => 'form-control',
                                    ]); ?>
                                </div>            
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                            <div class="col-lg-12"><h4><i class="fa fa-toggle-on"></i> Motivo de la entrada del Material<hr></h4></div>  
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <?php echo $this->Form->input('rement', ['type' => 'textarea',
                                                'label' => 'Descripción del motivo de la entrada del material al banco' . ' ',
                                                'escape' => false,
                                                 'placeholder'=> false, 'escape' => false,'class' =>'comment', 'rows' => '12', 'cols' => '5']); 
                                                 
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
                            <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/gestion-inventario/banco-in-vitro/'.$bankInvitro->id.'/entrada', true) ?>"
                           class="btn btn-default waves-effect m-l-5"> <i class="fa fa-times"></i> CANCELAR </a>
                            
                            <?php 
                            // echo $this->Form->button('GRABAR',['class'=>'btn btn-success', 'id'=>'btnSpecie'])
                            ?>                                
                            <button type="submit" class="btn btn-success" id="btnInputInvitro"><i class="fa fa-save"></i> GUARDAR REGISTRO</button>
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
    $("#fecha_entrada").datepicker({autoclose: true,todayHighlight: true, language: "es", format: "dd-mm-yyyy"});
', ['block' => true]);

?>