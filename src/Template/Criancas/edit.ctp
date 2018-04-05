    <?php echo $this->Html->css('tokenize2.min'); ?>
       <?php echo $this->Html->css('bootstrap-datepicker.min'); ?>
        
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
      
                <!-- /.input group -->
              
                    <div class="form-group">
                            <label for="cpf">NOME DO PAI/MÃE:</label>
                                       <?php  $listapais=json_decode(json_encode($pais));
                                                                                    
                                               ?>
                                                <?php foreach ($listapais as $p): ?>
                                           <?php  $option[]= array($p->id=>$p->nome);
                                           endforeach; ?>

                                         
                                      <?php echo $this->Form->select(
    'pai_id',$option, ['label'=>'','class'=>'form-control','id'=>'pais','multiple']);
                                ?> 
                  
                    </div>
                                        <div class="form-group">
                <label>DATA DE NASCIMENTO:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                 
                     <?php
            echo $this->Form->input('nascimento',array('label'=>'','class'=>'form-control pull-right','id'=>'datepicker'));?>
                </div>
              </div>
                    <div class="form-group">
                            <label for="cpf">TEM ALERGIA?</label>
                                <?php
                                    echo $this->Form->checkbox('alergia',array('label'=>'','id'=>'alergia'));
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
                  <?= $this->Form->button(__('Salvar'),array('class'=>'btn btn-primary pull-right')) ?>
    <?= $this->Form->end() ?>
            
              </div>


                
</form>
</div>

           <script src="//code.jquery.com/jquery-2.2.4.min.js"></script>
              <?php echo $this->Html->script('bootstrap-datepicker.min');?>
            <?php echo $this->Html->script('tokenize2.min'); ?>
 <script>
 $('#pais').tokenize2();
  $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy',
      locale: 'pt-br'
    });
</script>