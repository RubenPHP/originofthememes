<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "vidmage".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $platform_id
 * @property string $name
 * @property string $url
 * @property integer $views
 * @property integer $is_active
 *
 * @property \common\models\MemeVidmage[] $memeVidmages
 * @property \common\models\Platform $platform
 * @property \common\models\User $user
 * @property \common\models\VidmageAuthor[] $vidmageAuthors
 * @property \common\models\VidmageCategory[] $vidmageCategories
 * @property \common\models\VidmageTag[] $vidmageTags
 */
class Vidmage extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vidmage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'url'], 'required'],
            [['user_id', 'platform_id', 'views', 'is_active'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['url'], 'string', 'max' => 2083]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'platform_id' => Yii::t('app', 'Platform ID'),
            'name' => Yii::t('app', 'Name'),
            'url' => Yii::t('app', 'Url'),
            'views' => Yii::t('app', 'Views'),
            'is_active' => Yii::t('app', 'Is Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemeVidmages()
    {
        return $this->hasMany(\common\models\MemeVidmage::className(), ['vidmage_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlatform()
    {
        return $this->hasOne(\common\models\Platform::className(), ['id' => 'platform_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVidmageAuthors()
    {
        return $this->hasMany(\common\models\VidmageAuthor::className(), ['vidmage_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVidmageCategories()
    {
        return $this->hasMany(\common\models\VidmageCategory::className(), ['vidmage_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVidmageTags()
    {
        return $this->hasMany(\common\models\VidmageTag::className(), ['vidmage_id' => 'id']);
    }


    
}
