

<li class="treeview">
    <a href="#">
       	<i class="fa fa-list"></i>
        <span>AGENDA</span> 
    </a>

    <ul class="treeview-menu">
         <?php if(sizeof($menuContacts)> 0): ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-phone"></i>
                    <span>CONTATOS</span>
                </a>
                <ul class="treeview-menu">
                <?php 

                foreach ($menuContacts as $menu) :
                    if($menu->controller == 'prospections'): ?>
                        <li>
                            <?= $this->Html->link(__(' '. $menu->name), ['controller' => $menu->controller,'action' => $menu->action], ["class" => $menu->icon]) ?>
                        </li>
                <?php   
                    endif; 
                endforeach;
                ?>

                </ul>
            </li>
        <?php endif; ?>
        
        <?php if(sizeof($menuCategories)> 0 ): ?>
       	<li class="treeview">
            <a href="#">
                <i class="glyphicon glyphicon-th-list"></i>
                <span>CATEGORIA</span> 
            </a>
            <ul class="treeview-menu">
		    <?php 
		    foreach ($menuCategories as $menu) :
		        if($menu->controller == 'eventTypes'): ?>
					<li><?= $this->Html->link(__(' '. $menu->name), ['controller' => $menu->controller,'action' => $menu->action], ["class" => $menu->icon]) ?></li>
			<?php	
				endif; 
			endforeach;
			?>
			</ul>
        </li>
        <?php endif; ?>
        <?php if(sizeof($menuSubcategories) > 0 ): ?>
        <li class="treeview">
            <a href="#">
            	<i class=" glyphicon glyphicon-th-list"></i>
                <span>SUBCATEGORIAS</span> 
            </a>
            <ul class="treeview-menu">
            <?php 
		    foreach ($menuSubcategories as $menu) :
		        if($menu->controller == 'services'): ?>
					<li><?= $this->Html->link(__(' '. $menu->name), ['controller' => $menu->controller,'action' => $menu->action], ["class" => $menu->icon]) ?></li>
			<?php	
				endif; 
			endforeach;
			?>

            </ul>
        </li>
        <?php endif; ?>
        <?php if(sizeof($menuAgendas)> 0 ): ?>
        <li class="treeview">
			<a href="#">
            	<i class="fa fa-calendar"></i>
            	<span>GERENCIAR</span>
            </a>
          	<ul class="treeview-menu">
            <?php 
		    foreach ($menuAgendas as $menu) :
		        if($menu->controller == 'events'): ?>
					<li><?= $this->Html->link(__(' '. $menu->name), ['controller' => $menu->controller,'action' => $menu->action], ["class" => $menu->icon]) ?></li>
			<?php	
				endif; 
			endforeach;

            foreach ($menuCalendar as $menu) :
                if($menu->controller == 'calendar'): ?>
                    <li><?= $this->Html->link(__(' '. $menu->name), ['controller' => $menu->controller,'action' => $menu->action], ["class" => $menu->icon]) ?></li>
            <?php   
                endif; 
            endforeach;
			?>
            
			
          	</ul>
        </li>
    	<?php endif; ?>
    </ul>
</li>



<li class="treeview active">
    <a href="#">
        <i class="fa fa-user"></i>
        <span>USUÁRIOS</span>      
    </a>
    <ul class="treeview-menu">
       
       

    	<?php if(sizeof($menuRoles)> 0): ?>
        <li class="treeview">
          	<a href="#">
            	<i class="fa fa-users"></i>
            	<span>PERFIL</span>
          	</a>
		    <ul class="treeview-menu">
        	<?php 
		    foreach ($menuRoles as $menu) :
		        if($menu->controller == 'roles'): ?>
					<li>
						<?= $this->Html->link(__(' '. $menu->name), ['controller' => $menu->controller,'action' => $menu->action], ["class" => $menu->icon]) ?>
					</li>
			<?php	
				endif; 
			endforeach;
			?>

            </ul>
        </li>
        
    	<?php endif; ?>
    	<?php if(sizeof($menuUsers) > 0): ?>
        <li class="treeview">
      		<a href="#">
		        <i class="glyphicon glyphicon-cog"></i>
		        <span>GERENCIAR</span>
          	</a>
		    <ul class="treeview-menu">
		    <?php 
		    foreach ($menuUsers as $menu) :
		        if($menu->controller == 'users'): ?>
					<li>
						<?= $this->Html->link(__(' '. $menu->name), ['controller' => $menu->controller,'action' => $menu->action], ["class" => $menu->icon]) ?>
					</li>
			<?php	
				endif; 
			endforeach;
			?>
		    </ul>
		</li>
		<?php endif; ?>

		<?php if(sizeof($menuPermissions) >= 1): ?>
        <li class="treeview">
          	<a href="#">
            	<i class="fa fa-wrench"></i>
            	<span>PERMISSÕES</span>
          	</a>
		    <ul class="treeview-menu">
        	<?php 
		    foreach ($menuPermissions as $menu) :
		        //if($menu->controller == 'permissions'): ?>
					<li>
						<?= $this->Html->link(__(' '. $menu->name), ['controller' => $menu->controller,'action' => $menu->action], ["class" => $menu->icon]) ?>
					</li>
			<?php	
				//endif; 
			endforeach;
			?>
			
            </ul>
        </li>
        
    	<?php endif; ?>
    </ul>
</li>

         
