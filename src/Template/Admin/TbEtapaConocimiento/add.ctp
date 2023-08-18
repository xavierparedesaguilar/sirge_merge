<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tb Etapa Conocimiento'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tbEtapaConocimiento form large-9 medium-8 columns content">
    <?= $this->Form->create($tbEtapaConocimiento) ?>
    <fieldset>
        <legend><?= __('Add Tb Etapa Conocimiento') ?></legend>
        <?php
            echo $this->Form->control('tb_conocimiento_tradicional_id');
            echo $this->Form->control('tb_etapa_id');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
