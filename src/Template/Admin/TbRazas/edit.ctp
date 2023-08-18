<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tbRaza->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tbRaza->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tb Razas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tb Diversidad Crianzas'), ['controller' => 'TbDiversidadCrianzas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tb Diversidad Crianza'), ['controller' => 'TbDiversidadCrianzas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tbRazas form large-9 medium-8 columns content">
    <?= $this->Form->create($tbRaza) ?>
    <fieldset>
        <legend><?= __('Edit Tb Raza') ?></legend>
        <?php
            echo $this->Form->control('raza');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
