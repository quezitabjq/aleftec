
<?php

function date_converter($_date = null) {
$format = '/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/';
if ($_date != null && preg_match($format, $_date, $partes)) {
  return $partes[3].'-'.$partes[2].'-'.$partes[1];
}
return false;
}



function idade($data_nascimento) {

$dn = new DateTime ($data_nascimento);

$agora = new DateTime ();
    
    
    $idade = $agora->diff($dn);
    return $idade->y;
    
}
?>
<div class="etiqueta">
 <div class="row">
    <div class="col col-sm-6">
          
          <div class="info-box ">
            <span class="info-box-icon"><i class="fa  fa-group "></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Responsável:  <?php echo $cultosalaaluno['responsavel'];?></span>
              <span class="info-box-number"> <?php echo $alunos['crianca']['nome'].' - '.idade(
date_converter($alunos['crianca']['nascimento'])).' anos';?></span>
<span class="info-box-text"><?php echo $cultosalas['sala']['nomesala']?></span>
<span class="info-box-text">N°: <?php echo $cultosalaaluno['codaluno'];?></span>
                
            </div>
            <!-- /.info-box-content -->
          </div>
      </div>


       
  </div>
<div class="row">
   <?= $this->Form->button(__('IMPRIMIR'),array('class'=>'btn btn-primary pull-right','onclick'=>'window.print();','id'=>'btnimprimir')) ?>
 
</div>
</div>
<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.1.min.js" > </script>


</script>
<style type="text/css">
    
    @media print {
        *{
background:transparent !important;
color:#000 !important;
text-shadow:none !important;
filter:none !important;
-ms-filter:none !important;
}
      .etiqueta{
        width: 336.377953 px;   
        height: 105.826772 px;
      }
        #btnimprimir{
            visibility: hidden;         
        }
        .main-footer{
            visibility: hidden;
        }

}
</style>