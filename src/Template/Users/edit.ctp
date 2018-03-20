<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

 <section class="content">

      <div class="row">
        <div class="col-md-3">
 <?= $this->Form->create($use,['type' => 'file']) ?>
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php echo $this->Html->image($use->photo!==null? 'Users/photo/'.$use->id.'/'.$use->photo: 'avatar.png', array('class' => 'profile-user-img img-responsive img-circle', 'alt' => $use->fullName)); ?>

              <h3 class="profile-username text-center"><?= h($use->fullName) ?></h3>

              <p class="text-muted text-center"><?= h($use->email) ?></p>
         
            <!--  <p class="text-muted text-center"><?= ($user->roles->name) ?></p> -->
            </div>
            <!-- /.box-body -->
          </div>
      </div>
       <div class="col-md-9">
         <div class="box box-primary">
            <div class="box-body box-profile">

                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Nome</label>

                    <div class="col-sm-10">
                      <?php
            echo $this->Form->control('fullName',['class'=>'form-control','placeholder'=>'Nome','id'=>'name','label'=>false]);            ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                       <?php
            echo $this->Form->control('email',['class'=>'form-control','placeholder'=>'Email','id'=>'email','label'=>false]);            ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">Telefone</label>

                    <div class="col-sm-10">
                        <?php
            echo $this->Form->control('phone',['class'=>'form-control','placeholder'=>'Telefone','id'=>'phone','label'=>false]);            ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Ativo</label>

                    <div class="col-sm-10">
                     <?php    echo $this->Form->control('active',['label'=>'']);?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Grupo</label>

                    <div class="col-sm-10">
                   <?php echo $this->Form->control('role_id', ['options' => $roles, 'empty' => true,'label'=>false,'class'=>'form-control']);?>
                    </div>
                  </div>
                    <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Foto</label>

                    <div class="col-sm-10">
                     <?php    echo $this->Form->control('photo',['label'=>'','type' => 'file']);?>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                            <?= $this->Form->button(__('Alterar'),['class'=>'btn btn-danger']) ?>
                      
                    </div>
                  </div>
                </form>

    <?= $this->Form->end() ?>

            </div>
        </div>
       </div>
  </div>
</section>
