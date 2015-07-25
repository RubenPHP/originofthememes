<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "meme".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string $url_info
 *
 * @property \common\models\MemeVidmage[] $memeVidmages
 */
class Meme extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meme';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['url_info'], 'string', 'max' => 2083]
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
            'slug' => Yii::t('app', 'Slug'),
            'description' => Yii::t('app', 'Description'),
            'url_info' => Yii::t('app', 'Url Info'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemeVidmages()
    {
        return $this->hasMany(\common\models\MemeVidmage::className(), ['meme_id' => 'id']);
    }


    
}
