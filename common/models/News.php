<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $author_id
 * @property string $date
 * @property integer $theme_id
 * @property string $captiopn
 * @property string $text
 * @property string $preview
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['theme_id'], 'integer'],
            [['text'], 'string'],
            [['author_id', 'captiopn'], 'string', 'max' => 255],
            [['preview'], 'string', 'max' => 256],
        ];
    }
    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $preview = substr($this->text, 256);
            if($preview){
                $this->preview = $preview;
            }else{
                $this->preview = $this->text;
            }
            return true;
        }
        return false;
    }
    
    public function getTheme()
    {
        return $this->hasOne(Themes::className(), ['id' => 'theme_id']);
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'date' => 'Date',
            'theme_id' => 'Theme ID',
            'captiopn' => 'Captiopn',
            'text' => 'Text',
            'preview' => 'preview',
        ];
    }
}
