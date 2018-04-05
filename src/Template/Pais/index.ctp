<div class="row">

<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pais</h3>
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
              <th><?= $this->Paginator->sort('nome','NOME') ?></th>
                <th><?= $this->Paginator->sort('cpf','CPF') ?></th>
                <th><?= $this->Paginator->sort('telefone','TELEFONE') ?></th>
                <th class="actions"><?= __('AÇÕES') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pais as $pai): ?>
            <tr>
               
              <td><?= h($pai->nome) ?></td>
                <td><?= h($pai->cpf) ?></td>
                <td><?= h($pai->telefone) ?></td>
                
                <td class="actions" style="white-space:nowrap">
                   
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $pai->id], ['class'=>'btn btn-primary btn-xs']) ?>

  
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $pai->id], ['confirm' => __('Tem certeza de quer deletar # {0}?', $pai->id), 'class'=>'btn btn-danger btn-xs']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  </div>
    </div>
    <div class="box-footer clearfix">
              <?= $this->Html->link(__('+ Pai'), ['action' => 'add'], ['class'=>'btn btn-primary btn-xs']) ?>
            </div>
</div>
 <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, 
mostrando {{current}} 
registros fora de
         {{count}} total, 
começando no registro {{start}}, 
que termina em {{end}}')) ?></p>
</div>