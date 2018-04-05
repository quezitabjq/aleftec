<div class="row">

<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Eventos</h3>
              <div class="box-tools">
             
            <ul class="pagination  pagination-sm no-margin pull-right">
                <?= $this->Paginator->prev('&laquo; ' . __('previous'), ['escape'=>false]) ?>
                <?= $this->Paginator->numbers(['escape'=>false]) ?>
                <?= $this->Paginator->next(__('next') . ' &raquo;', ['escape'=>false]) ?>
            </ul>
 
              </div>
            </div>
<div class="box-body no-padding">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
             
                <th><?= $this->Paginator->sort('nome') ?></th>
           
                <th><?= $this->Paginator->sort('valor') ?></th>
                                <th><?= $this->Paginator->sort('maxinscritos','Máx. Inscritos') ?></th>
                <th><?= $this->Paginator->sort('datainicio','Data de Início') ?></th>
                <th><?= $this->Paginator->sort('datafinal','Data Final') ?></th>
                <th><?= $this->Paginator->sort('local') ?></th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventos as $evento): ?>
            <tr>
               
                <td><?= h($evento->nome) ?></td>
               
                <td><?= $this->Number->format($evento->valor) ?></td>
                 <td><?= $this->Number->format($evento->maxinscritos) ?></td>
                <td><?= h($evento->datainicio) ?></td>
                <td><?= h($evento->datafinal) ?></td>
                <td><?= h($evento->local) ?></td>
                <td class="actions" style="white-space:nowrap">
                     <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $evento->id], ['class'=>'btn btn-default btn-xs']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $evento->id], ['class'=>'btn btn-primary btn-xs']) ?>
                    <?= $this->Html->link(__('Inscritos'), ['controller'=>'pessoaeventos','action' => 'index', $evento->id], ['class'=>'btn bg-purple btn-xs']) ?>

                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $evento->id], ['confirm' => __('Tem certeza de quer deletar # {0}?', $evento->id), 'class'=>'btn btn-danger btn-xs']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  
    </div>
    <div class="box-footer clearfix">
              <?= $this->Html->link(__('Novo Evento'), ['action' => 'add'], ['class'=>'btn btn-primary btn-xs']) ?>
            </div>
</div>
 <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, 
mostrando {{current}} 
registros fora de
         {{count}} total, 
começando no registro {{start}}, 
que termina em {{end}}')) ?></p>
</div>