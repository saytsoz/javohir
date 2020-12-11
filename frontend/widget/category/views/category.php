<?php
use yii\helpers\Html;
?>


<ul class="vertical-menu-list">
<?php foreach($category as $item): ?>
     <li class=""><a href=""><span><img src="/images/vertical-menu/1.png" alt="menu-icon"></span><?= $item->newtitle?><i class="fa fa-angle-right" aria-hidden="true"></i></a>
      <?php if($item->childmenu): ?> 
     <ul class="ht-dropdown mega-child">
         <?php foreach($item->childmenu as $value):?>
           <li><a href="<?= \yii\helpers\Url::to(['/main/category','id' => $value['id']]) ?>"><?=$value->newtitle?><i class="fa fa-angle-right"></i></a>
           <?php if($value->childmenu): ?>
                <ul class="ht-dropdown mega-child">
                <?php foreach($value->childmenu as $sub_title): ?>
                     <li><a href="shop.html"><?=$sub_title->newtitle?></a></li>
                <?php  endforeach?>
                </ul>
             <?php endif ?>   
           </li>
           <?php endforeach?>                                  
         </ul>
         <?php endif ?>
             
      </li>
<?php  endforeach?>
                </ul>
