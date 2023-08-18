<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tb Etapa Conocimiento'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tbEtapaConocimiento index large-9 medium-8 columns content">
    <h3><?= __('Tb Etapa Conocimiento') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tb_conocimiento_tradicional_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tb_etapa_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tbEtapaConocimiento as $tbEtapaConocimiento): ?>
            <tr>
                <td><?= $this->Number->format($tbEtapaConocimiento->id) ?></td>
                <td><?= $this->Number->format($tbEtapaConocimiento->tb_conocimiento_tradicional_id) ?></td>
                <td><?= $this->Number->format($tbEtapaConocimiento->tb_etapa_id) ?></td>
                <td><?= $this->Number->format($tbEtapaConocimiento->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tbEtapaConocimiento->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tbEtapaConocimiento->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tbEtapaConocimiento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tbEtapaConocimiento->id)]) ?>
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
