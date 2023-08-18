
<div class="modal-header bg-success">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title "><i class="fa fa-pencil-square-o"></i> Actualización de Datos del Estado</h4>
</div>

<div class="box-body">       
       <div class="col-xs-12 col-md-12 col-lg-12">
           <?= $this->Form->create($descriptorState, ['id' => 'form_descriptorstate', 'autocomplete' => 'off']) ?>
           <div class="box box-success box-solid">               
               <div class="box-body">                  
                   <div class="row">
                      <div class="col-xs-12 col-md-12 col-lg-12">
                           <div class="box-header with-border">
                                <h4 class="box-title"><i class="fa fa-pagelines" aria-hidden="true"></i> Datos del Estado</h4>
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
                                 <?php echo $this->Form->control('descriptor', ['type'=>'hidden', 'value'=>$descriptorState->descriptor_id]) ?>
                                <?php echo $this->Form->control('label_hidden',['type' => 'hidden', 'value' => $descriptorState->label]) ?>
                                <?php echo $this->Form->control('label', [
                                        'label' => 'Nombre de Estado <b style="color:#dd4b39;">(*)</b>', 'escape'=> false ,
                                        'class' => 'form-control',
                                ]); ?>
                           </div>
                           <div class="col-lg-6 col-sm-12 col-xs-12">
                              <?php echo $this->Form->control('code_hidden',['type' => 'hidden', 'value' => $descriptorState->code]) ?>
                                <?php echo $this->Form->control('code', [
                                        'label' => 'Valor del Estado <b style="color:#dd4b39;">(*)</b>', 'escape'=> false ,
                                        'class' => 'form-control onlynumbers noPaste',
                                        'maxlength' => "2",
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
               <button type="submit" class="btn btn-primary" id="btnDescriptorState"><i class="fa fa-save"></i> GUARDAR REGISTRO</button>
         
               </div>                    
           </div> 
           <?= $this->Form->end() ?>  
       </div>       
   </div>


