

<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">CULTO</h3>
            </div>
                <?= $this->Form->create($culto) ?>
             <form role="form">
              <div class="box-body">
                    <div class="form-group">
                            <label for="cpf">NOME:</label>
                                <?php
                                    echo $this->Form->input('nome',array('label'=>'','class'=>'form-control','id'=>'nome'));
                                ?>
                  
                    </div>
                    <div class="form-group">
                            <label for="cpf">HORÁRIO:</label>
                                <?php
                                    echo $this->Form->input('horario',array('label'=>'','class'=>'form-control','id'=>'horario'));
                                ?>
                  
                    </div>
                     <div class="form-group">
                            <label for="cpf">DIA DA SEMANA:</label>
                                <?php
                                    echo $this->Form->input('diadasemana',array('label'=>'','class'=>'form-control','id'=>'diadasemana'));
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
