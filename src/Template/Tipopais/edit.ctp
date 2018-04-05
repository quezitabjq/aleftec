<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tipopai->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tipopai->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tipopais'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pais'), ['controller' => 'Pais', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pai'), ['controller' => 'Pais', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tipopais form large-9 medium-8 columns content">
    <?= $this->Form->create($tipopai) ?>
    <fieldset>
        <legend><?= __('Edit Tipopai') ?></legend>
        <?php
            echo $this->Form->input('descricao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
