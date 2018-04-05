<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tipopai'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pais'), ['controller' => 'Pais', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pai'), ['controller' => 'Pais', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tipopais index large-9 medium-8 columns content">
    <h3><?= __('Tipopais') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('descricao') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tipopais as $tipopai): ?>
            <tr>
                <td><?= $this->Number->format($tipopai->id) ?></td>
                <td><?= h($tipopai->descricao) ?></td>
                <td><?= h($tipopai->created) ?></td>
                <td><?= h($tipopai->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tipopai->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tipopai->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tipopai->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipopai->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
