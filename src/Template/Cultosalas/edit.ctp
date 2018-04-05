

<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">ATIVAÇÃO DE CULTO</h3>
            </div>
                <?= $this->Form->create($cultosala) ?>
             <form role="form">
              <div class="box-body">
                    <div class="form-group">
                            <label for="cpf">Culto:</label>
                                <?php
                                    echo $this->Form->input('culto_id',array('label'=>'','class'=>'form-control','id'=>'culto_id'));
                                ?>
                  
                    </div>
                       <div class="form-group">
                            <label for="cpf">Sala:</label>
                                <?php
                                    echo $this->Form->input('sala_id',array('label'=>'','class'=>'form-control','id'=>'sala_id'));
                                ?>
                  
                    </div>
                    <div class="form-group">
                            <label for="cpf">Data:</label>
                                <?php
                                    echo $this->Form->input('dataCulto',array('label'=>'','class'=>'form-control','id'=>'dataCulto'));
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
