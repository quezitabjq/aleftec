

<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">CADASTRO DO GÊNERO</h3>
            </div>
                <?= $this->Form->create($genero) ?>
             <form role="form">
              <div class="box-body">
                    <div class="form-group">
                            <label for="cpf">Descrição:</label>
                                <?php
                                    echo $this->Form->input('descricao',array('label'=>'','class'=>'form-control','id'=>'descricao'));
                                ?>
                  
                    </div>
                   
                    </div>
                    <div class="box-footer">
                 <?= $this->Html->link(__('Voltar'), ['action' => 'index'], ['class'=>'btn btn-default ']) ?>
                  <?= $this->Form->button(__('Salvar'),array('class'=>'btn btn-primary pull-right')) ?>
    <?= $this->Form->end() ?>
            
              </div>
                </form>
            </div>
