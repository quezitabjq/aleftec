

<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">CADASTRO DA SALA</h3>
            </div>
                <?= $this->Form->create($sala) ?>
             <form role="form">
              <div class="box-body">
                    <div class="form-group">
                            <label for="cpf">NOME:</label>
                                <?php
                                    echo $this->Form->input('nomesala',array('label'=>'','class'=>'form-control','id'=>'nomesala'));
                                ?>
                  
                    </div>
                    <div class="form-group">
                            <label for="cpf">FAIXA INICIAL:</label>
                                <?php
                                    echo $this->Form->input('faixainicial',array('label'=>'','class'=>'form-control','id'=>'faixainicial'));
                                ?>
                  
                    </div>
                     <div class="form-group">
                            <label for="cpf">FAIXA FINAL:</label>
                                <?php
                                    echo $this->Form->input('faixafinal',array('label'=>'','class'=>'form-control','id'=>'faixafinal'));
                                ?>
                  
                    </div>
                    </div>
                    <div class="box-footer">
                 <?= $this->Html->link(__('Voltar'), ['action' => 'index'], ['class'=>'btn btn-default ']) ?>
                 
    <?= $this->Form->end() ?>
            
              </div>
                </form>
            </div>
