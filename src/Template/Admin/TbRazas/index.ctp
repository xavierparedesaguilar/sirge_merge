<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\TbRaza[]|\Cake\Collection\CollectionInterface $tbRazas
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tb Raza'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tb Diversidad Crianzas'), ['controller' => 'TbDiversidadCrianzas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tb Diversidad Crianza'), ['controller' => 'TbDiversidadCrianzas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tbRazas index large-9 medium-8 columns content">
    <h3><?= __('Tb Razas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('raza') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tbRazas as $tbRaza): ?>
            <tr>
                <td><?= $this->Number->format($tbRaza->id) ?></td>
                <td><?= h($tbRaza->raza) ?></td>
                <td><?= $this->Number->format($tbRaza->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tbRaza->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tbRaza->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tbRaza->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tbRaza->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
