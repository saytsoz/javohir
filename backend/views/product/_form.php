<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\Fileinput;
use common\models\category;

/* @var $this yii\web\View */
/* @var $model common\models\product */
/* @var $form yii\widgets\ActiveForm */
$category = category::find()->all();
$parent_category = category::find()->where('parent_id = 0')->all();



?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <select id="product-category_id" class="form-control" name="Product[category_id]" aria-invalid="false">
       <?php if($model->category_id==0): ?> 
        <option value="">выбор категории</option> 
       <?php else:?>
        <option value="<?=$model->cat->id?>"><?=$model->cat->title?></option>
       <?php endif?>
       <?php foreach($parent_category as $item): ?>
         <option style="font-weight: bold;" value="<?= $item->id?>"><?= $item->title?></option>
        <?php if($item->childmenu):?>
            <?php foreach($item->childmenu as $chmenu):?>
               <option value="<?= $chmenu->id?>"><?= $chmenu->title?></option>  
            <?php endforeach?> 
        <?php endif ?>

        <?php endforeach?>
    </select> 

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?php
        echo  $model->getDisplayOne();
        if(empty($model->image1)){
        echo $form->field($model, 'image1')->widget(FileInput::classname(),[
            'options' =>['accept'=>'image/*'],
        ]);
        }
        else{
            echo Html::a('удалить фото', \yii\helpers\Url::to(['/product/delete-photo','id'=>$model->id,'imagebg'=>'image1']) ,
        
                ['class'=>'btn btn-danger']);
        }
    
    ?>

<?php
        echo  $model->getDisplayTwo();
        if(empty($model->image2)){
        echo $form->field($model, 'image2')->widget(FileInput::classname(),[
            'options' =>['accept'=>'image/*'],
        ]);
        }
        else{
            echo Html::a('удалить фото', \yii\helpers\Url::to(['/product/delete-photo','id'=>$model->id,'imagebg'=>'image2']) ,
        
                ['class'=>'btn btn-danger']);
        }
    
    ?>

<?php
        echo  $model->getDisplayThree();
        if(empty($model->image3)){
        echo $form->field($model, 'image3')->widget(FileInput::classname(),[
            'options' =>['accept'=>'image/*'],
        ]);
        }
        else{
            echo Html::a('удалить фото', \yii\helpers\Url::to(['/product/delete-photo','id'=>$model->id,'imagebg'=>'image3']) ,
        
                ['class'=>'btn btn-danger']);
        }
    
    ?>

<?php
        echo  $model->getDisplayFour();
        if(empty($model->image4)){
        echo $form->field($model, 'image4')->widget(FileInput::classname(),[
            'options' =>['accept'=>'image/*'],
        ]);
        }
        else{
            echo Html::a('удалить фото', \yii\helpers\Url::to(['/product/delete-photo','id'=>$model->id,'imagebg'=>'image4']) ,
        
                ['class'=>'btn btn-danger']);
        }
    
    ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
