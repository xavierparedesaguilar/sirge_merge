
<?php $this->assign('title', $titulo); ?>

<section class="content-header">
    <h1>Módulo <?php echo $titulo ?></h1>

    <ol class="breadcrumb">
        <?php
            $count_ = count($this->Functions->generate_nav());
            $i = 1;
            $temp_url = 'admin/';
        ?>
        <?php  foreach ($this->Functions->generate_nav() as $key => $value): ?>
            <?php if ($i==1): ?>
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo $this->Url->build('/'.$key, true) ?>">Inicio</a>
                </li>
            <?php else: ?>
                <?php $temp_url = $temp_url.$key.'/'; ?>
                <?php if ($i==($count_)): ?>
                    <li class="active"><?php echo $value ?></li>
                <?php else: ?>
                    <li>
                        <a href="<?php echo $this->Url->build('/'.$temp_url, true) ?>"><?php echo $value ?></a>
                    </li>
                <?php endif ?>
            <?php endif ?>
            <?php $i++; ?>
        <?php endforeach ?>
    </ol>
</section>
<!-- /Page Breadcrumb -->

<?php

    $icons = array( '2' => array('img' => $this->Html->image('icons/estacion_experimental.png', ['class' => "img-rounded", 'height' => '75'])),
                    '3' => array('img' => ''),
                    '4' => array('img' => ''),
                    '5' => array('img' => $this->Html->image('icons/listas.png', ['class' => "img-rounded", 'height' => '75'])),
                    '6' => array('img' => $this->Html->image('icons/validacion.png', ['class' => "img-rounded", 'height' => '75'])),
                );
?>

<!-- Page Body -->
<div class="content">
    <div class="row">
        <?php foreach ($show_modules as $modulo): ?>
            <div class="col-lg-4 col-md-6 col-xs-12">
                <a href="<?php echo $this->Url->build('/'.$this->request->url . '/' . $modulo['slug'],true) ?>" class="small-box-footer">
                    <div class="info-box">
                        <span class="info-box-icon bg-green">
                            <?php if($icons[$modulo['id']]['img'] != '')
                                        echo $icons[$modulo['id']]['img'];
                                  else {
                            ?>
                                <i class="<?php echo $modulo['icon'] ?>"></i>
                            <?php } ?>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-number" style="text-align: center;"><strong><?php echo $modulo['title'] ?></strong></span>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
