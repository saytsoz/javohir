<?php

namespace common\models;
use yii\helpers\Html;

use Yii;


/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property int|null $user_id
 * @property string $title
 * @property string|null $title_uz
 * @property string|null $title_en
 * @property string $image1
 * @property string|null $image2
 * @property string|null $image3
 * @property string|null $image4
 * @property float $price
 * @property string|null $model
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

public $newtitle;

public function afterFind()
    {
        if(Yii::$app->language == 'uz-UZ'){
            $this->newtitle = $this->title_uz;
        }
        else if(Yii::$app->language == 'en-EN'){
            $this->newtitle = $this->title_en;
        }
        else{
            $this->newtitle = $this->title;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'title','price'], 'required'],
            [['category_id', 'user_id'], 'integer'],
            [['price'], 'number'],
            [['title', 'title_uz', 'title_en', 'image1', 'image2', 'image3', 'image4', 'model'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'title_uz' => 'Title Uz',
            'title_en' => 'Title En',
            'image1' => 'картинка1',
            'image2' => 'картинка2',
            'image3' => 'картинка3',
            'image4' => 'картинка4',
            'price' => 'Price',
            'model' => 'Model',
        ];
    }

    public function getCategory(){
        return $this->hasMany(Category::className(),['id'=>'category_id']);
    }

    public function getCat(){
        return $this->hasOne(Category::className(),['id'=>'category_id']);
    }

    public function getDisplayOne(){
        if(empty($this->image1)){
            $image = null;
        }
        else{     
            $image = Html::img(Yii::getAlias('@uploadPage'). $this->image1,[
                'alt'=>'image for page',
                'title'=>'нажмите кнопку удалить для загрузку нового рисунка ',
                'class'=> 'file-preview-image',
                'width'=>'500px'
                ]);
            }  
            
            return($image == null) ? null:
               Html::tag ('div',$image,['class'=>'file-preview-frame']);

               
        
    }
    public function getDisplayTwo(){
        if(empty($this->image2)){
            $image = null;
        }
        else{     
            $image = Html::img(Yii::getAlias('@uploadPage'). $this->image2,[
                'alt'=>'image for page',
                'title'=>'нажмите кнопку удалить для загрузку нового рисунка ',
                'class'=> 'file-preview-image',
                'width'=>'500px'
                ]);
            }  
            
            return($image == null) ? null:
               Html::tag ('div',$image,['class'=>'file-preview-frame']);

               
        
    }

    public function getDisplayThree(){
        if(empty($this->image3)){
            $image = null;
        }
        else{     
            $image = Html::img(Yii::getAlias('@uploadPage'). $this->image3,[
                'alt'=>'image for page',
                'title'=>'нажмите кнопку удалить для загрузку нового рисунка ',
                'class'=> 'file-preview-image',
                'width'=>'500px'
                ]);
            }  
            
            return($image == null) ? null:
               Html::tag ('div',$image,['class'=>'file-preview-frame']);

               
        
    }
    public function getDisplayFour(){
        if(empty($this->image4)){
            $image = null;
        }
        else{     
            $image = Html::img(Yii::getAlias('@uploadPage'). $this->image4,[
                'alt'=>'image for page',
                'title'=>'нажмите кнопку удалить для загрузку нового рисунка ',
                'class'=> 'file-preview-image',
                'width'=>'500px'
                ]);
            }  
            
            return($image == null) ? null:
               Html::tag ('div',$image,['class'=>'file-preview-frame']);

               
        
    }
}
