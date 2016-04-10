<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "themes".
 *
 * @property integer $id
 * @property string $author_id
 * @property string $date
 * @property string $name
 */
class Themes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'themes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['author_id', 'name'], 'string', 'max' => 255],
        ];
    }

    public function getNews()
    {
        return $this->hasMany(News::className(), ['theme_id' => 'id']);
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
            'name' => 'Name',
        ];
    }
}
