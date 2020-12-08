<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\nav */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Navs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nav-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'parent_id',
            'number',
            'title',
            'title_uz',
            'title_en',
            'keywords:ntext',
            'keywords_uz:ntext',
            'keywords_en:ntext',
            'description:ntext',
            'description_uz:ntext',
            'description_en:ntext',
            'text:ntext',
            'text_uz:ntext',
            'text_en:ntext',
            'img_url:url',
            'hit',
            'slug',
        ],
    ]) ?>

</div>
