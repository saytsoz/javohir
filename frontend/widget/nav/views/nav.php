<?php
use yii\helpers\Html;
?>


<ul class="header-bottom-list d-flex">
<?php $i=1; foreach($nav as $item): ?>
<<<<<<< HEAD
    <li <?php if($i ==1){
         echo 'class="active"';
    } ?>><a href="index.html"><?=$item->newtitle?><i class="fa fa-angle-down"></i></a>
=======
    <li <?php if($i ==1){echo 'class="active"';} ?>>
        <a href="index.html">
            <?=$item->title?>
        <i class="fa fa-angle-down"></i>
    </a>
>>>>>>> af803582f88b9d3dbbfd79111ea421955e619ed6
    <?php if($item->childmenu): ?>
        <ul class="ht-dropdown">
        <?php foreach($item->childmenu as $value): ?>   
            <li><a href="index.html"><?=$value->newtitle?></a></li>
         <?php endforeach ?>
        </ul>
     <?php endif?>  
  <?php $i++; endforeach ?>
</ul> 