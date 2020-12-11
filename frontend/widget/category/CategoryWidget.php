<?php
namespace frontend\widget\category;
use common\models\category;
use yii\base\Widget;
use yii\helpers\Html;
use yii\web\view;
use Yii;

class CategoryWidget extends \yii\bootstrap\widget
{
    public function init(){}

    public function run(){
      $category = Category:: find()->orderBy(['number'=>SORT_ASC])->where('parent_id=0')->all();

       return $this->render('category',['category' => $category]);
    }
}
