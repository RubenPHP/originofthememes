<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "platform".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $embed_url_pattern
 *
 * @property \common\models\Vidmage[] $vidmages
 */
class Platform extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'platform';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'embed_url_pattern'], 'required'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['embed_url_pattern'], 'string', 'max' => 2083]
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
            'embed_url_pattern' => Yii::t('app', 'Embed Url Pattern'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVidmages()
    {
        return $this->hasMany(\common\models\Vidmage::className(), ['platform_id' => 'id']);
    }


    
}
