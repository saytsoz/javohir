<?php
namespace frontend\widget\nav;
use common\models\Nav;
use yii\base\Widget;
use yii\helpers\Html;
use yii\web\view;
use Yii;

class NavWidget extends \yii\bootstrap\widget
{
    public function init(){}

    public function run(){
<<<<<<< HEAD
      $nav = Nav:: find()->orderBy(['number'=>SORT_ASC])->where('parent_id=0')->all();
=======
      $nav = Nav:: find()->orderBy(['number'=>SORT_ASC])->where(['parent_id' => 0])->all();
>>>>>>> af803582f88b9d3dbbfd79111ea421955e619ed6

       return $this->render('nav',['nav' => $nav]);
    }
}