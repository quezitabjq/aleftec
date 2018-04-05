<div class="row">

<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inscrições</h3>
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
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
            
                <th><?= $this->Paginator->sort('pessoa_id', 'Pessoa') ?></th>
                  <th><?= $this->Paginator->sort('pessoa_id', 'Líder de Geração') ?></th>
                  <th><?= $this->Paginator->sort('valorentrada','Valor Pago') ?></th>
                  <th>Pulseira</th>
                  <th><?= $this->Paginator->sort('created','Data de Criação')?></th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pessoaeventos as $pessoaevento): ?>
            <tr>
             
                <td><?= $pessoaevento->has('pessoa') ? $this->Html->link($pessoaevento->pessoa->nome." ".$pessoaevento->pessoa->sobrenome, ['controller' => 'Pessoas', 'action' => 'view', $pessoaevento->pessoa->id]) : '' ?></td>
                  <td><?= $pessoaevento->has('pessoa') ? $this->Html->link($pessoaevento->pessoa->lidergeracao, ['controller' => 'Pessoas', 'action' => 'view', $pessoaevento->pessoa->id]) : '' ?></td>
                  <td><?= $pessoaevento->valorentrada ?></td>
                   <td><?= $pessoaevento->pulseira ?></td>
                   <td><?= $pessoaevento->created ?></td>
                <td class="actions" style="white-space:nowrap">
                    <?= $this->Html->link(__('Confirmar Presença'), ['action' => 'edit', $pessoaevento->id], ['class'=>'btn btn-success btn-xs']) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
     </div>
    <div class="box-footer clearfix">
              <?= $this->Html->link(__('Nova Inscrição'), ['controller'=>'pessoas', 'action' => 'add'], ['class'=>'btn btn-primary btn-xs']) ?>
            </div>
</div>
 <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, 
mostrando {{current}} 
registros fora de
         {{count}} total, 
começando no registro {{start}}, 
que termina em {{end}}')) ?></p>
</div>