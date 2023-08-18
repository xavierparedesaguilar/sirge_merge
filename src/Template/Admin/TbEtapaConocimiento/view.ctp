<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tb Etapa Conocimiento'), ['action' => 'edit', $tbEtapaConocimiento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tb Etapa Conocimiento'), ['action' => 'delete', $tbEtapaConocimiento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tbEtapaConocimiento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tb Etapa Conocimiento'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tb Etapa Conocimiento'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tbEtapaConocimiento view large-9 medium-8 columns content">
    <h3><?= h($tbEtapaConocimiento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tbEtapaConocimiento->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tb Conocimiento Tradicional Id') ?></th>
            <td><?= $this->Number->format($tbEtapaConocimiento->tb_conocimiento_tradicional_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tb Etapa Id') ?></th>
            <td><?= $this->Number->format($tbEtapaConocimiento->tb_etapa_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($tbEtapaConocimiento->status) ?></td>
        </tr>
    </table>
</div>
