<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "nav".
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
class Nav extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nav';
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
}
