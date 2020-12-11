<?php
namespace frontend\controllers;
use yii\web\Controller;
use common\models\Category;
use common\models\Product;


use Yii;

class MainController  extends Controller{



public function actionIndex(){

  return $this->render('index');

}

public function actionCategory(){

  $id = Yii::$app->request->get('id');
  $product = Product::find()->where(['category_id'=>$id])->all();


  return $this->render('category',[
    'product'=> $product,
    ]);

  }

  public function actionPage($id){

    $product =  Product::findOne($id);
  
  
    return $this->render('page',[
      'product'=> $product,
      ]);
  
    }
    
    
   

}