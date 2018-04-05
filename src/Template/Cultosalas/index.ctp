<div class="row">

<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Cultos Ativos</h3>
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
              <th>Culto</th>
              <th>Salas</th>
              <th>Data</th>
              
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cultosalas as $cultosala): ?>
            <tr>
               
              <td><?= $cultosala->has('culto') ? $this->Html->link($cultosala->culto->nome, ['controller' => 'Cultos', 'action' => 'view', $cultosala->culto->id]) : '' ?></td>
                  <td><?= $cultosala->has('sala') ? $this->Html->link($cultosala->sala->nomesala." - DE ".$cultosala->sala->faixainicial." a ".$cultosala->sala->faixafinal, ['controller' => 'Salas', 'action' => 'view', $cultosala->sala->id]) : '' ?></td>
                  <td><?= h($cultosala->dataCulto) ?></td>
                <td class="actions" style="white-space:nowrap">
                   
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $cultosala->id], ['class'=>'btn btn-primary btn-xs']) ?>
 <?= $this->Html->link(__('Lista de Presença'), ['controller'=>'cultosalaalunos','action' => 'add', $cultosala->id], ['class'=>'btn bg-purple btn-xs']) ?>
                          
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $cultosala->id], ['confirm' => __('Tem certeza de quer deletar # {0}?', $cultosala->id), 'class'=>'btn btn-danger btn-xs']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  </div>
    </div>
    <div class="box-footer clearfix">
              <?= $this->Html->link(__('Ativar Culto'), ['action' => 'add'], ['class'=>'btn btn-primary btn-xs']) ?>
            </div>
</div>
 <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, 
mostrando {{current}} 
registros fora de
         {{count}} total, 
começando no registro {{start}}, 
que termina em {{end}}')) ?></p>
</div>