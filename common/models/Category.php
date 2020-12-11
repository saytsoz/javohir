<?php

namespace common\models;
use yii\helpers\Html;
use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $parent_id
 * @property int|null $number
 * @property string $title
 * @property string|null $title_uz
 * @property string|null $title_en
 * @property string|null $keywords
 * @property string|null $keywords_uz
 * @property string|null $keywords_en
 * @property string|null $description
 * @property string|null $description_uz
 * @property string|null $description_en
 * @property string|null $text
 * @property string|null $text_uz
 * @property string|null $text_en
 * @property string|null $img_url
 * @property string|null $hit
 * @property string|null $slug
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    public $newtitle;
    public $newkeywords;
    public $newdescription;
    public $newtext;

    public function afterFind()
    {
        if(Yii::$app->language == 'uz-UZ'){
            $this->newtitle = $this->title_uz;
            $this->newkeywords = $this->keywords_uz;
            $this->newdescription = $this->description_uz;
            $this->newtext = $this->text_uz;
        }
        else if(Yii::$app->language == 'en-EN'){
            $this->newtitle = $this->title_en;
            $this->newkeywords = $this->keywords_en;
            $this->newdescription = $this->description_en;
            $this->newtext = $this->text_en;
        }
        else{
            $this->newtitle = $this->title;
            $this->newkeywords = $this->keywords;
            $this->newdescription = $this->description;
            $this->newtext = $this->text;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'number'], 'integer'],
            [['title'], 'required'],
            [['keywords', 'keywords_uz', 'keywords_en', 'description', 'description_uz', 'description_en', 'text', 'text_uz', 'text_en', 'hit'], 'string'],
            [['title', 'title_uz', 'title_en', 'img_url', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'number' => 'Number',
            'title' => 'Title',
            'title_uz' => 'Title Uz',
            'title_en' => 'Title En',
            'keywords' => 'Keywords',
            'keywords_uz' => 'Keywords Uz',
            'keywords_en' => 'Keywords En',
            'description' => 'Description',
            'description_uz' => 'Description Uz',
            'description_en' => 'Description En',
            'text' => 'Text',
            'text_uz' => 'Text Uz',
            'text_en' => 'Text En',
            'img_url' => 'Img Url',
            'hit' => 'Hit',
            'slug' => 'Slug',
        ];
    }

    public function getParent(){
        return $this->hasOne(self:: className(),['id'=>'parent_id']);
    }

    public function getChildmenu(){
        return $this->hasMany(self:: className(),['parent_id'=>'id']);
    }
    public function getProduct(){
        return $this->hasMany(product::className(),['category_id'=>'id']);
    }

    public function getDisplayOne(){
        if(empty($this->img_url)){
            $image = null;
        }
        else{     
            $image = Html::img(Yii::getAlias('@uploadPage'). $this->img_url,[
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


