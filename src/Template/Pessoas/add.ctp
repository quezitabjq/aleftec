<section class="content">
    <?= $this->Form->create($pessoa) ?>
           
<div class="box box-info">
            <div class="box-header with-border">

              <h3 class="box-title">Membro</h3>
            </div>
            
              <div class="box-body">
            <div class="form-group">
                  <label for="cpf">CPF:</label>
                   <?php
            echo $this->Form->input('cpf',array('label'=>'','class'=>'form-control','id'=>'cpf'));
            ?>
                  
                </div>
                <div class="form-group">
                  <label for="nome">Nome Completo:</label>
                   <?php
            echo $this->Form->input('nome',array('label'=>'','class'=>'form-control','placeholder'=>'Digite o nome ','id'=>'nome'));?>
                  
                </div>

                <div class="form-group">
                  <label for="sexo">Estado Civil:</label>
                   <?php
            echo $this->Form->select('estadocivil',[['value'=>'Solteiro(a)','text'=>'Solteiro(a)'],
            ['value'=>'Casado(a)','text'=>'Casado(a)'],['value'=>'Viúvo(a)','text'=>'Viúvo(a)']],['empty' => 'Selecione','label'=>'','class'=>'form-control','id'=>'estadocivil']);?>
                  
                </div>
    

    <div class="form-group">
                  <label for="sexo">Sexo:</label>
                   <?php
            echo $this->Form->input('sexo',[['value'=>'Feminino','text'=>'Feminino'],
            ['value'=>'Masculino','text'=>'Masculino']],['label'=>'','class'=>'form-control','id'=>'sexo']);?>
                  
                </div>
                <div class="form-group">
                  <label for="email">Email:</label>
                   <?php
            echo $this->Form->input('email',array('label'=>'','class'=>'form-control','id'=>'email'));?>
                  
                </div>
                
                   <div class="form-group">
                  <label for="telefone">Telefone:</label>
                   <?php
            echo $this->Form->input('telefone',array('label'=>'','class'=>'form-control','id'=>'telefone'));?>
                  
                </div>
                       <div class="form-group">
                  <label for="telefone">Formação:</label>
                   <?php
            echo $this->Form->input('formacao',array('empty'=>'Selecione','label'=>'','class'=>'form-control','id'=>'formacao'));?>
                  
                </div>
                   <div class="form-group">
                  <label for="telefone">Profissão:</label>
                   <?php
            echo $this->Form->input('profissao_id',array('empty'=>'Selecione','label'=>'','class'=>'form-control','id'=>'profissao_id'));?>
                  
                </div>

</div>

</div>
<div class="box box-info">


            <div class="box-header with-border">
              <h3 class="box-title">Dados Ministeriais</h3>
            </div>
                
                         <div class="box-body">

                         <div class="form-group">
                  <label for="telefone">Líder:</label>
                   <?php
            echo $this->Form->select('pessoa_id',$pessoas,array('empty'=>'Selecione','label'=>'','class'=>'form-control','id'=>'pessoa_id '));?>

 
                </div>

                         <div class="form-group">
                  <label for="telefone">Participou do Encontro:</label>
                   <?php
            echo $this->Form->checkbox('encontro',array('label'=>'','id'=>'encontro'));?>
 
                </div>

                         <div class="form-group">
                  <label for="telefone">Fez Escola de Líderes:</label>
                   <?php
            echo $this->Form->checkbox('escolalideres',array('label'=>'','id'=>'escolalideres'));?>

 
                </div>

                                         <div class="form-group">
                  <label for="telefone">Fez Liderança Avançada:</label>
                   <?php
            echo $this->Form->checkbox('lidavanc',array('label'=>'','id'=>'lidavanc'));?>

 
                </div>
                                     <div class="form-group">
                  <label for="telefone">Observação:</label>
                   <?php
            echo $this->Form->textarea('descricao',array('empty'=>'Selecione','label'=>'','class'=>'form-control','id'=>'descricao'));?>

 
            <div class="box-header with-border">
              <h3 class="box-title">Endereçamento</h3>
            </div>
 
             <div class="form-group">
                  <label for="telefone">CEP:</label>
                   <?php
            echo $this->Form->input('cep',array('label'=>'','class'=>'form-control','id'=>'cep'));?>
                  
                </div>
 <div class="form-group">
                  <label for="telefone">Rua:</label>
                   <?php
            echo $this->Form->input('rua',array('label'=>'','class'=>'form-control','id'=>'rua'));?>
                  
                </div>
                 <div class="form-group">
                  <label for="telefone">N°:</label>
                   <?php
            echo $this->Form->input('numero',array('label'=>'','class'=>'form-control','id'=>'numero'));?>
                  
                </div>
                <div class="form-group">
                  <label for="telefone">Complemento:</label>
                   <?php
            echo $this->Form->input('complemento',array('label'=>'','class'=>'form-control','id'=>'complemento'));?>
                  
                </div>
                 <div class="form-group">
                  <label for="telefone">Bairro:</label>
                   <?php
            echo $this->Form->input('bairro',array('label'=>'','class'=>'form-control','id'=>'bairro'));?>
                  
                </div>
            </div>
            
           <div class="box-footer">
                 <?= $this->Html->link(__('Voltar'), ['action' => 'index'], ['class'=>'btn btn-default ']) ?>
                  <?= $this->Form->button(__('Inscrever'),array('class'=>'btn btn-primary pull-right')) ?>
    <?= $this->Form->end() ?>
            
              </div>
                

</div>
</section>