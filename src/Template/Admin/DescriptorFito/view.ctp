
    <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title "><i class="fa fa-envira"></i> Detalle del Descriptor</h4>
    </div>
    <div class="box-body">
       
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="box box-success box-solid">
                <div class="box-body">
                    <div class="row">
                       <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="box-header with-border">
                                 <h4 class="box-title"><i class="fa fa-toggle-on" aria-hidden="true"></i> Datos Generales</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="table-responsive">  
                                <table class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <td scope="row" width="50%"><strong><?= __('Colección') ?></strong></td>
                                        <td scope="row"><?php echo $especie->collection->colname?></td>
                                    </tr> 
                                    <tr>
                                        <td scope="row" width="50%"><strong><?= __('Nombre Científico') ?></strong></td>
                                        <td scope="row"><i><?php echo $especie->genus .' '.$especie->species?></i> <?php echo $especie->autor?></td>
                                    </tr>                                                                   
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="box-header with-border">
                                 <h4 class="box-title"><i class="fa fa-envira" aria-hidden="true"></i> Datos del Descriptor</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="table-responsive">  
                                <table class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <td scope="row" width="50%"><strong><?= __('Abreviatura') ?></strong></td>
                                        <td scope="row"><strong><?= strtoupper(h($descriptor->name)) ?></strong></td>
                                    </tr> 
                                    <tr>
                                        <td scope="row" width="50%"><strong><?= __('Descriptor') ?></strong></td>
                                        <td scope="row"><?= h($descriptor->title) ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row" width="50%"><strong><?= __('Tipo') ?></strong></td>
                                        <td scope="row"><?= ($descriptor->value_type == 1)? 'CUANTITATIVO' : 'CUALITATIVO' ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td scope="row" width="50%"><strong><?= __('Metodología de Evaluación') ?></strong></td>
                                        <td scope="row">
                                        <?php echo $this->Form->control('description', [
                                        'label' => '', 'escape'=> false ,
                                        'value' =>h($descriptor->description),
                                        'class' => 'form-control',
                                        'rows'   => 4,
                                        'disabled' => true,
                                         ]); ?>
                                        </td>
                                    </tr>                                    
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php
                      if($descriptor->value_type == 2){
                    ?>
                    <div class="row">
                       <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="box-header with-border">
                                 <h4 class="box-title"><i class="fa fa-envira" aria-hidden="true"></i> Lista de Estados del Descriptor</h4>
                            </div>
                            <div class="table-responsive">  
                               
                                <table class="table table-striped table-bordered table-hover">
                                    <thead class="headTablaListado">
                                        <tr class="text-center th-head-inputs">
                                            <th style="min-width:10px;">N°</th> 
                                            <th style="min-width:20px;">ESTADO</th>
                                            <th style="min-width:30px;">NOMBRE DEL ESTADO</th>
                                        </tr>   
                                        <tbody>  
                                            <?php
                                                $items = 1;  
                                                $state=$descriptor->DescriptorState;
                                                foreach($state as $state):
                                             ?>                                                            
                                                <tr>
                                                    <td><?php echo $this->Number->format($items) ?></td>
                                                    <td><?php echo h($state->code) ?></td>
                                                    <td><?php echo h($state->label) ?></td>        
                                                 </tr> 
                                            <?php $items++; ?>
                                            <?php endforeach; ?>
                                            </tbody>     
                                        </thead>                      
                                </table>                                
                            </div>
                        </div>
                    </div>
                <?php
                  }
                ?>
                    
                </div>
            </div>
            <div class="box-footer">
                <div class="col-sm-12 text-right">
                <button type="button" class="btn btn-default  btnDeleteModal" data-dismiss="modal"><i class="fa fa-times" ></i> CANCELAR</button>
                </div>                    
            </div>   
        </div>       
    </div>