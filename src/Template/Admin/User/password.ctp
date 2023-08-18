
    <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title "><i class="fa fa-key"></i> Cambio de Contraseña</h4>
    </div>
    <div class="modal-body">
        <?php echo $this->Form->create($user, [
            'url' => ['controller' => 'User', 'action' => 'changePass'],
            'class' => 'row p-10',
            'autocomplete' => 'off',
            'id' => "form_change_password"
        ]); ?>        
        <div class="col-sm-12">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                     <p class="text-rigth">Usuario: <strong><?php echo ucfirst($user->names) .' '.ucfirst($user->surnames)  ?></strong></p>
                </div>
            </div>
           
            <div class="form-group">
                <label for="nombre">Contraseña Nueva (*)</label>
                <input type="password" id="password" name="password" class="form-control" >
            </div>
            <div class="form-group">
                <label for="nombre">Confirmar Contraseña clave</label>
                <input type="password" id="password_again" name="password_again" class="form-control">
            </div>
        </div>

        <div class="col-lg-12 text-center">            
            <button type="button" class="btn btn-default  btnDeleteModal" data-dismiss="modal"><i class="fa fa-times" ></i> CANCELAR</button>
            <button type="submit" class="btn btn-success" id="btnChangeClave"><i class="fa fa-save"></i> GUARDAR CLAVE</button>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
    