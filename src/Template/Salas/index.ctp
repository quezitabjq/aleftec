<div class="row">

<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">SALAS</h3>
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
              <th><?= $this->Paginator->sort('nomesala','Nome da Sala') ?></th>
                <th><?= $this->Paginator->sort('faixainicial','Faixa Inicial') ?></th>
                <th><?= $this->Paginator->sort('faixafinal','Faixa Final') ?></th>
                   <th><?= $this->Paginator->sort('tipo','Tipo') ?></th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($salas as $sala): ?>
            <tr>
               
              <td><?= h($sala->nomesala) ?></td>
                <td><?= h($sala->faixainicial) ?></td>
                <td><?= h($sala->faixafinal) ?></td>

                 <td><?= h($sala->tipo) ?></td>
                <td class="actions" style="white-space:nowrap">
                   
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $sala->id], ['class'=>'btn btn-primary btn-xs']) ?>

  
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $sala->id], ['confirm' => __('Tem certeza de quer deletar # {0}?', $sala->id), 'class'=>'btn btn-danger btn-xs']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  </div>
    </div>
    <div class="box-footer clearfix">
              <?= $this->Html->link(__('+ Sala'), ['action' => 'add'], ['class'=>'btn btn-primary btn-xs']) ?>
            </div>
</div>
 <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, 
mostrando {{current}} 
registros fora de
         {{count}} total, 
começando no registro {{start}}, 
que termina em {{end}}')) ?></p>
</div>