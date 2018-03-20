<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<div class="roles view content">
   <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Grupo de <?= h($role->name) ?> </h3>
            </div>
     
            <form class="form-horizontal">
              <div class="box-body">
               

    <table class="vertical-table">
       
         <tr>
            <th scope="row"><?= __('Ativo?') ?></th>
            <td><?= $role->active ? __('Sim') : __('Não'); ?></td>
        </tr>
    </table>
</div>

</div>

    <div class="related">
      <div class="box box-primary">
            <div class="box-header with-border">

              <h3 class="box-title">Permissões do <?= h($role->name) ?> </h3>
              <div class="box-tools">
             
            
              </div>
            </div>
<div class="box-body">
  <?php if (!empty($role->permissions)): ?>
<div class="table-responsive">
    <table class="table  table-bordered table-hover">
        <thead>
            <tr>
               
                <th scope="col"><?= __('Controller') ?></th>
                <th scope="col"><?= __('Action') ?></th>
               <th scope="col"><?= __('Ativo') ?></th>
                <th scope="col"><?= __('Nome da Permissão') ?></th>
              
              
            </tr>
            <?php foreach ($role->permissions as $permissions): ?>
            <tr>
             
                <td><?= h($permissions->controller) ?></td>
                <td><?= h($permissions->action) ?></td>
               
                <td><?= $permissions->active ? __('Sim') : __('Não'); ?></td>
                <td><?= h($permissions->name) ?></td>
               
               
            </tr>
            <?php endforeach; ?>
        </thead>
    </table>
        
        <?php endif; ?>
    </div>
</div>
</div>
</div>


    <div class="related">
    <div class="box box-primary">
            <div class="box-header with-border">

              <h3 class="box-title">Usuários do <?= h($role->name) ?> </h3>
              <div class="box-tools">
             
            
              </div>
            </div>
<div class="box-body">
        <?php if (!empty($role->users)): ?>
<div class="table-responsive">
    <table class="table  table-bordered table-hover">
        <thead>
            <tr>
               
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Telefone') ?></th>
                <th scope="col"><?= __('Email') ?></th>
            
                <th scope="col"><?= __('Ativo') ?></th>
                
              <!--   <th scope="col" class="actions"><?= __('Ações') ?></th> -->
            </tr>
            <?php foreach ($role->users as $users): ?>
            <tr>
             
                <td><?= h($users->fullName) ?></td>
                <td><?= h($users->phone) ?></td>
                <td><?= h($users->email) ?></td>
            
                <td><?= $users->active ? __('Sim') : __('Não'); ?></td>
              
                <!-- <td class="actions">
                    <?= $this->Html->link(__('Visualizar'), ['controller' => 'Users', 'action' => 'view', $users->id],['class'=>'btn bg-purple btn-xs']) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'Users', 'action' => 'edit', $users->id],['class'=>'btn btn-primary btn-xs']) ?>
                    <?= $this->Form->postLink(__('Deletar'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id),'class'=>'btn btn-danger btn-xs']) ?>
                </td> -->
            </tr>
            <?php endforeach; ?>
        </thead>
        </table>
        <?php endif; ?>
    </div>
</div>
</div>
</div>
</div>
</form>
</div>
</div>