

<?php if(sizeof($menuPai)> 0):  ?>

<?php foreach ($menuPai as $menu) : ?>

<?php if($menu['pai']==NULL ):?>
<li class="treeview ">
    <?= $menu->action ? $this->Html->link(__(' '. $menu->name), ['controller' => $menu->controller,'action' => $menu->action], ["class" => $menu->icon]): $this->Html->link(' '.$menu->name,'#',['class'=>$menu->icon])?>

    <?php if(sizeof($menuFilho)> 0):  ?>

       

        <?php foreach ($menuFilho as $filho) : ?>
        <?php if($filho['pai']==$menu['id'] ):?>
             <ul class="treeview-menu">
        <li>
            <?= $filho->action ? $this->Html->link(__(' '. $filho->name), ['controller' => $filho->controller,'action' => $filho->action], ["class" => $filho->icon]): $this->Html->link(' '.$filho->name,'#',['class'=>$filho->icon])?>
            <?php if(sizeof($menuNeto)> 0):  ?>
         

                <?php foreach ($menuNeto as $neto) : ?>

                <?php if($neto['pai']==$filho['id'] ):?>
   <ul class="treeview-menu">
                <li>
                    <?= $neto->action ? $this->Html->link(__(' '. $neto->name), ['controller' => $neto->controller,'action' => $neto->action], ["class" => $neto->icon]): $this->Html->link(' '.$neto->name,'#',['class'=>$neto->icon])?>
                </li>
                 </ul>
                <?php
            endif;
             endforeach; ?>
            <?php
            endif;?>
        </li>
        </ul> 
        <?php
            endif;
             endforeach; ?>
    
    <?php endif;?>
</li>

<?php   endif; endforeach; endif; ?>
