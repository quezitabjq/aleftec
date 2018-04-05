<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cultosalaaluno'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cultosalas'), ['controller' => 'Cultosalas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cultosala'), ['controller' => 'Cultosalas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Alunos'), ['controller' => 'Alunos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Aluno'), ['controller' => 'Alunos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cultosalaalunos index large-9 medium-8 columns content">
    <h3><?= __('Cultosalaalunos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('cultosala_id') ?></th>
                <th><?= $this->Paginator->sort('aluno_id') ?></th>
                <th><?= $this->Paginator->sort('responsavel') ?></th>
                <th><?= $this->Paginator->sort('crated') ?></th>
                <th><?= $this->Paginator->sort('codaluno') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cultosalaalunos as $cultosalaaluno): ?>
            <tr>
                <td><?= $this->Number->format($cultosalaaluno->id) ?></td>
                <td><?= $cultosalaaluno->has('cultosala') ? $this->Html->link($cultosalaaluno->cultosala->id, ['controller' => 'Cultosalas', 'action' => 'view', $cultosalaaluno->cultosala->id]) : '' ?></td>
                <td><?= $cultosalaaluno->has('aluno') ? $this->Html->link($cultosalaaluno->aluno->id, ['controller' => 'Alunos', 'action' => 'view', $cultosalaaluno->aluno->id]) : '' ?></td>
                <td><?= h($cultosalaaluno->responsavel) ?></td>
                <td><?= h($cultosalaaluno->crated) ?></td>
                <td><?= h($cultosalaaluno->codaluno) ?></td>
                <td><?= h($cultosalaaluno->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cultosalaaluno->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cultosalaaluno->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cultosalaaluno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cultosalaaluno->id)]) ?>
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
