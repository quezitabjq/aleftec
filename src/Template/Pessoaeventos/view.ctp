<nav class="col-lg-2 col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href=""><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('Edit {0}', ['Pessoaevento']), ['action' => 'edit', $pessoaevento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete {0}', ['Pessoaevento']), ['action' => 'delete', $pessoaevento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoaevento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Pessoaeventos']), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Pessoaevento']), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Pessoas']), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Pessoa']), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Eventos']), ['controller' => 'Eventos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Evento']), ['controller' => 'Eventos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Users']), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['User']), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pessoaeventos view col-lg-10 col-md-9">
    <h3><?= h($pessoaevento->id) ?></h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Pessoa</th>
            <td><?= $pessoaevento->has('pessoa') ? $this->Html->link($pessoaevento->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $pessoaevento->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th>Evento</th>
            <td><?= $pessoaevento->has('evento') ? $this->Html->link($pessoaevento->evento->id, ['controller' => 'Eventos', 'action' => 'view', $pessoaevento->evento->id]) : '' ?></td>
        </tr>
        <tr>
            <th>User</th>
            <td><?= $pessoaevento->has('user') ? $this->Html->link($pessoaevento->user->name, ['controller' => 'Users', 'action' => 'view', $pessoaevento->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th>'Id</th>
            <td><?= $this->Number->format($pessoaevento->id) ?></td>
        </tr>
        <tr>
            <th>'Formapgt</th>
            <td><?= $this->Number->format($pessoaevento->formapgt) ?></td>
        </tr>
        <tr>
            <th>Created</th>
            <td><?= h($pessoaevento->created) ?></tr>
        </tr>
        <tr>
            <th>Modified</th>
            <td><?= h($pessoaevento->modified) ?></tr>
        </tr>
    </table>
</div>
