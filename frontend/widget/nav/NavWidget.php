<?php
namespace frontend\widget\nav;
use common\models\nav;
use yii\base\Widget;
use yii\helpers\Html;
use yii\web\view;
use Yii;

class NavWidget extends \yii\bootstrap\widget
{
    public function init(){}

    public function run(){
      $nav = Nav:: find()->orderBy(['number'=>SORT_ASC])->where('parent_id=0')->all();

       return $this->render('nav',['nav' => $nav]);
    }
}