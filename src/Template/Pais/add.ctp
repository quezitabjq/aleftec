

        <?php echo $this->Html->css('tokenize2.min'); ?>
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">CADASTRO DE PAI</h3>
            </div>
                <?= $this->Form->create($pai) ?>
             <form role="form">
              <div class="box-body">
                            <div class="form-group">
                            <label for="pessoa">Nome:</label>
                                <?php
                                    echo $this->Form->input('pessoa_id',array('label'=>'','class'=>'form-control','id'=>'pessoa','multiple'));
                                ?>
                  
                    </div>
                  
                  
                    <div class="form-group">
                            <label for="tipopais">TIPO DE PAI:</label>
                                <?php
                                    echo $this->Form->input('tipopai_id',array('label'=>'','class'=>'form-control','id'=>'tipopais'));
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

            <script src="//code.jquery.com/jquery-2.2.4.min.js"></script>
            <?php echo $this->Html->script('tokenize2.min'); ?>
 <script>
 $('#pessoa').tokenize2();
</script>