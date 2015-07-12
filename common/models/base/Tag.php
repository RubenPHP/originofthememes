<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "tag".
 *
 * @property integer $id
 * @property string $name
 *
 * @property \common\models\VidmageTag[] $vidmageTags
 */
class Tag extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVidmageTags()
    {
        return $this->hasMany(\common\models\VidmageTag::className(), ['tag_id' => 'id']);
    }


    
}
