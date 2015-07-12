<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "meme".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
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
            [['name'], 'string', 'max' => 255]
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
            'description' => Yii::t('app', 'Description'),
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
