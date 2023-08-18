
    <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title "><i class="fa fa-search"></i> Detalle del Registro - Usuario</h4>
    </div>
    <div class="box-body">
        <?php echo $this->Form->create($user, [            
            'class' => 'row p-10'            
        ]); ?>  
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="box box-success box-solid">
                <div class="box-body">
                    <div class="row">
                       <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="box-header with-border">
                                 <h4 class="box-title"><i class="fa fa-user-o" aria-hidden="true"></i> Datos del Usuario</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="table-responsive">  
                                <table class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <td scope="row" width="50%"><strong><?= __('Nombres y Apellidos') ?></strong></td>
                                        <td scope="row"><strong><?php echo strtoupper($user->names) .' '.strtoupper($user->surnames)  ?></strong></td>
                                    </tr> 
                                    <tr>
                                        <td scope="row" width="50%"><strong><?= __('Perfil del Usuario') ?></strong></td>
                                        <td scope="row"><?= h($user->role->name) ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row" width="50%"><strong><?= __('Correo Electrónico') ?></strong></td>
                                        <td scope="row"><?= h($user->email) ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="row" width="50%"><strong><?= __('Estación Experimental') ?></strong></td>
                                        <td scope="row"><?= h($user->stations->eea) ?></td>
                                    </tr> 
                                    <tr>
                                        <td scope="row" width="50%"><strong><?= __('Usuario del Sistema') ?></strong></td>
                                        <td scope="row"><?= h($user->username) ?></td>
                                    </tr>                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <div class="col-sm-12 text-right">
                <button type="button" class="btn btn-default  btnDeleteModal" data-dismiss="modal"><i class="fa fa-times" ></i> CANCELAR</button>
                </div>                    
            </div>   
        </div>


        <?php echo $this->Form->end(); ?>
    </div>