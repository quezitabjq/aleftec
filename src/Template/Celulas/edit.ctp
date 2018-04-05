<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Celula $celula
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $celula->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $celula->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Celulas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="celulas form large-9 medium-8 columns content">
    <?= $this->Form->create($celula) ?>
    <fieldset>
        <legend><?= __('Edit Celula') ?></legend>
        <?php
            echo $this->Form->control('descricao');
            echo $this->Form->control('tipocelula');
            echo $this->Form->control('hinicio');
            echo $this->Form->control('hfinal');
            echo $this->Form->control('diaSemana');
            echo $this->Form->control('cep');
            echo $this->Form->control('lougadoro');
            echo $this->Form->control('numero');
            echo $this->Form->control('complemento');
            echo $this->Form->control('bairro');
            echo $this->Form->control('cidade');
            echo $this->Form->control('estado');
            echo $this->Form->control('ativo');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
