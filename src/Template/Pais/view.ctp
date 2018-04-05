

<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">CADASTRO DE PAI</h3>
            </div>
                <?= $this->Form->create($pai) ?>
             <form role="form">
              <div class="box-body">
                            <div class="form-group">
                            <label for="cpf">CPF:</label>
                                <?php
                                    echo $this->Form->input('cpf',array('label'=>'','class'=>'form-control','id'=>'cpf'));
                                ?>
                  
                    </div>
                    <div class="form-group">
                            <label for="cpf">NOME:</label>
                                <?php
                                    echo $this->Form->input('nome',array('label'=>'','class'=>'form-control','id'=>'nome'));
                                ?>
                  
                    </div>
                    <div class="form-group">
                            <label for="cpf">EMAIL:</label>
                                <?php
                                    echo $this->Form->input('email',array('label'=>'','class'=>'form-control','id'=>'email'));
                                ?>
                  
                    </div>
                  
                    <div class="form-group">
                            <label for="cpf">TIPO DE PAI:</label>
                                <?php
                                    echo $this->Form->input('tipopai_id',array('label'=>'','class'=>'form-control','id'=>'tipopais'));
                                ?>
                  
                    </div>
                    <div class="form-group">
                            <label for="cpf">TELEFONE</label>
                                <?php
                                    echo $this->Form->input('telefone',array('label'=>'','class'=>'form-control','id'=>'telefone'));
                                ?>
                  
                    </div>
        
     
                </div>
            
           <div class="box-footer">
                 <?= $this->Html->link(__('Voltar'), ['action' => 'index'], ['class'=>'btn btn-default ']) ?>
        
    <?= $this->Form->end() ?>
            
              </div>
                
</form>
</div>