

        <?php echo $this->Html->css('tokenize2.min'); ?>
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">CADASTRO DE LIVRO</h3>
            </div>
                <?= $this->Form->create($livro) ?>
             <form role="form">
              <div class="box-body">
                    <div class="form-group">
                            <label for="codigolivro">CÓDIGO:</label>
                                <?php
                                    echo $this->Form->input('codigolivro',array('label'=>'','class'=>'form-control','id'=>'codigolivro'));
                                ?>
                  
                    </div>
                       <div class="form-group">
                            <label for="responsavel">RESPONSÁVEL:</label>
                                <?php
                                $respon = ['Apóstolo Edmilson' => 'Apóstolo Edmilson', 'Apóstola Mariza' => 'Apóstola Mariza'];
                                    echo $this->Form->select(
    'responsavel',$respon,  ['empty' => '(Selecione)','label'=>'','class'=>'form-control','id'=>'responsavel']);
                                ?>
                  
                    </div>
                    <div class="form-group">
                            <label for="titulo">TÍTULO:</label>
                                <?php
                                    echo $this->Form->input('titulo',array('label'=>'','class'=>'form-control','id'=>'titulo'));
                                ?>
                   <?php
           
        echo $this->Form->hidden('user_id',  array('value' => $user['id']));
        ?>
                    </div>
                     <div class="form-group">
                            <label for="resumo">RESUMO:</label>
                                <?php
                                    echo $this->Form->textarea('resumo', ['rows' => '5', 'cols' => '5','label'=>'','class'=>'form-control','id'=>'resumo']);
                                ?>
                  
                    </div>
                       <div class="form-group">
                            <label for="autor">AUTOR:</label>
                                <?php
                                    echo $this->Form->input('autor_id',array('label'=>'','class'=>'form-control','id'=>'autor','multiple'));
                                ?>
                  
                    </div>
                       <div class="form-group">
                            <label for="genero">GÊNERO:</label>
                                <?php
                                    echo $this->Form->input('genero_id',array('label'=>'','class'=>'form-control','id'=>'genero','multiple'));
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
 $('#autor').tokenize2();
 $('#genero        <?php echo $this->Html->css('tokenize2.min'); ?>').tokenize2();
</script>