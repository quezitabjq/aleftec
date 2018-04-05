<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Celula[]|\Cake\Collection\CollectionInterface $celulas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Celula'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="celulas index large-9 medium-8 columns content">
    <h3><?= __('Celulas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descricao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipocelula') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hinicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hfinal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('diaSemana') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cep') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lougadoro') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numero') ?></th>
                <th scope="col"><?= $this->Paginator->sort('complemento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bairro') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cidade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ativo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($celulas as $celula): ?>
            <tr>
                <td><?= $this->Number->format($celula->id) ?></td>
                <td><?= h($celula->descricao) ?></td>
                <td><?= h($celula->tipocelula) ?></td>
                <td><?= h($celula->hinicio) ?></td>
                <td><?= h($celula->hfinal) ?></td>
                <td><?= h($celula->diaSemana) ?></td>
                <td><?= h($celula->cep) ?></td>
                <td><?= h($celula->lougadoro) ?></td>
                <td><?= $this->Number->format($celula->numero) ?></td>
                <td><?= h($celula->complemento) ?></td>
                <td><?= h($celula->bairro) ?></td>
                <td><?= h($celula->cidade) ?></td>
                <td><?= h($celula->estado) ?></td>
                <td><?= h($celula->ativo) ?></td>
                <td><?= h($celula->created) ?></td>
                <td><?= h($celula->modified) ?></td>
                <td><?= $celula->has('user') ? $this->Html->link($celula->user->fullName, ['controller' => 'Users', 'action' => 'view', $celula->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $celula->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $celula->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $celula->id], ['confirm' => __('Are you sure you want to delete # {0}?', $celula->id)]) ?>
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
