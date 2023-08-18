
<?php $this->assign('title', $modulo); ?>

<!-- Page Content -->
<section class="content-header">
        <h1>Recursos Fitogenéticos - Inventarios - Banco <em>In vitro</em></h1>
        <?php
                $this->Html->addCrumb('Recursos Fitogenéticos', '/admin/fitogenetico');
                $this->Html->addCrumb('Gestión Inventario', '/admin/fitogenetico/gestion-inventario');
                $this->Html->addCrumb('Banco In Vitro', ['controller' => 'BankInvitro', 'action' => 'index']);
                $this->Html->addCrumb('LOTE: '.$bankInvitro->id, ['controller' => 'BankInvitro', 'action' => 'edit','id'=>$bankInvitro->id]);
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
                <div class="panel-heading  box-header with-border">
                        <h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Actualización de Registro - Inventario: <?php echo$passport->accenumb?></strong> - LOTE <?php echo$bankInvitro->lotnumb;?></h4>
                        <div class="pull-right box-tools">
                                <?php echo $this->Html->link('<i class="fa fa-arrow-left" ></i>',
                                                ['controller' => 'BankInvitro', 'action' => 'index'],
                                                ['class' => 'btn  btn-default', 'data-toggle'=> "tooltip",  'title'=> "Regresar", 'escape'=>false])
                                ?>
                        </div>
                </div>
            
                    <?php echo $this->Form->create($bankInvitro, [
                         // 'novalidate',
                        'url' => ['controller' => 'BankInvitro', 'action' => 'edit'],
                        'autocomplete' => "off",
                        'id' => "form_bankInvitro",
                         // 'novalidate'
                    ]); ?>
                
                <div class="box-body">
                   <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="nav-tabs-custom tab-success">
                            <ul class="nav nav-tabs " id="myTab">
                                <li class="active"><a data-toggle="tab" aria-expanded="true" href="#tabla1">  <i class="fa fa-file-o"></i> DATOS GENERALES</a></li>
                                <li class="tab-red"><a data-toggle="tab" aria-expanded="true" href="#tabla2"> <i class="fa fa-pagelines"></i> DATOS DEL MATERIAL</a></li>
                                <li class="tab-red"><a data-toggle="tab" aria-expanded="true" href="#tabla3"> <i class="fa fa-viadeo" aria-hidden="true"></i> DATOS DE LA PLANTA</a></li>
                            </ul>
                             <div class="tab-content">
                               <div id="tabla1" class="tab-pane in active">
                                  <div class="row">
                                     <div class="col-lg-6">
                                                 <div class="col-lg-12"><h4>:: Información Datos Pasaporte<hr></h4></div>                                     
                                                <div class="row">
                                                        <div class="col-lg-8 col-sm-12 col-xs-12">
                                                        <div class="form-group text">
                                                        <label for="pasaporte">Ingresar el Código de Accesión (CODPER) para su validación</label><b style="color:#dd4b39;"> (*)</b>
                                                                <div class="input-group">
                                                                <input type="text" name="pasaporte" id="txtCodPasaporte" class="form-control" value="<?php echo empty($passport)? '' : $passport->accenumb ?>">
                                                                <span class="input-group-btn" style="padding-bottom: 18px;">
                                                                        <button type="button" data-toggle="tooltip"   id="btnPasaporteInvitro" class="btn btn-warning btn-flat" ><i class="fa fa-search"></i></button>
                                                                </span>
                                                                </div>
                                                        </div>                                         
                                                        </div>
                                                        <div class="col-lg-4 col-sm-12 col-xs-12">
                                                        <div class="form-group text">
                                                        <br>
                                                        <span id="msjBancoInvitro" class='badge badge-danger' style=" padding-top:200;padding-right:30 ;padding-bottom:80 ;padding-left:300"></span>
                                                        </div>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-lg-6 col-sm-12 col-xs-12">
                                                        <?php  echo $this->Form->control('codigoAccesion',[
                                                                'label'=> 'Nombre de la Accesión' . '',
                                                                'escape' => false,
                                                                'class'=> 'form-control',
                                                                'value'=> $passport->accname,
                                                                'id'   => 'txtAccname',
                                                        ]); ?>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-12 col-xs-12">
                                                        <?php  echo $this->Form->control('codigoAccesion',[
                                                                'label'=> 'Otro Código de Accesión' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Código de identificación exclusivo de las accesiones : Código PER"></i>',
                                                                'escape' => false,
                                                                'class'=> 'form-control',
                                                                'value'=> $passport->othenumb,
                                                                'id'   => 'txtCodAccesion',
                                                        ]); ?>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-lg-6 col-sm-12 col-xs-12">
                                                        <?php  echo $this->Form->control('collection',[
                                                                'label'=> 'Colección' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Nombre de la colección"></i>',
                                                                'escape' => false,
                                                                'class'=> 'form-control',
                                                                'value'=> $passport->specie->collection->colname,
                                                                'id'   => 'txtCollecion',
                                                        ]); ?>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-12 col-xs-12">
                                                        <?php  echo $this->Form->control('especie',[
                                                                'label'=> 'Nombre Científico' ,
                                                                'escape' => false,
                                                                'class'=> 'form-control text-uppercase',
                                                                'id'   => 'txtEspecie',
                                                                'value'=> $passport->specie->genus.' '.$passport->specie->species.' '.$passport->specie->autor,
                                                        ]); ?>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-12 col-xs-12">
                                                        <?php  echo $this->Form->control('comun',[
                                                                'label'=> 'Nombre Común' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Nombre común de la especie cultivada"></i>',
                                                                'escape' => false,
                                                                'class'=> 'form-control text-uppercase',
                                                                'id'   => 'txtComun',
                                                                'value'=> $passport->specie->cropname,
                                                                'disabled'=>true,
                                                        ]); ?>
                                                    </div>
                                                </div>                                       
                                     </div>
                                     <div class="col-lg-6">
                                        <div class="row">  
                                                <div class="col-lg-12"><h4>:: Información Adicional<hr></h4></div>
                                                <div class="row">
                                                       <div class="col-lg-6 col-sm-12 col-xs-12">
                                                            <?php echo $this->Form->hidden('passport_id',['id'=>'hdn_pasaporteid']);?>
                                                            <?php echo $this->Form->control('fecha_aquisicion', [
                                                                'label' => ['text' => 'Fecha de Introducción al Banco <b style="color:#dd4b39;">(*)</b>' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Fecha en la que se incorporo el material a la colección in vitro"></i>'],
                                                                'escape' => false,
                                                                'class' => 'form-control ',
                                                                'id'=>'fecha_adquisicion',
                                                                'value'=>$bankInvitro->acqdate
                                                                  // 'readonly' => true
                                                             ]); ?>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-12 col-xs-12">
                                                             <?php echo $this->Form->control('responsible', [
                                                                'label' => ['text' => 'Nombre del Responsable del material <b style="color:#dd4b39;">(*)</b>' . ''],
                                                                'escape' => false,
                                                                'class' => 'form-control',
                                                             ]); ?>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-lg-6 col-sm-12 col-xs-12">
                                                            <?php  echo $this->Form->control('origin',[
                                                                'label'=> 'Lugar de Procedencia del material <b style="color:#dd4b39;">(*)</b>' . ' ',
                                                                'escape' => false,
                                                                'class'=> 'form-control',
                                                             ]); ?>
                                                        </div>
                                                       <div class="col-lg-6 col-sm-12 col-xs-12">
                                                             <?php echo $this->Form->control('availability',
                                                                ['type' => 'select',
                                                                'options' => $tipo_disponibilidad,
                                                                'label' => __('Disponibilidad del lote de le Accesión <b style="color:#dd4b39;">(*)</b>' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Disponibilidad del lote de le Accesión "></i>'),
                                                                'escape' => false,
                                                                'class' => 'form-control',
                                                                'empty' => '-- SELECCIONE --' 
                                                             ]);?>
                                                        </div>
                                                         </div>
                                                         <div class="row">  
                                                                        <div class="col-lg-12"><h4>:: Observaciones o Anotaciones<hr></h4></div>
                                                         </div>
                                                         <div class="row"> 
                                                                <div class="col-lg-12 col-sm-12 col-xs-12">
                                                                        <?php echo $this->Form->input('remarks', ['type' => 'textarea',
                                                                        'label' => '<em>Para añadir información faltante o alguna observación relacionada a los datos del Lote</em>' ,
                                                                        'escape' => false,
                                                                        'placeholder'=> false, 'escape' => false,'class' =>'comment', 'rows' => '3', 'cols' => '5']); ?>
                                                                </div>
                                                         </div>
                                        </div>
                                     </div>
                                  </div>
                                </div>
                                <div id="tabla2" class="tab-pane tab-pane">
                                                 <div class="row">
                                                    <div class="col-lg-6">
                                                         <div class="row">  
                                                                 <div class="col-lg-12"><h4><i class="fa fa-thermometer-quarter" aria-hidden="true"></i> Medio de Conservación y Ubicación<hr></h4></div>
                                                         </div>
                                                         <div class="row">
                                                                 <div class="col-lg-6 col-sm-12 col-xs-12">
                                                                        <?php echo $this->Form->control('storoom',
                                                                                ['type' => 'select',
                                                                                'options' => $tipo_conservacion,
                                                                                'label' => __('Lugar de Almacenamiento <b style="color:#dd4b39;">(*)</b>' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Lugar donde se conserva el material de acuerdo a la temperatura"></i>'),
                                                                                'escape' => false,
                                                                                'class' => 'form-control',
                                                                                'empty' => '-- SELECCIONE --' ]);
                                                                        ?>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                                                        <?php echo $this->Form->control('temp',
                                                                                ['type' => 'select',
                                                                                'options' => $temperatura,
                                                                                'label' => __('Temperatura <b style="color:#dd4b39;">(*)</b>' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Temperatura del lugar de conservación"></i>'),
                                                                                'escape' => false,
                                                                                'class' => 'form-control',
                                                                                'empty' => '-- SELECCIONE --' ]);
                                                                        ?>
                                                                </div>
                                                         </div>
                                                         <div class="row">
                                                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                                                        <?php echo $this->Form->control('shelving', [
                                                                                'label' => ['text' => 'Ubicación del material (estantería) <b style="color:#dd4b39;">(*)</b>' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Ubicación del material dentro del cuarto de conservación"></i>'],
                                                                                'escape' => false,
                                                                                'class' => 'form-control',
                                                                        ]); ?>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                                                        <?php echo $this->Form->control('levelshelv', [
                                                                                        'label' => ['text' => 'Nivel de Estantería <b style="color:#dd4b39;">(*)</b>' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Nivel de estantería donde se encuentra la gradilla con el tubo con accesión"></i>'],
                                                                                        'escape' => false,
                                                                                        'class' => 'form-control',
                                                                        ]); ?>
                                                                 </div>
                                                         </div>
                                                         <div class="row">
                                                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                                                        <?php echo $this->Form->control('rack', [
                                                                                'label' => ['text' => 'Número de Gradilla <b style="color:#dd4b39;">(*)</b>' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Número de gradilla donde se encuentra el tubo de la accesión"></i>'],
                                                                                'escape' => false,
                                                                                'class' => 'form-control',
                                                                        ]); ?>
                                                                </div>
                                                         </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="row">  
                                                                 <div class="col-lg-12"><h4><i class="fa fa-steam" aria-hidden="true"></i> Stock del Material<hr></h4></div>
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-lg-4 col-sm-12 col-xs-12">
                                                                        <?php echo $this->Form->control('tubenumb', [
                                                                                'label' => ['text' => 'Cantidad de Tubos por Material <b style="color:#dd4b39;">(*)</b>' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Número de tubos que se mantienen por cada material"></i>'],
                                                                                'escape' => false,
                                                                                'class' => 'form-control',
                                                                        ]); ?>
                                                                </div>
                                                                <div class="col-lg-4 col-sm-12 col-xs-12">
                                                                        <?php echo $this->Form->control('explnumb', [
                                                                                        'label' => ['text' => 'Números de Explantes <b style="color:#dd4b39;">(*)</b>' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Número de explantes por tubo"></i>'],
                                                                                        'escape' => false,
                                                                                        'class' => 'form-control',
                                                                        ]); ?>
                                                                </div>
                                                                <div class="col-lg-4 col-sm-12 col-xs-12">
                                                                        <?php echo $this->Form->control('tubesize',
                                                                                ['type' => 'select',
                                                                                'options' => $lista_tamanio_tubo,
                                                                                'label' => __('Tamaño Tubo a utlizar <b style="color:#dd4b39;">(*)</b>' ),
                                                                                'escape' => false,
                                                                                'class' => 'form-control',
                                                                                'empty' => '-- SELECCIONE --' ]);
                                                                         ?>
                                                                </div>
                                                        </div>
                                                        <div class="row">  
                                                                <div class="col-lg-12"><h4><i class="fa fa-unlock-alt" aria-hidden="true"></i> Duplicados de Seguridad del Material<hr></h4></div>
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                                                        <?php echo $this->Form->control('duplinstname', [
                                                                                'label' => ['text' => 'Ubicación de las replicas del material' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Lugar donde se guarda una replica del material de in vitro"></i>'],
                                                                                'escape' => false,
                                                                                'class' => 'form-control',
                                                                        ]); ?>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                                                        <?php echo $this->Form->control('dupnumb', [
                                                                                'label' => ['text' => 'Cantidad de replicas del material'],
                                                                                'escape' => false,
                                                                                'class' => 'form-control',
                                                                        ]); ?>
                                                                </div>
                                                        </div>
                                                    </div>
                                                 </div>
                                            </div>
                                            <div id="tabla3" class="tab-pane tab-pane">
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-12 col-xs-12">
                                                        <div class="row">  
                                                                <div class="col-lg-12"><h4><i class="fa fa-pagelines"></i> Estado de la Planta<hr></h4></div>
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                                                        <?php echo $this->Form->control('plastate',
                                                                                ['type' => 'select',
                                                                                'options' => $lista_estado_planta,
                                                                                'label' => __('Estado de viabilidad de la Planta' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Viabilidad del material mantenidas en condición in vitro"></i>'),
                                                                                'escape' => false,
                                                                                'class' => 'form-control',
                                                                                'empty' => '-- SELECCIONE --' ]);
                                                                        ?>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-12 col-xs-12">

                                                                        <?php echo $this->Form->control('necrosis',
                                                                                ['type' => 'select',
                                                                                'options' => $lista_necrosis,
                                                                                'label' => __('Necrosis de Yema y Tallo' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Lesiones oscuras en la yema y tallo debido a la presencia de células muertas"></i>'),
                                                                                'escape' => false,
                                                                                'class' => 'form-control',
                                                                                'empty' => '-- SELECCIONE --' ]);
                                                                        ?>
                                                                </div>                                                        
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                                                        <?php echo $this->Form->control('defoliation',
                                                                                ['type' => 'select',
                                                                                'options' => $lista_defolacion,
                                                                                'label' => __('Defoliación de la Planta (%)' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Caída de hojas del material vegetal "></i>'),
                                                                                'escape' => false,
                                                                                'class' => 'form-control',
                                                                                'empty' => '-- SELECCIONE --' ]);
                                                                        ?>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                                                        <?php echo $this->Form->control('rooting',
                                                                                ['type' => 'select',
                                                                                'options' => $lista_enraizamiento,
                                                                                'label' => __('Enraizamiento de la Planta' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Capacidad del material vegetal de formar raiz en el medio de cultivo in vitro"></i>'),
                                                                                'escape' => false,
                                                                                'class' => 'form-control',
                                                                                'empty' => '-- SELECCIONE --' ]);
                                                                        ?>
                                                                </div>                                                        
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                                                          <?php echo $this->Form->control('chlorosis',
                                                                                ['type' => 'select',
                                                                                'options' => $lista_clorosis,
                                                                                'label' => __('Clorosis' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Amarillamiento del tejido foliar "></i>'),
                                                                                'escape' => false,
                                                                                'class' => 'form-control',
                                                                                'empty' => '-- SELECCIONE --' ]);
                                                                        ?>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                                                        <?php echo $this->Form->control('phenolization',
                                                                                ['type' => 'select',
                                                                                'options' => $lista_fenolizacion,
                                                                                'label' => __('Fenolización' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Oxidación u oscurecimiento del medio de cultivo in vitro"></i>'),
                                                                                'escape' => false,
                                                                                'class' => 'form-control',
                                                                                'empty' => '-- SELECCIONE --' ]);
                                                                        ?>
                                                                </div>                                                        
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12 col-xs-12">
                                                        <div class="row">  
                                                                <div class="col-lg-12"><h4>:: Medio de Cultivo<hr></h4></div>
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                                                        <?php echo $this->Form->control('storage',
                                                                                        ['type' => 'select',
                                                                                        'options' => $lista_almacenamiento,
                                                                                        'label' => __('Tipo de Medio de Almacenamiento <b style="color:#dd4b39;">(*)</b>' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Tipo de medio donde se almacena el material"></i>'),
                                                                                        'escape' => false,
                                                                                        'class' => 'form-control',
                                                                                        'empty' => '-- SELECCIONE --' ]);
                                                                         ?>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                                                        <?php echo $this->Form->control('protime', [
                                                                                'label' => ['text' => 'Tiempo Máximo en el Medio (meses)'],
                                                                                'escape' => false,
                                                                                'class' => 'form-control',
                                                                                ]); 
                                                                        ?>
                                                                </div>                                                        
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                                                        <?php echo $this->Form->control('propagation',
                                                                                ['type' => 'select',
                                                                                'options' => $lista_propagacion,
                                                                                'label' => __('Medio de Propagación' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Medio propagación del material"></i>'),
                                                                                'escape' => false,
                                                                                'class' => 'form-control',
                                                                                'empty' => '-- SELECCIONE --' ]);
                                                                         ?>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                                                        <?php echo $this->Form->control('conservation',
                                                                                ['type' => 'select',
                                                                                'options' => $lista_conservacion,
                                                                                'label' => __('Medio de Conservación' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Medio de conservación del material"></i>'),
                                                                                'escape' => false,
                                                                                'class' => 'form-control',
                                                                                'empty' => '-- SELECCIONE --' ]);
                                                                        ?>
                                                                </div>                                                                                                                     
                                                        </div>
                                                        <div class="row">  
                                                                <div class="col-lg-12"><h4>:: Estado Fitosanitario<hr></h4></div>
                                                        </div>  
                                                        <div class="row">
                                                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                                                        <?php echo $this->Form->control('fitostate',
                                                                                        ['type' => 'select',
                                                                                        'options' => $lista_estado_fitosanitario,
                                                                                        'label' => __('Estado Fitosanitario de la Planta' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Condición de salud que guarda el material"></i>'),
                                                                                        'escape' => false,
                                                                                        'class' => 'form-control',
                                                                                        'empty' => '-- SELECCIONE --' ]);
                                                                         ?>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                                                        <?php echo $this->Form->control('pathogen', [
                                                                                'label' => ['text' => 'Fitopatógenos' . ' <i class="fa fa-info-circle" data-toggle="tooltip" title="Presencia de plagas o enfermedades que presenta en el material"></i>'],
                                                                                'escape' => false,
                                                                                'class' => 'form-control',
                                                                                 ]);
                                                                        ?>
                                                                </div>                                                                                                                     
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                             </div>
                        </div>
                   </div>
                </div>

                <div class="box-footer">
                    <div class="col-sm-4 text-left">
                       Los Campos con <b style="color:#dd4b39;" class="text-right">(*)</b> son datos obligatorios
                    </div>
                    <div class="col-sm-8 text-right">
                        <a href = "<?php echo $this->Url->build('/' . $this->Functions->getUrlFirst($this->request->url, 0).'/fitogenetico/gestion-inventario/banco-in-vitro', true) ?>"
                        class="btn btn-default"> <i class="fa fa-times"></i> CANCELAR
                        </a>
                        <button type="submit" class="btn btn-success" id="btnBankInvitro"> <i class="fa fa-save"></i> GUARDAR REGISTRO</button>
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
    $("#fecha_adquisicion").datepicker({autoclose: true,todayHighlight: true, language: "es", format: "dd-mm-yyyy"});
', ['block' => true]);

?>

