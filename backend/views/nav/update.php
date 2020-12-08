<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\nav */

$this->title = 'Update Nav: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Navs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nav-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
