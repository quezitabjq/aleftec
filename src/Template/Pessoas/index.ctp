<div class="row">

<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pessoas</h3>
              <div class="box-tools">
             
            <ul class="pagination  pagination-sm no-margin pull-right">
                <?= $this->Paginator->prev('&laquo; ' . __('previous'), ['escape'=>false]) ?>
                <?= $this->Paginator->numbers(['escape'=>false]) ?>
                <?= $this->Paginator->next(__('next') . ' &raquo;', ['escape'=>false]) ?>
            </ul>
 
              </div>
            </div>
<div class="box-body">
<?php
      echo $this->Form->create(null, ['type' => 'get']);?>
<div class="input-group input-group-sm">
<?php
           
      echo $this->Form->input('search', 
    ['class' => 'form-control', 'label' => false, 
    'placeholder' => 'Digite aqui sua pesquisa', 'type'=>'text',
    'value' => $this->request->query('search')]);
      ?>
      <span class="input-group-btn">
      <?php
      echo $this->Form->button('Pesquisar',['class'=>'btn btn-info']);
      echo $this->Form->end();
  ?>
   </span>
</div>


  <hr />
<div class="table-responsive">
    <table class="table  table-bordered table-hover">
        <thead>
            <tr>
              <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('sobrenome') ?></th>
                <th><?= $this->Paginator->sort('sexo') ?></th>
                 <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('cpf') ?></th>
                <th><?= $this->Paginator->sort('telefone') ?></th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pessoas as $pessoa): ?>
            <tr>
               
              <td><?= h($pessoa->nome) ?></td>
                <td><?= h($pessoa->sobrenome) ?></td>
                <td><?= h($pessoa->sexo) ?></td>
                <td><?= h($pessoa->email) ?></td>
                <td><?= h($pessoa->cpf) ?></td>
                <td><?= h($pessoa->telefone) ?></td>
                <td class="actions" style="white-space:nowrap">
                     <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $pessoa->id], ['class'=>'btn btn-default btn-xs']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $pessoa->id], ['class'=>'btn btn-primary btn-xs']) ?>

  <?= $this->Html->link(__('Inscrever'), ['controller'=>'pessoaeventos','action' => 'add', $pessoa->id], ['class'=>'btn bg-purple btn-xs']) ?>
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $pessoa->id], ['confirm' => __('Tem certeza de quer deletar # {0}?', $pessoa->id), 'class'=>'btn btn-danger btn-xs']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  </div>
    </div>
    <div class="box-footer clearfix">
              <?= $this->Html->link(__('+ Pessoa'), ['action' => 'add'], ['class'=>'btn btn-primary btn-xs']) ?>
            </div>
</div>
 <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, 
mostrando {{current}} 
registros fora de
         {{count}} total, 
começando no registro {{start}}, 
que termina em {{end}}')) ?></p>
</div>