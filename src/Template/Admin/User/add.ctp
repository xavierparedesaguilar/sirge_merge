
<?php $this->assign('title', $titulo); ?>

<!-- Page Content -->
<section class="content-header">
<h1>Configuración - Módulo Usuario</h1>

    <?php
        $this->Html->addCrumb('Usuarios', ['controller'=> 'User', 'action' => 'index']);
        $this->Html->addCrumb( 'Crear' );

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

<!-- Page Body -->

<div class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-default box box-success"> 
                <div class="panel-heading ">
                    <h4><i class="fa fa-user-circle-o" aria-hidden="true"></i>  Nuevo de Registro - Usuario</h4>
                </div>
                <?= $this->Form->create($user, [
                        'url' => ['controller' => 'User', 'action' => 'add'],
                        'autocomplete' => "off",
                        'id' => "form_add_user",
                    ])
                ?>
                <div class="box-body">
                   <div class="col-lg-6" >
                        <div class="row">
                            <div class="col-lg-12"><h4><i class="fa fa-user-o" aria-hidden="true"></i> Datos del Usuario<hr></h4></div>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <?php echo $this->Form->control('names', [
                                        'label' => ['text' => 'Nombres <b style="color:#dd4b39;">(*)</b>', 'escape'=> false , 'escape' => false],
                                        'class' => 'form-control text-uppercase',
                                ]);?>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <?php echo $this->Form->control('surnames', [
                                        'label' => ['text' => 'Apellidos <b style="color:#dd4b39;">(*)</b>', 'escape'=> false , 'escape' => false],
                                        'class' => 'form-control text-uppercase',
                                ]); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <?php echo $this->Form->control('gender', [
                                        'label'  => ['text' => 'Genero de Usuario  <b style="color:#dd4b39;">(*)</b> ', 'escape'=> false , 'escape' => false],
                                        'class'  => 'form-control',
                                        'type'   => 'select',
                                        'options'=> ['1' => 'Masculino', '2' => 'Femenino'],
                                        'empty' => '-- Seleccionar --' 
                                ]); ?>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <?php echo $this->Form->control('role_id', [
                                        'label'  => ['text' => 'Perfil de Usuario <b style="color:#dd4b39;">(*)</b>', 'escape'=> false , 'escape' => false],
                                        'class'  => 'form-control',
                                        'type'   => 'select',
                                        'options'=> $roles,
                                        'empty'  => '-- Seleccionar --',
                                        'id'     => 'role_id',
                                ]); ?>
                            </div>
                        </div>
                   </div> 
                   <div class="col-lg-6" >
                        <div class="row">
                            <div class="col-lg-12"><h4><i class="fa fa-toggle-on" aria-hidden="true"></i> Información Adicional del Usuario<hr></h4></div>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <?php echo $this->Form->control('email', [
                                        'label' => ['text' => 'Email <b style="color:#dd4b39;">(*)</b>', 'escape'=> false , 'escape' => false],
                                        'class' => 'form-control',
                                ]); ?>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <?php echo $this->Form->control('station_id', [
                                        'type'   => 'select',
                                        'options'=> $station,
                                        'label'  => __('Seleccionar la Estación Experimental <b style="color:#dd4b39;">(*)</b>'),
                                        'escape' => false,
                                        'class'  => 'form-control select2',
                                        'empty'  => '-- SELECCIONE --',
                                ]); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <?php echo $this->Form->control('password', [
                                        'label' => ['text' => 'Contraseña de Acceso <b style="color:#dd4b39;">(*)</b>', 'escape'=> false , 'escape' => false],
                                        'class' => 'form-control',
                                ]); ?>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <?php echo $this->Form->control('Permitir al Usuario acceso a la información de todas las Estaciones Experimentales', [
									  'type'   => 'checkbox',
									  'name'   => 'Permiso',
                                      'format' => array('before', 'input', 'between', 'label', 'after', 'error' ),
									  'class'  => 'colored-success',
									  'value'  => 1,
                                ]); ?>
                                
                                
                            </div>
                        </div>                        
                   </div>
                   
                    <br>
                    <!-- Imprime los permisos de acuerdo al rol  seleccionado -->
                    <div class="col-lg-6">
                        <h4><i class="fa fa-toggle-on" aria-hidden="true"></i> Lista de opciones para acceso a los módulos del SIRGE</h4>
                    </div>
                    <div class="col-lg-6 text-center">
                        <div class="row pull-right">
                             Campos con <b style="color:#dd4b39;" class="text-right">(*)</b> son datos obligatorios
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-12 col-lg-12">
                    <!-- INICIO DE LOS TABS DE GENERAL Y DE CADA RECURSO -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="active"><a data-toggle="tab" aria-expanded="true" href="#tabla1"><i class="fa fa-list-alt" aria-hidden="true"></i> MÓDULOS GENERALES</a></li>
                                <li class="tab-red"><a data-toggle="tab" aria-expanded="true" href="#tabla2"><i class="fa fa-pagelines"></i> RECURSOS FITOGENÉTICOS</a></li>
                                <li class="tab-red"><a data-toggle="tab" aria-expanded="true" href="#tabla3"><i class="fa fa fa-twitter"></i> RECURSOS ZOOGENÉTICOS</a></li>
                                <li class="tab-red"><a data-toggle="tab" aria-expanded="true" href="#tabla4"><i class="fa fa-bug" aria-hidden="true"></i> RECURSOS MICROORGANISMOS</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tabla1" class="tab-pane active">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="create-user-table">
                                            <thead>
                                                <tr class="p-3 mb-2 bg-warning text-dark">
                                                    <th class="text-left">Módulo</th>
                                                    <th>Consultar</th>
                                                    <th>Ingresar</th>
                                                    <th>Editar</th>
                                                    <th>Importar</th>
                                                    <th>Exportar</th>
                                                    <th>Deshabilitar</th>
                                                    <th>Detalle</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($modulos as $key => $modulo): ?>
                                                    <!--  IMPRIME LOS TITULOS PRINCIPALES  -->
                                                    <?php if($modulo->status == 1 && $modulo->resource_id == 4){ ?>
                                                    <tr>
                                                        <td class="text-left">
                                                            <i class="<?php echo $modulo->icon ?>"></i> <?php echo $modulo->title ?>
                                                        </td>

                                                        <!-- IMPRIME LOS CHECKBOX PARA CADA ITEM -->
                                                        <?php if (true) { ?>
                                                            <?php for ($i = 1; $i < 8; $i++) : ?>
                                                                <td>
                                                                    <div>
                                                                        <label>
                                                                            <input id="<?php echo $modulo->id . "_" . $i; ?>"
                                                                                   type="checkbox"
                                                                                   name="permissions[<?php echo $modulo->id ?>][]"
                                                                                   class="colored-success">
                                                                            <span class="text"></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            <?php endfor; ?>
                                                        <?php } else { ?>
                                                            <td colspan="7"></td>
                                                        <?php } ?>
                                                    </tr>
                                                    <?php if (count($modulo->modulerole) > 0): ?>
                                                        <?php foreach ($modulo->modulerole as $keyval => $relacion): ?>
                                                            <tr>
                                                                <td class="text-left p-l-30">
                                                                    <i class="<?php echo $relacion->icon ?>"></i> <?php echo $relacion->title ?>
                                                                </td>
                                                                <?php for ($j = 1; $j < 8; $j++) { ?>
                                                                    <td>
                                                                        <div>
                                                                            <label>
                                                                                <input id="<?php echo $relacion->id . "_" . $j; ?>"
                                                                                       type="checkbox"
                                                                                       name="permissions[<?php echo $relacion->id ?>][]"
                                                                                       class="colored-success">
                                                                                <span class="text"></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                <?php } ?>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="tabla2" class="tab-pane">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="create-user-table">
                                            <thead class="bordered-darkorange">
                                                 <tr class="p-3 mb-2 bg-warning text-dark">
                                                    <th class="text-left">Módulo</th>
                                                    <th>Consultar</th>
                                                    <th>Ingresar</th>
                                                    <th>Editar</th>
                                                    <th>Importar</th>
                                                    <th>Exportar</th>
                                                    <th>Deshabilitar</th>
                                                    <th>Detalle</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($modulos_1 as $key => $modulo): ?>
                                                    <!--  IMPRIME LOS TITULOS PRINCIPALES  -->
                                                    <?php if($modulo->status == 1){ ?>
                                                    <tr>
                                                        <td class="text-left">
                                                            <i class="<?php echo $modulo->icon ?>"></i> <?php echo $modulo->title ?>
                                                        </td>
                                                        <!-- IMPRIME LOS CHECKBOX PARA CADA ITEM -->
                                                        <?php if (true) { ?>
                                                            <?php for ($i = 1; $i < 8; $i++) : ?>
                                                                <td>
                                                                    <div>
                                                                        <label>
                                                                            <input id="<?php echo $modulo->id . "_" . $i; ?>"
                                                                                   type="checkbox"
                                                                                   name="permissions[<?php echo $modulo->id ?>][]"
                                                                                   class="colored-success">
                                                                            <span class="text"></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            <?php endfor; ?>
                                                        <?php } else { ?>
                                                            <td colspan="7"></td>
                                                        <?php } ?>
                                                    </tr>
                                                    <?php if (count($modulo->modulerole) > 0): ?>
                                                        <?php foreach ($modulo->modulerole as $keyval => $relacion): ?>
                                                            <tr>
                                                                <td class="text-left p-l-30">
                                                                    <i class="<?php echo $relacion->icon ?>"></i> <?php echo $relacion->title ?>
                                                                </td>
                                                                <?php for ($j = 1; $j < 8; $j++) { ?>
                                                                    <td>
                                                                        <div>
                                                                            <label>
                                                                                <input id="<?php echo $relacion->id . "_" . $j; ?>"
                                                                                       type="checkbox"
                                                                                       name="permissions[<?php echo $relacion->id ?>][]"
                                                                                       class="colored-success">
                                                                                <span class="text"></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                <?php } ?>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="tabla3" class="tab-pane">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="create-user-table">
                                            <thead class="bordered-darkorange">
                                                <tr class="p-3 mb-2 bg-warning text-dark">
                                                    <th class="text-left">Módulo</th>
                                                    <th>Consultar</th>
                                                    <th>Ingresar</th>
                                                    <th>Editar</th>
                                                    <th>Importar</th>
                                                    <th>Exportar</th>
                                                    <th>Deshabilitar</th>
                                                    <th>Detalle</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($modulos_2 as $key => $modulo): ?>
                                                    <!--  IMPRIME LOS TITULOS PRINCIPALES  -->
                                                    <?php if($modulo->status == 1){ ?>
                                                    <tr>
                                                        <td class="text-left">
                                                            <i class="<?php echo $modulo->icon ?>"></i> <?php echo $modulo->title ?>
                                                        </td>

                                                        <!-- IMPRIME LOS CHECKBOX PARA CADA ITEM -->
                                                        <?php if (true) { ?>
                                                            <?php for ($i = 1; $i < 8; $i++) : ?>
                                                                <td>
                                                                    <div>
                                                                        <label>
                                                                            <input id="<?php echo $modulo->id . "_" . $i; ?>"
                                                                                   type="checkbox"
                                                                                   name="permissions[<?php echo $modulo->id ?>][]"
                                                                                   class="colored-success">
                                                                            <span class="text"></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            <?php endfor; ?>
                                                        <?php } else { ?>
                                                            <td colspan="7"></td>
                                                        <?php } ?>
                                                    </tr>
                                                    <?php if (count($modulo->modulerole) > 0): ?>
                                                        <?php foreach ($modulo->modulerole as $keyval => $relacion): ?>
                                                            <tr>
                                                                <td class="text-left p-l-30">
                                                                    <i class="<?php echo $relacion->icon ?>"></i> <?php echo $relacion->title ?>
                                                                </td>
                                                                <?php for ($j = 1; $j < 8; $j++) { ?>
                                                                    <td>
                                                                        <div>
                                                                            <label>
                                                                                <input id="<?php echo $relacion->id . "_" . $j; ?>"
                                                                                       type="checkbox"
                                                                                       name="permissions[<?php echo $relacion->id ?>][]"
                                                                                       class="colored-success">
                                                                                <span class="text"></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                <?php } ?>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="tabla4" class="tab-pane">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="create-user-table">
                                            <thead class="bordered-darkorange">
                                               <tr class="p-3 mb-2 bg-warning text-dark">
                                                    <th class="text-left">Módulo</th>
                                                    <th>Consultar</th>
                                                    <th>Ingresar</th>
                                                    <th>Editar</th>
                                                    <th>Importar</th>
                                                    <th>Exportar</th>
                                                    <th>Deshabilitar</th>
                                                    <th>Detalle</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($modulos_3 as $key => $modulo): ?>
                                                    <!--  IMPRIME LOS TITULOS PRINCIPALES  -->
                                                    <?php if($modulo->status == 1){ ?>
                                                    <tr>
                                                        <td class="text-left">
                                                            <i class="<?php echo $modulo->icon ?>"></i>
                                                                <?php echo $modulo->title ?>
                                                        </td>
                                                        <!-- IMPRIME LOS CHECKBOX PARA CADA ITEM -->
                                                        <?php if (true) { ?>
                                                            <?php for ($i = 1; $i < 8; $i++) : ?>
                                                                <td>
                                                                    <div>
                                                                        <label>
                                                                            <input id="<?php echo $modulo->id . "_" . $i; ?>"
                                                                                   type="checkbox"
                                                                                   name="permissions[<?php echo $modulo->id ?>][]"
                                                                                   class="colored-success">
                                                                            <span class="text"></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            <?php endfor; ?>
                                                        <?php } else { ?>
                                                            <td colspan="7"></td>
                                                        <?php } ?>
                                                    </tr>
                                                    <?php if (count($modulo->modulerole) > 0): ?>
                                                        <?php foreach ($modulo->modulerole as $keyval => $relacion): ?>
                                                            <tr>
                                                                <td class="text-left p-l-30">
                                                                    <i class="<?php echo $relacion->icon ?>"></i> <?php echo $relacion->title ?>
                                                                </td>
                                                                <?php for ($j = 1; $j < 8; $j++) { ?>
                                                                    <td>
                                                                        <div>
                                                                            <label>
                                                                                <input id="<?php echo $relacion->id . "_" . $j; ?>"
                                                                                       type="checkbox"
                                                                                       name="permissions[<?php echo $relacion->id ?>][]"
                                                                                       class="colored-success">
                                                                                <span class="text"></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                <?php } ?>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="col-sm-12 text-center">
                        <div class="row  pull-right">
                            <?php echo $this->Html->link('<i class="fa fa-times" ></i> CANCELAR',
                                    ['controller' => 'User', 'action' => 'index'],
                                    ['class' => 'btn  btn-default', 'data-toggle'=> "tooltip", 'escape'=>false])
                            ?>
                           <?php echo $this->Form->button('<i class="fa fa-save"></i> GUARDAR REGISTRO', ['class' => 'btn btn-success', 'id' => 'btnUser']) ?>
                        </div>
                    </div>
                </div>
                
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    $(function() {

        $("input:checkbox").change(function(e) {

          if ($(this).prop('checked')){
            var id=$(this).attr('id'); // it will get value from checked checkbox;
            id = id.split("_");
            $(this).val(id[1]);
            console.log('checked');
          }else{
            $(this).val('');
            console.log('not checked');
          }
        });
    });

</script>

<?php

$this->Html->css(['/assets/js/select2/select2.min.css'], ['block' => 'css']);
$this->Html->script(['/assets/js/select2/select2.js'], ['block' => 'script']);
$this->Html->scriptBlock('$("#country-id").select2();', ['block' => 'script']);

?>