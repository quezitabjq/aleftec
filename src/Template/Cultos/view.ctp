<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Culto'), ['action' => 'edit', $culto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Culto'), ['action' => 'delete', $culto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $culto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cultos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Culto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cultosalas'), ['controller' => 'Cultosalas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cultosala'), ['controller' => 'Cultosalas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cultos view large-9 medium-8 columns content">
    <h3><?= h($culto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($culto->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Diadasemana') ?></th>
            <td><?= h($culto->diadasemana) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($culto->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Horario') ?></th>
            <td><?= h($culto->horario) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($culto->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($culto->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cultosalas') ?></h4>
        <?php if (!empty($culto->cultosalas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Culto Id') ?></th>
                <th><?= __('DataCulto') ?></th>
                <th><?= __('Sala Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($culto->cultosalas as $cultosalas): ?>
            <tr>
                <td><?= h($cultosalas->id) ?></td>
                <td><?= h($cultosalas->culto_id) ?></td>
                <td><?= h($cultosalas->dataCulto) ?></td>
                <td><?= h($cultosalas->sala_id) ?></td>
                <td><?= h($cultosalas->created) ?></td>
                <td><?= h($cultosalas->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cultosalas', 'action' => 'view', $cultosalas->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cultosalas', 'action' => 'edit', $cultosalas->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cultosalas', 'action' => 'delete', $cultosalas->], ['confirm' => __('Are you sure you want to delete # {0}?', $cultosalas->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
