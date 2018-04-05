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
            echo $pessoaevento->evento->nome?>   
                </div>
                  <label for="nome">Pessoa:</label>
                
                             <?php
           
        echo $this->Form->hidden('pessoa_id',  array('value' => $pessoaevento['pessoa_id']));
        ?>
            <?php echo $pessoaevento->pessoa->nome." ".$pessoaevento->pessoa->sobrenome?>       
                </div>
           


                 <div class="form-group">
                  <label for="local">Local:</label>
        
                   <?php echo $pessoaevento->local ?>   
                </div>
                      <div class="form-group">
                  <label for="formapgt">Valor Pago:</label>
                  <?php
           
        echo $this->Form->input('valorentrada',['label'=>'','class'=>'form-control','id'=>'valorentrada'] );
        ?>
                  </div>

                    <div class="form-group">
                  <label for="evento">Pulceira:</label>
                        <?php
            
echo $this->Form->input('pulseira', array('type'=>'checkbox', 'label'=>'Confirmar Recebimento de Pulceira', 'checked'=>'checked'));
;?>   
                </div>
  <?php
           
        echo $this->Form->hidden('user_id',  array('value' => $user['id']));
        ?>
                </div>


          
            <!-- /.box-body -->
            <div class="box-footer">
                 <?= $this->Html->link(__('Voltar'), ['action' => 'index'], ['class'=>'btn btn-default ']) ?>
                  <?= $this->Form->button(__('Confirmar Entrada'),array('class'=>'btn btn-primary pull-right')) ?>
    <?= $this->Form->end() ?>
            
              </div>
             
</form>
</div>