<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Livro'), ['action' => 'edit', $livro->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Livro'), ['action' => 'delete', $livro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $livro->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Livros'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Livro'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Autors'), ['controller' => 'Autors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Autor'), ['controller' => 'Autors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Generos'), ['controller' => 'Generos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Genero'), ['controller' => 'Generos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="livros view large-9 medium-8 columns content">
    <h3><?= h($livro->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Codigolivro') ?></th>
            <td><?= h($livro->codigolivro) ?></td>
        </tr>
        <tr>
            <th><?= __('Responsavel') ?></th>
            <td><?= h($livro->responsavel) ?></td>
        </tr>
        <tr>
            <th><?= __('Autor') ?></th>
            <td><?= $livro->has('autor') ? $this->Html->link($livro->autor->id, ['controller' => 'Autors', 'action' => 'view', $livro->autor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Genero') ?></th>
            <td><?= $livro->has('genero') ? $this->Html->link($livro->genero->id, ['controller' => 'Generos', 'action' => 'view', $livro->genero->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Titulo') ?></th>
            <td><?= h($livro->titulo) ?></td>
        </tr>
        <tr>
            <th><?= __('Resumo') ?></th>
            <td><?= h($livro->resumo) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $livro->has('user') ? $this->Html->link($livro->user->name, ['controller' => 'Users', 'action' => 'view', $livro->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($livro->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($livro->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($livro->modified) ?></td>
        </tr>
    </table>
</div>
