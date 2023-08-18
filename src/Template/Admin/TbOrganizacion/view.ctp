<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tb Organizacion'), ['action' => 'edit', $tbOrganizacion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tb Organizacion'), ['action' => 'delete', $tbOrganizacion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tbOrganizacion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tb Organizacion'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tb Organizacion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tb Centro Poblado'), ['controller' => 'TbCentroPoblado', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tb Centro Poblado'), ['controller' => 'TbCentroPoblado', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tbOrganizacion view large-9 medium-8 columns content">
    <h3><?= h($tbOrganizacion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre Organizacion') ?></th>
            <td><?= h($tbOrganizacion->nombre_organizacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tbOrganizacion->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($tbOrganizacion->status) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Tb Centro Poblado') ?></h4>
        <?php if (!empty($tbOrganizacion->tb_centro_poblado)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Centro Poblado') ?></th>
                <th scope="col"><?= __('Tb Organizacion Id') ?></th>
                <th scope="col"><?= __('Tb Comunidad Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tbOrganizacion->tb_centro_poblado as $tbCentroPoblado): ?>
            <tr>
                <td><?= h($tbCentroPoblado->id) ?></td>
                <td><?= h($tbCentroPoblado->centro_poblado) ?></td>
                <td><?= h($tbCentroPoblado->tb_organizacion_id) ?></td>
                <td><?= h($tbCentroPoblado->tb_comunidad_id) ?></td>
                <td><?= h($tbCentroPoblado->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TbCentroPoblado', 'action' => 'view', $tbCentroPoblado->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TbCentroPoblado', 'action' => 'edit', $tbCentroPoblado->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TbCentroPoblado', 'action' => 'delete', $tbCentroPoblado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tbCentroPoblado->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
