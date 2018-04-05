


<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">CADASTRO DE LIVRO</h3>
            </div>
                <?= $this->Form->create($livro) ?>
             <form role="form">
              <div class="box-body">
                    <div class="form-group">
                            <label for="cpf">CÓDIGO:</label>
                                <?php
                                    echo $this->Form->input('codigolivro',array('label'=>'','class'=>'form-control','id'=>'codigolivro'));
                                ?>
                  
                    </div>
                       <div class="form-group">
                            <label for="cpf">RESPONSÁVEL:</label>
                                  <?php
                                $respon = ['Apóstolo Edmilson' => 'Apóstolo Edmilson', 'Apóstola Mariza' => 'Apóstola Mariza'];
                                    echo $this->Form->select(
    'responsavel',$respon,  ['empty' => '(Selecione)','label'=>'','class'=>'form-control','id'=>'responsavel']);
                                ?>
                  
                    </div>
                    <div class="form-group">
                            <label for="cpf">TÍTULO:</label>
                                <?php
                                    echo $this->Form->input('titulo',array('label'=>'','class'=>'form-control','id'=>'titulo'));
                                ?>
                  
                    </div>
                     <div class="form-group">
                            <label for="cpf">RESUMO:</label>
                                <?php
                                    echo $this->Form->textarea('resumo', ['rows' => '5', 'cols' => '5','label'=>'','class'=>'form-control','id'=>'resumo']);
                                ?>
                  
                    </div>
                       <div class="form-group">
                            <label for="cpf">AUTOR:</label>
                                <?php
                                    echo $this->Form->input('autor_id',array('label'=>'','class'=>'form-control','id'=>'autor_id','empty' => '(Selecione)'));
                                ?>
                  
                    </div>
                       <div class="form-group">
                            <label for="cpf">GÊNERO:</label>
                                <?php
                                    echo $this->Form->input('genero_id',array('label'=>'','class'=>'form-control','id'=>'genero_id','empty' => '(Selecione)'));
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
