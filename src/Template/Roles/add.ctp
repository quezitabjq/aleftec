<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<section class="content">

<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Cadastro de Grupos</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
                <?= $this->Form->create($role) ?>
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  
                  <label for="name">Nome</label>
                    <?php
            echo $this->Form->control('name',['class'=>'form-control','placeholder'=>'Nome','id'=>'name','label'=>'']);
            ?>
                          </div>
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                              <?php
            echo $this->Form->control('active',['id'=>'active','label'=>'Ativo','type'=>'checkbox']);
            ?>
                      
                    </label>
                  </div>

                     </div>  
                     <div class="form-group">
                  
                  <label for="name">Permissões</label>
                
                              <?php  echo $this->Form->control('permissions._ids', ['options' => $permissions,'class'=>'form-control','label'=>'']);
        ?>
</div>
                    
                    </div>      
                               
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <?= $this->Html->link(__('Voltar'), ['action' => 'index'], ['class'=>'btn btn-default ']) ?>
                  <?= $this->Form->button(__('Salvar'),array('class'=>'btn btn-primary pull-right')) ?>
              </div>
              <!-- /.box-footer -->
            </form>
                <?= $this->Form->end() ?>

          </div>
      </section>