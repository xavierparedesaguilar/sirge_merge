<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\TbRaza $tbRaza
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tb Raza'), ['action' => 'edit', $tbRaza->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tb Raza'), ['action' => 'delete', $tbRaza->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tbRaza->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tb Razas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tb Raza'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tb Diversidad Crianzas'), ['controller' => 'TbDiversidadCrianzas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tb Diversidad Crianza'), ['controller' => 'TbDiversidadCrianzas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tbRazas view large-9 medium-8 columns content">
    <h3><?= h($tbRaza->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Raza') ?></th>
            <td><?= h($tbRaza->raza) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tbRaza->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($tbRaza->status) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Tb Diversidad Crianzas') ?></h4>
        <?php if (!empty($tbRaza->tb_diversidad_crianzas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Tb Crianza Id') ?></th>
                <th scope="col"><?= __('Tb Nombres Comunes') ?></th>
                <th scope="col"><?= __('Tb Raza Id') ?></th>
                <th scope="col"><?= __('Nombre Local') ?></th>
                <th scope="col"><?= __('Tb Nombres Cientificos') ?></th>
                <th scope="col"><?= __('Tb Familias Id') ?></th>
                <th scope="col"><?= __('Observacion') ?></th>
                <th scope="col"><?= __('Tb Centro Poblado Id') ?></th>
                <th scope="col"><?= __('Tb Zabd Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tbRaza->tb_diversidad_crianzas as $tbDiversidadCrianzas): ?>
            <tr>
                <td><?= h($tbDiversidadCrianzas->id) ?></td>
                <td><?= h($tbDiversidadCrianzas->tb_crianza_id) ?></td>
                <td><?= h($tbDiversidadCrianzas->tb_nombres_comunes) ?></td>
                <td><?= h($tbDiversidadCrianzas->tb_raza_id) ?></td>
                <td><?= h($tbDiversidadCrianzas->nombre_local) ?></td>
                <td><?= h($tbDiversidadCrianzas->tb_nombres_cientificos) ?></td>
                <td><?= h($tbDiversidadCrianzas->tb_familias_id) ?></td>
                <td><?= h($tbDiversidadCrianzas->observacion) ?></td>
                <td><?= h($tbDiversidadCrianzas->tb_centro_poblado_id) ?></td>
                <td><?= h($tbDiversidadCrianzas->tb_zabd_id) ?></td>
                <td><?= h($tbDiversidadCrianzas->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TbDiversidadCrianzas', 'action' => 'view', $tbDiversidadCrianzas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TbDiversidadCrianzas', 'action' => 'edit', $tbDiversidadCrianzas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TbDiversidadCrianzas', 'action' => 'delete', $tbDiversidadCrianzas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tbDiversidadCrianzas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
