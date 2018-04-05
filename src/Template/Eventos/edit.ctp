<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $evento['nome']?></h3>
            </div>

    <?= $this->Form->create($evento) ?>
     <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="nome">Nome:</label>
                   <?php
            echo $this->Form->input('nome',array('label'=>'','class'=>'form-control','placeholder'=>'Digite o nome do Evento','id'=>'nome'));?>
                  
                </div>
                      <div class="form-group">
                  <label for="descricao">Descrição:</label>
                   <?php
            echo $this->Form->input('descricao',array('label'=>'','class'=>'form-control','placeholder'=>'Digite a Descrição do Evento','id'=>'descricao'));?>
                  
                </div>
                            <div class="form-group">
                  <label for="valor">Valor:</label>
                   <?php
            echo $this->Form->input('valor',array('label'=>'','class'=>'form-control','placeholder'=>'Digite o Valor do Evento','id'=>'valor'));?>
                  
                </div>
                                             <div class="form-group">
                  <label for="maxinscritos">Maximo de Inscritos:</label>
                   <?php
            echo $this->Form->input('maxinscritos',array('label'=>'','class'=>'form-control','id'=>'maxinscritos'));?>
                  
                </div>
                            <div class="form-group">
                  <label for="datainicio">Data Início:</label>
                   <?php
            echo $this->Form->input('datainicio',array('label'=>'','class'=>'form-control','id'=>'datainicio'));?>
                  
                </div>
                <div class="form-group">
                  <label for="datafinal">Data Final:</label>
                   <?php
            echo $this->Form->input('datafinal',array('label'=>'','class'=>'form-control','id'=>'datafinal'));?>
                  
                </div> 
                                 <div class="form-group">
                  <label for="local">Local:</label>
                   <?php
            echo $this->Form->input('local',array('label'=>'','class'=>'form-control','placeholder'=>'Digite o Local do Evento','id'=>'local'));?>
                  
                </div>
                                 <div class="form-group">
                  <label for="cep">CEP:</label>
                   <?php
            echo $this->Form->input('cep',array('label'=>'','class'=>'form-control','id'=>'cep'));?>
                  
                </div>
                                        <div class="form-group">
                  <label for="endereco">Endereço:</label>
                   <?php
            echo $this->Form->input('endereco',array('label'=>'','class'=>'form-control','placeholder'=>'Digite o Endereço do Evento','id'=>'endereco'));?>
                  
                </div>
                                        <div class="form-group">
                  <label for="numero">Número:</label>
                   <?php
            echo $this->Form->input('numero',array('label'=>'','class'=>'form-control','id'=>'numero'));?>
                  
                </div>
                <div class="form-group">
                  <label for="endereco">Bairro:</label>
                   <?php
            echo $this->Form->input('bairro',array('label'=>'','class'=>'form-control','placeholder'=>'Digite o Bairro','id'=>'bairro'));?>
                  
                </div>

        <?php
           
        echo $this->Form->hidden('user_id',  array('value' => $user['id']));
        ?>
      </div>
              <!-- /.box-body -->

              <div class="box-footer">
                    <?= $this->Html->link(__('Voltar'), ['action' => 'index'], ['class'=>'btn btn-default ']) ?>
                  <?= $this->Form->button(__('Salvar'),array('class'=>'btn btn-primary pull-right')) ?>
    <?= $this->Form->end() ?>
               
              </div>
            </form>
          </div>
