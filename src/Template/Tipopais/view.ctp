<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tipopai'), ['action' => 'edit', $tipopai->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tipopai'), ['action' => 'delete', $tipopai->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipopai->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tipopais'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipopai'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pais'), ['controller' => 'Pais', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pai'), ['controller' => 'Pais', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tipopais view large-9 medium-8 columns content">
    <h3><?= h($tipopai->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Descricao') ?></th>
            <td><?= h($tipopai->descricao) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($tipopai->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($tipopai->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($tipopai->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Pais') ?></h4>
        <?php if (!empty($tipopai->pais)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nome') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Telefone') ?></th>
                <th><?= __('Tipopai Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tipopai->pais as $pais): ?>
            <tr>
                <td><?= h($pais->id) ?></td>
                <td><?= h($pais->nome) ?></td>
                <td><?= h($pais->email) ?></td>
                <td><?= h($pais->telefone) ?></td>
                <td><?= h($pais->tipopai_id) ?></td>
                <td><?= h($pais->created) ?></td>
                <td><?= h($pais->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Pais', 'action' => 'view', $pais->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pais', 'action' => 'edit', $pais->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pais', 'action' => 'delete', $pais->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pais->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
