<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">CADASTRO DE CRIANÇA</h3>
            </div>
                <?= $this->Form->create($crianca) ?>
             <form role="form">
              <div class="box-body">
                    <div class="form-group">
                            <label for="cpf">NOME:</label>
                                <?php
                                    echo $this->Form->input('nome',array('label'=>'','class'=>'form-control','id'=>'nome'));
                                ?>
                  
                    </div>
                    <div class="form-group">
                            <label for="cpf">DATA DE NASCIMENTO:</label>
                                <?php
                                    echo $this->Form->input('nascimento',array('label'=>'','class'=>'form-control','id'=>'nascimento'));
                                ?>
                  
                    </div>
                  
                    <div class="form-group">
                            <label for="cpf">NOME DO PAI OU MÃE:</label>
                                <?php
                                    echo $this->Form->input('pai_id',array('label'=>'','class'=>'form-control','id'=>'pais'));
                                ?>
                  
                    </div>
                    <div class="form-group">
                            <label for="cpf">TEM ALERGIA?</label>
                                <?php
                                    echo $this->Form->input('alergia',array('label'=>'','class'=>'form-control','id'=>'alergia'));
                                ?>
                  
                    </div>
                    <div class="form-group">
                            <label for="cpf">DESCRIÇÃO DA ALERGIA:</label>
                                <?php
                                    echo $this->Form->input('descalergia',array('label'=>'','class'=>'form-control','id'=>'descalergia'));
                                ?>
                  
                    </div>
     
                </div>
            
           <div class="box-footer">
                 <?= $this->Html->link(__('Voltar'), ['action' => 'index'], ['class'=>'btn btn-default ']) ?>
                  
    <?= $this->Form->end() ?>
            
              </div>
                
</form>
</div>