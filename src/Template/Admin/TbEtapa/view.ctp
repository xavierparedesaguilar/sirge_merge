<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tb Etapa'), ['action' => 'edit', $tbEtapa->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tb Etapa'), ['action' => 'delete', $tbEtapa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tbEtapa->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tb Etapa'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tb Etapa'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tb Etapa Conocimiento'), ['controller' => 'TbEtapaConocimiento', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tb Etapa Conocimiento'), ['controller' => 'TbEtapaConocimiento', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tbEtapa view large-9 medium-8 columns content">
    <h3><?= h($tbEtapa->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Etapa') ?></th>
            <td><?= h($tbEtapa->etapa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tbEtapa->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Codigo') ?></th>
            <td><?= $this->Number->format($tbEtapa->codigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($tbEtapa->status) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Tb Etapa Conocimiento') ?></h4>
        <?php if (!empty($tbEtapa->tb_etapa_conocimiento)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Tb Conocimiento Tradicional Id') ?></th>
                <th scope="col"><?= __('Tb Etapa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tbEtapa->tb_etapa_conocimiento as $tbEtapaConocimiento): ?>
            <tr>
                <td><?= h($tbEtapaConocimiento->tb_conocimiento_tradicional_id) ?></td>
                <td><?= h($tbEtapaConocimiento->tb_etapa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TbEtapaConocimiento', 'action' => 'view', $tbEtapaConocimiento->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TbEtapaConocimiento', 'action' => 'edit', $tbEtapaConocimiento->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TbEtapaConocimiento', 'action' => 'delete', $tbEtapaConocimiento->], ['confirm' => __('Are you sure you want to delete # {0}?', $tbEtapaConocimiento->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
