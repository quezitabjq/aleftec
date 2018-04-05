
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de Presença</h3>
            </div>
                <?= $this->Form->create($cultosalaaluno) ?>
             <form role="form">
              <div class="box-body">
                    <div class="form-group">
                   <label for="cpf">Culto:</label>
     
                            <label class="form-control"> 
    
                              <?php echo $cultosalas['culto']['nome']." Data: ".$cultosalas['dataCulto']?>  </label>    
                </div>
                
                    <div class="form-group">
                            <label for="cpf">Sala:</label>
                             <label class="form-control">    <?php echo $cultosalas['sala']['nomesala']?> </label>      
                  
                    </div>
                     <div class="form-group">
                                                 <label for="cpf">Aluno:</label>        
                                          <?php foreach ($alunos as $a): ?>
                                           <?php  $option= [$a['id']=>$a['crianca']['nome']];
                                           endforeach; ?>
                                      <?php echo $this->Form->select(
    'aluno_id',$option, ['empty' => '(Selecione)','label'=>'','class'=>'form-control','id'=>'aluno']);
                                ?>
                  
                    </div>
                      <div class="form-group">
                            <label for="cpf">Responsável:</label>
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
