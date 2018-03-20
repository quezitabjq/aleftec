<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role[]|\Cake\Collection\CollectionInterface $roles
 */
?>
<section class="content">
<div class="row ">

<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Permissões</h3>
              <div class="box-tools">
             
            <ul class="pagination  pagination-sm no-margin pull-right">
                <?= $this->Paginator->prev('&laquo; ' . __('previous'), ['escape'=>false]) ?>
                <?= $this->Paginator->numbers(['escape'=>false]) ?>
                <?= $this->Paginator->next(__('next') . ' &raquo;', ['escape'=>false]) ?>
            </ul>
 
              </div>
            </div>
<div class="box-body">
<div class="table-responsive">
    <table class="table  table-bordered table-hover">
        <thead>
           <tr>
                <th scope="col"><?= $this->Paginator->sort('controller','Controller') ?></th>
                <th scope="col"><?= $this->Paginator->sort('action','Ação') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('name','Descrição') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($permissions as $permission): ?>
            <tr>
                <td><?= h($permission->controller) ?></td>
                <td><?= h($permission->action) ?></td>
                 <td><?= $permission->name; ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $permission->id], ['class'=>'btn bg-purple btn-xs']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $permission->id], ['class'=>'btn btn-primary btn-xs']) ?>
                     <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $permission->id], ['confirm' => __('Tem certeza de quer deletar # {0}?', $permission->id), 'class'=>'btn btn-danger btn-xs']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
       <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, 
mostrando {{current}} 
registros fora de
         {{count}} total, 
começando no registro {{start}}, 
que termina em {{end}}')) ?></p>
</div>
</div>
</section>