<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="users form">
<?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
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
      <div class="checkbox icheck">
        <label>
          <input type="checkbox">Lembre-me
        </label>
      </div>
    </div>
    <!-- /.col -->
    <div class="col-xs-4">
      <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
      <?= $this->Form->end() ?>
    </div>
    <!-- /.col -->
  </div>

</div>
