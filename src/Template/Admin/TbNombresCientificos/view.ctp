<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\TbNombresCientifico $tbNombresCientifico
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tb Nombres Cientifico'), ['action' => 'edit', $tbNombresCientifico->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tb Nombres Cientifico'), ['action' => 'delete', $tbNombresCientifico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tbNombresCientifico->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tb Nombres Cientificos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tb Nombres Cientifico'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tb Familias'), ['controller' => 'TbFamilias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tb Familia'), ['controller' => 'TbFamilias', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tb Tipo Diversidad'), ['controller' => 'TbTipoDiversidad', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tb Tipo Diversidad'), ['controller' => 'TbTipoDiversidad', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tbNombresCientificos view large-9 medium-8 columns content">
    <h3><?= h($tbNombresCientifico->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre Cientifico') ?></th>
            <td><?= h($tbNombresCientifico->nombre_cientifico) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tb Familia') ?></th>
            <td><?= $tbNombresCientifico->has('tb_familia') ? $this->Html->link($tbNombresCientifico->tb_familia->id, ['controller' => 'TbFamilias', 'action' => 'view', $tbNombresCientifico->tb_familia->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tb Tipo Diversidad') ?></th>
            <td><?= $tbNombresCientifico->has('tb_tipo_diversidad') ? $this->Html->link($tbNombresCientifico->tb_tipo_diversidad->id, ['controller' => 'TbTipoDiversidad', 'action' => 'view', $tbNombresCientifico->tb_tipo_diversidad->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tbNombresCientifico->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($tbNombresCientifico->status) ?></td>
        </tr>
    </table>
</div>
