    <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title "><i class="fa fa-pencil-square-o"></i> Actualización de Datos del Descriptor</h4>
    </div>
    <div class="box-body">
       
        <div class="col-xs-12 col-md-12 col-lg-12">
             <?= $this->Form->create($descriptor, ['id'=> 'form_descriptor', 'autocomplete' => 'off',]) ?>
            <div class="box box-success box-solid">               
                <div class="box-body">                  
                    <div class="row">
                       <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="box-header with-border">
                                 <h4 class="box-title"><i class="fa fa-envira" aria-hidden="true"></i> Datos del Descriptor</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row"> 
                     <?php
                       $state=$descriptor->DescriptorState;
                       $count_valdescrip    = $state->count();
                       if($count_valdescrip>0){$diseable='true';}else{$diseable='false';}
                     
                     ?>  
                    <div class="box-body">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <?php echo $this->Form->control('especie', ['type' => 'hidden', 'value' => $especie->id]) ?>
                                <?php echo $this->Form->control('resource', ['type' => 'hidden', 'value' => 1]) ?>
                                <?php echo $this->Form->control('name', [
                                            'label' => 'Abreviatura del Descriptor <b style="color:#dd4b39;">(*)</b>', 'escape'=> false ,
                                            'class' => 'form-control','value'=>strtoupper(h($descriptor->name))
                                ]); ?>
                                <?php echo $this->Form->control('name_hidden', ['type'=>'hidden', 'value' => $descriptor->name]) ?>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <?php echo $this->Form->control('title', [
                                            'label' => 'Nombre del Descriptor<b style="color:#dd4b39;">(*)</b>', 'escape'=> false ,
                                            'class' => 'form-control',
                                ]); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <?php echo $this->Form->control('value_type', [
                                            'label'    => 'Tipo',
                                            'class'    => 'form-control',
                                            'type'     => 'select',
                                            'options'  => ['1' => 'CUANTITATIVA', '2' => 'CUALITATIVA'],
                                            'disabled' => $diseable,
                                ]); ?>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <?php echo $this->Form->control('flg_catalogue', [
                                            'label'   => 'Catálogo', 'escape'=> false ,
                                            'class'   => 'form-control',
                                            'type'    => 'select',
                                            'options' => ['1' => 'SI', '2' => 'NO'],
                                            'empty'   => '[ SELECCIONE ]',
                                ]); ?>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <?php echo $this->Form->control('description', [
                                        'label' => 'Metodología de Evaluación <b style="color:#dd4b39;">(*)</b>', 'escape'=> false ,
                                        'class' => 'form-control',
                                ]); ?>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>                    
                </div>
            </div>
            <div class="box-footer">
                <div class="col-sm-12 text-right">
                <button type="button" class="btn btn-default  btnDeleteModal" data-dismiss="modal"><i class="fa fa-times" ></i> CANCELAR</button>
                <button type="submit" class="btn btn-primary" id="btnDescriptor"><i class="fa fa-save"></i> GUARDAR REGISTRO</button>
                <?php echo $this->Form->control('especie', ['type' => 'hidden', 'value' => $especie->id]) ?>
                 <?php echo $this->Form->control('resource', ['type' => 'hidden', 'value' => 1]) ?>
                </div>                    
            </div> 
            <?= $this->Form->end() ?>  
        </div>       
    </div>
