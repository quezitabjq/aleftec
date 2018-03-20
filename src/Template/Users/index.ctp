<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<section class="content">

          <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Usuários</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
               
              <table class="table table-hover">
              
                <tr>
                  <th>Usuário</th>
                  <th>email</th>
                  <th>Grupo</th>
                  <th>Ações</th>
                </tr>
                <?php foreach ($users as $user): ?>
                <tr>
                  <td><?= h($user->fullName) ?></td>
                  <td><?= h($user->email) ?></td>
                  <td><span class="label label-success"><?=h($user->role->name)?></span></td>
                  <td>  <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id],['class'=>'btn btn-primary btn-xs']) ?>
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id),'class'=>'btn btn-danger btn-xs']) ?></td>
                </tr>
                 <?php endforeach; ?>
              </table>
             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
              <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
        </div>
      </div>
</section>



