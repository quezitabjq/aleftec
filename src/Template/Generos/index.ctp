<div class="row">

<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Gêneros</h3>
              <div class="box-tools">
              <?= $this->Html->link(__('+ Gênero'), ['action' => 'add'], ['class'=>'btn btn-primary ']) ?>
          
 
              </div>
            </div>
<div class="box-body">
<div class="table-responsive">
    <table class="table  table-bordered table-hover">
        <thead>
            <tr>
              <th><?= $this->Paginator->sort('descricao') ?></th>
              
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($generos as $genero): ?>
            <tr>
               
              <td><?= h($genero->descricao) ?></td>
                
                <td class="actions" style="white-space:nowrap">
                   
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $genero->id], ['class'=>'btn btn-primary btn-xs']) ?>

  
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $genero->id], ['confirm' => __('Tem certeza de quer deletar # {0}?', $genero->id), 'class'=>'btn btn-danger btn-xs']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  </div>
    </div>
    <div class="box-footer clearfix">
               <ul class="pagination  pagination-sm no-margin pull-right">
                <?= $this->Paginator->prev('&laquo; ' . __('previous'), ['escape'=>false]) ?>
                <?= $this->Paginator->numbers(['escape'=>false]) ?>
                <?= $this->Paginator->next(__('next') . ' &raquo;', ['escape'=>false]) ?>
            </ul>
            </div>
</div>
 <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, 
mostrando {{current}} 
registros fora de
         {{count}} total, 
começando no registro {{start}}, 
que termina em {{end}}')) ?></p>
</div>