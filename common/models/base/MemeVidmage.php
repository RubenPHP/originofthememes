<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "meme_vidmage".
 *
 * @property integer $id
 * @property integer $meme_id
 * @property integer $vidmage_id
 * @property integer $is_the_origin
 * @property integer $likes
 *
 * @property \common\models\Meme $meme
 * @property \common\models\Vidmage $vidmage
 */
class MemeVidmage extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meme_vidmage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['meme_id', 'vidmage_id'], 'required'],
            [['meme_id', 'vidmage_id', 'is_the_origin', 'likes'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'meme_id' => Yii::t('app', 'Meme ID'),
            'vidmage_id' => Yii::t('app', 'Vidmage ID'),
            'is_the_origin' => Yii::t('app', 'Is The Origin'),
            'likes' => Yii::t('app', 'Likes'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeme()
    {
        return $this->hasOne(\common\models\Meme::className(), ['id' => 'meme_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVidmage()
    {
        return $this->hasOne(\common\models\Vidmage::className(), ['id' => 'vidmage_id']);
    }


    
}
