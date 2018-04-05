<div class="row">

<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Livros</h3>
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
<div class="table-responsive">
    <table class="table  table-bordered table-hover">
        <thead>
            <tr>
              <th><?= $this->Paginator->sort('codigolivro','Código do Livro') ?></th>
              <th><?= $this->Paginator->sort('titulo') ?></th>
                <th><?= $this->Paginator->sort('responsavel','Responsável') ?></th>
                <th><?= $this->Paginator->sort('genero_id','Gênero') ?></th>
                     <th><?= $this->Paginator->sort('autor_id','Autor') ?></th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livros as $livro): ?>
            <tr>
               
              <td><?= h($livro->codigolivro) ?></td>
                <td><?= h($livro->titulo) ?></td>
                <td><?= h($livro->responsavel) ?></td>
                <td><?= h($livro->genero->descricao) ?></td>
                 <td><?= h($livro->autor->descricao) ?></td>
                <td class="actions" style="white-space:nowrap">
                   
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $livro->id], ['class'=>'btn btn-primary btn-xs']) ?>

  
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $livro->id], ['confirm' => __('Tem certeza de quer deletar # {0}?', $livro->id), 'class'=>'btn btn-danger btn-xs']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  </div>
    </div>
    <div class="box-footer clearfix">
              <?= $this->Html->link(__('+ Livro'), ['action' => 'add'], ['class'=>'btn btn-primary btn-xs']) ?>
            </div>
</div>
 <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, 
mostrando {{current}} 
registros fora de
         {{count}} total, 
começando no registro {{start}}, 
que termina em {{end}}')) ?></p>
</div>