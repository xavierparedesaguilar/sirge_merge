
<?php $this->assign('title', $mod_title); ?>

<section class="content-header">
Módulo <?php echo $mod_modulo  ?> <h1><?php echo $mod_title ?></h1>
<?php echo($Zabd->nombre)?>

    <?php
    $this->Html->addCrumb("$mod_modulo", ['controller' => 'Zabd', 'action' => 'index']);
    $this->Html->addCrumb($Zabd->cod_zabd, ['controller' => 'TbComunidad', 'action' => 'index', 'idx' => $Zabd->id]);
    $this->Html->addCrumb("$mod_title", ['controller' => 'TbComunidad', 'action' => 'index', 'idx' => $Zabd->id]);
    $this->Html->addCrumb('Crear');
  
    echo $this->Html->getCrumbList(
        [
            'firstClass' => false,
            'lastClass' => 'active',
            'class'     => 'breadcrumb',
            'escape'    => false
        ],
        '<i class="fa fa-home"></i> Inicio'
    );
    ?>

<!-- < ?php var_dump("olisssss"); exit;   ?> -->

</section>

<!-- Page Body -->
<div class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="box box-success">
                <div class="box-header with-border">
                <?php echo $this->Html->link(
                        '<i class="fa fa-arrow-left" ></i>',
                        ['controller' => 'TbComunidad', 'action' => 'index', 'idx' => $Zabd->id],
                        ['class' => 'btn  btn-default', 'data-toggle' => "tooltip", 'title' => "Regresar", 'escape' => false]
                    )
                    ?>
                <h3 class="box-title">  <strong> | Nuevo registro | </strong> <?php echo ($mod_title) ?></h3>
                </div>
                <?php echo $this->Form->create($TbComunidad, [
                    'url' => ['controller' => 'TbComunidad', 'action' => 'add', 'idx' => $Zabd->id],
                    'autocomplete' => "off",
                    'id' => "form_Zabd_accesi"
                ]); ?>
                <div class="box-body">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="nav-tabs-custom">

                        <div class="tab-content">
                                <!-- DATOS GENERALES -->
                                <div class="tab-pane active" id="tab_1">
                                    <div class="row">
                                        <!-- Datos de comunidad campesina -->
                                        <div class="col-xs-12 col-md-12 col-lg-6">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Datos de comunidad campesina</h3>
                                                </div>
                                                <div class="box-body">
                                                    <?php echo $this->Form->control('nombre_comunidad', [
                                                        'label' => 'Nombre de la comunidad campesina <b style="color:#dd4b39;">(*)</b>', 'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('nombre_segun_sunarp', [
                                                        'label' => 'Nombre según sunarp <b style="color:#dd4b39;">(*)</b>', 'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('antecendente', [
                                                        'label' => 'Antecedentes ', 'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('nom_predio', [
                                                        'label'    => 'Nombre del predio de la comunidad campesina ', 'escape' => false,
                                                        'class'    => 'form-control',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('folio_exp', [
                                                        'label'    => 'N° de folio del expediente - ZABD', 'escape' => false,
                                                        'class'    => 'form-control',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('pagina_exp', [
                                                        'label'    => 'N° de páginas del expediente – ZABD', 'escape' => false,
                                                        'class'    => 'form-control',
                                                    ]); ?>
                                            
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Inforación SUNARP -->
                                        <div class="col-xs-12 col-md-12 col-lg-6">
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Inforación SUNARP</h3>
                                                </div>
                                                <div class="box-body"> 
                                                    <?php echo $this->Form->control('partida_electronica', [
                                                        'label'   => 'N° de partida electrónica', 'escape' => false,
                                                        'class'   => 'form-control',
                                                        'type'    => 'number',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('ficha_registral', [
                                                        'label'   => 'N° de ficha registral', 'escape' => false,
                                                        'class'   => 'form-control',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('superficie_pe', [
                                                        'label'   => 'Superficie (ha) según partida electrónica de SUNARP', 'escape' => false,
                                                        'class'   => 'form-control',
                                                        'type'    => 'number',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('superficie_cat', [
                                                        'label'   => 'Superficie (ha) según catastro (cartografía) de SUNARP', 'escape' => false,
                                                        'class'   => 'form-control',
                                                        'type'    => 'number',
                                                    ]); ?>

                                                </div>
                                            </div>
                                        </div> 
                                        <!-- Información geográfica -->
                                        <div class="col-xs-12 col-md-12 col-lg-6"> 
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Información geográfica</h3>
                                                </div>
                                                <div class="box-body">
                                                    <?php echo $this->Form->control('superficie_comunidad_zabd', [
                                                        'label' => 'Superficie de la comunidad campesina (ha) ', 'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('porcentaje_superficie_zabd', [
                                                        'label' => 'Porcentaje (%) de superficie en la ZABD ', 'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('altitud_min', [
                                                        'label' => 'Altitud minimo', 'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('altitud_max', [
                                                        'label' => 'Altitud maiximo', 'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>
                                                    <?php echo $this->Form->control('altitud_inter', [
                                                        'label' => 'Altitud Intermedia ', 'escape' => false,
                                                        'class' => 'form-control',
                                                    ]); ?>
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
                    <div class="col-sm-12 text-center">
                        <?php echo $this->Form->button('GRABAR', ['class' => 'btn btn-success', 'id' => 'btnInsituAccesion']) ?>
                        <?php echo $this->Html->link('CANCELAR', ['controller' => 'TbComunidad', 'action' => 'index', 'idx' => $Zabd->id], ['class' => 'btn btn-default',]) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<?php

$this->Html->css(['/assets/js/select2/select2.min.css'], ['block' => 'css']);
$this->Html->script(['/assets/js/select2/select2.js'], ['block' => 'script']);
$this->Html->scriptBlock('$("#centro-poblado_id").select2();', ['block' => 'script', 'tag' => 'true', 'multiple' => 'multiple' , 'class'=>'select2-selection__choice']);

?>