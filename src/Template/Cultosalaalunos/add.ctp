
        <?php echo $this->Html->css('tokenize2.min');
    
    ?>
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de Presença</h3>
            </div>
                <?= $this->Form->create($cultosalaaluno) ?>
             <form role="form">
              <div class="box-body">
                    <div class="form-group">
                   <label for="culto">Culto:</label>
     
                            <label class="form-control"> 
    
                              <?php echo $cultosalas['culto']['nome']." Data: ".$cultosalas['dataCulto']?>  </label>    
                </div>
                
                    <div class="form-group">
                            <label for="sala">Sala:</label>
                             <label class="form-control">    <?php echo $cultosalas['sala']['nomesala']?> </label>      
                  
                    </div>
                     <div class="form-group">
                                                 <label for="aluno">Aluno:</label>
                                               
                                       <?php  $listaalunos=json_decode(json_encode($alunos));
                                                                                    
                                               ?>
                                                <?php foreach ($listaalunos as $a): ?>
                                           <?php  $option[]= array($a->id=>$a->nome);
                                           endforeach; ?>

                                         
                                      <?php echo $this->Form->select(
    'aluno_id',$option, ['label'=>'','class'=>'form-control','id'=>'aluno','multiple']);
                                ?> 
                 
                    </div>
                      <div class="form-group">
                            <label for="responsavel">Responsável:</label>
                                <?php
                                    echo $this->Form->input('responsavel',array('label'=>'','class'=>'form-control','id'=>'responsavel'));
                                ?>
                  
                    </div>
                     <?php
           
        echo $this->Form->hidden('codaluno',  array('value' => $cultosalas['sala']['tipo']."00".$cultosalaaluno['aluno_id']));
        ?>
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
 $('#aluno').tokenize2();
</script>