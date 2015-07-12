<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "author".
 *
 * @property integer $id
 * @property string $name
 * @property string $biography
 * @property string $url_info
 * @property integer $is_famous
 *
 * @property \common\models\VidmageAuthor[] $vidmageAuthors
 */
class Author extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['biography'], 'string'],
            [['is_famous'], 'integer'],
            [['name', 'url_info'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'biography' => Yii::t('app', 'Biography'),
            'url_info' => Yii::t('app', 'Url Info'),
            'is_famous' => Yii::t('app', 'Is Famous'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVidmageAuthors()
    {
        return $this->hasMany(\common\models\VidmageAuthor::className(), ['author_id' => 'id']);
    }


    
}
