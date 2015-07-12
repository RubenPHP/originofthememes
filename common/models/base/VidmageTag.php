<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "vidmage_tag".
 *
 * @property integer $id
 * @property integer $vidmage_id
 * @property integer $tag_id
 *
 * @property \common\models\Vidmage $vidmage
 * @property \common\models\Tag $tag
 */
class VidmageTag extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vidmage_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vidmage_id', 'tag_id'], 'required'],
            [['vidmage_id', 'tag_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'vidmage_id' => Yii::t('app', 'Vidmage ID'),
            'tag_id' => Yii::t('app', 'Tag ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVidmage()
    {
        return $this->hasOne(\common\models\Vidmage::className(), ['id' => 'vidmage_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(\common\models\Tag::className(), ['id' => 'tag_id']);
    }


    
}
