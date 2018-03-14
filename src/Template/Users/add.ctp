<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="users form  content">
    <?= $this->Form->create($user) ?>
        <div class="form-group has-feedback">
             <?php
            echo $this->Form->control('fullName',['class'=>'form-control','placeholder'=>'Nome Completo','label'=>false]);?>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
  </div>
<div class="form-group has-feedback">
             <?php
            echo $this->Form->control('phone',['class'=>'form-control','placeholder'=>'Telefone','label'=>false]);?>
          <span class="glyphicon glyphicon-phone form-control-feedback"></span>
  </div>
    <div class="form-group has-feedback">
             <?php
            echo $this->Form->control('email',['class'=>'form-control','placeholder'=>'Email','label'=>false]);?>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
  </div>  
  <div class="form-group has-feedback">
             <?php
            echo $this->Form->control('password',['class'=>'form-control','placeholder'=>'Senha','label'=>false]);?>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
  </div>  
  <div class="row">
    <div class="col-xs-8">
    </div>
          <div class="col-xs-4">
    
    <?= $this->Form->button(__('Registrar',['class'=>'btn btn-primary btn-block btn-flat'])) ?>
</div>

</div>
    <?= $this->Form->end() ?>
</div>
