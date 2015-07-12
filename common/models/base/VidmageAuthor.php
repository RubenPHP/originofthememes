<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "vidmage_author".
 *
 * @property integer $id
 * @property integer $vidmage_id
 * @property integer $author_id
 * @property integer $is_main_author
 *
 * @property \common\models\Vidmage $vidmage
 * @property \common\models\Author $author
 */
class VidmageAuthor extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vidmage_author';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vidmage_id', 'author_id'], 'required'],
            [['vidmage_id', 'author_id', 'is_main_author'], 'integer']
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
            'author_id' => Yii::t('app', 'Author ID'),
            'is_main_author' => Yii::t('app', 'Is Main Author'),
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
    public function getAuthor()
    {
        return $this->hasOne(\common\models\Author::className(), ['id' => 'author_id']);
    }


    
}
