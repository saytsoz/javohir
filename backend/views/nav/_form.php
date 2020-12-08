<?php
use common\models\nav;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


$parent_cat = nav::find()->all();
/* @var $this yii\web\View */
/* @var $model common\models\nav */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nav-form">

    <?php $form = ActiveForm::begin(); ?>

    <select id="nav-parent_id" class="form-control" name="Nav[parent_id]" aria-invalid="false">
       <?php if($model->parent_id==0): ?> 
        <option value="0">независимая категория</option> 
       <?php else:?>
        <option value="<?=$model->parent->parent_id?>"><?=$model->parent->parent_id ?></option>
       <?php endif?>
       <?php foreach($parent_cat as $item): ?>
        <?php if($item->parent_id==0):?>
        <option style="font-weight: bold;" value="<?= $item->id?>"><?= $item->title?></option>
        <?php else:?>
        <option value="<?= $item->id?>"><?= $item->title?></option>   
        <?php endif ?>

        <?php endforeach?>
    </select> 

    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'keywords_uz')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'keywords_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_uz')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'text_uz')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'text_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hit')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
