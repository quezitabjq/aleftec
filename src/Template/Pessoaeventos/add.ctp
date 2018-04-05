<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Nova Inscrição</h3>
            </div>
                <?= $this->Form->create($pessoaevento) ?>
             <form role="form">
              <div class="box-body">
                    <div class="form-group">
                         <div class="form-group">
                  <label for="evento">Evento:</label>
                        <?php
            echo $this->Form->input('evento_id', ['options' => $eventos ,'label'=>'','class'=>'form-control','id'=>'evento']);?>   
                </div>
                  <label for="nome">Pessoa:</label>
                
                             <?php
           
        echo $this->Form->hidden('pessoa_id',  array('value' => $pessoa['id']));
        ?>
            <?php echo $pessoa['nome']." ".$pessoa['sobrenome']?>       
                </div>
           


                <div class="form-group">
                  <label for="formapgt">Forma de Pagamento:</label>
        
                    <?php echo $this->Form->select(
    'formapgt',
    ['DINHEIRO'=>'DINHEIRO','CARTÃO DE DÉBITO'=> 'CARTÃO DE DÉBITO','CARTÃO DE CRÉDITO'=>'CARTÃO DE CRÉDITO'],
    ['empty' => 'Selecione']
);          ?>
                </div>
                                
        
                    <?php $this->Form->select(
    'parcelado',
    ['NÃO'=>'NÃO'] 
    
);          ?>
                
              
                    <?php $this->Form->select(
    'local',
    ['IECG'=>'IECG']   
   
);          ?>
               
                      <div class="form-group">
                  <label for="formapgt">Valor:</label>
                  <?php
           
        echo $this->Form->input('valorentrada',['label'=>'','class'=>'form-control','id'=>'valorentrada'] );
        ?>
                  </div>
  <?php
           
        echo $this->Form->hidden('user_id',  array('value' => $user['id']));
        ?>
                </div>
          
            <!-- /.box-body -->
            <div class="box-footer">
                 <?= $this->Html->link(__('Voltar'), ['action' => 'index'], ['class'=>'btn btn-default ']) ?>
                  <?= $this->Form->button(__('Confirmar Inscrição'),array('class'=>'btn btn-primary pull-right')) ?>
    <?= $this->Form->end() ?>
            
              </div>
             
</form>
</div>