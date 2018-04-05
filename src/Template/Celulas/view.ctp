<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Celula $celula
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Celula'), ['action' => 'edit', $celula->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Celula'), ['action' => 'delete', $celula->id], ['confirm' => __('Are you sure you want to delete # {0}?', $celula->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Celulas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Celula'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="celulas view large-9 medium-8 columns content">
    <h3><?= h($celula->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($celula->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipocelula') ?></th>
            <td><?= h($celula->tipocelula) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DiaSemana') ?></th>
            <td><?= h($celula->diaSemana) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cep') ?></th>
            <td><?= h($celula->cep) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lougadoro') ?></th>
            <td><?= h($celula->lougadoro) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Complemento') ?></th>
            <td><?= h($celula->complemento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bairro') ?></th>
            <td><?= h($celula->bairro) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cidade') ?></th>
            <td><?= h($celula->cidade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= h($celula->estado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ativo') ?></th>
            <td><?= h($celula->ativo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $celula->has('user') ? $this->Html->link($celula->user->fullName, ['controller' => 'Users', 'action' => 'view', $celula->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($celula->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numero') ?></th>
            <td><?= $this->Number->format($celula->numero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hinicio') ?></th>
            <td><?= h($celula->hinicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hfinal') ?></th>
            <td><?= h($celula->hfinal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($celula->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($celula->modified) ?></td>
        </tr>
    </table>
</div>
