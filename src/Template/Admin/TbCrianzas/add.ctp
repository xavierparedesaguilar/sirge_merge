<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tb Crianzas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tb Diversidad Crianzas'), ['controller' => 'TbDiversidadCrianzas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tb Diversidad Crianza'), ['controller' => 'TbDiversidadCrianzas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tbCrianzas form large-9 medium-8 columns content">
    <?= $this->Form->create($tbCrianza) ?>
    <fieldset>
        <legend><?= __('Add Tb Crianza') ?></legend>
        <?php
            echo $this->Form->control('crianza');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
