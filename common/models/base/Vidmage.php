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
 * @property string $slug
 * @property string $id_url
 * @property integer $views
 * @property integer $is_active
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property \common\models\MemeVidmage[] $memeVidmages
 * @property \common\models\User $createdBy
 * @property \common\models\User $updatedBy
 * @property \common\models\User $user
 * @property \common\models\Platform $platform
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
            [['user_id', 'name', 'id_url'], 'required'],
            [['user_id', 'platform_id', 'views', 'is_active', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['id_url'], 'string', 'max' => 2083]
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
            'slug' => Yii::t('app', 'Slug'),
            'id_url' => Yii::t('app', 'Id Url'),
            'views' => Yii::t('app', 'Views'),
            'is_active' => Yii::t('app', 'Is Active'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
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
    public function getMeme()
    {
        return $this->hasOne(\common\models\Meme::className(), ['id' => 'meme_id'])
            ->via('memeVidmages');;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'updated_by']);
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
    public function getPlatform()
    {
        return $this->hasOne(\common\models\Platform::className(), ['id' => 'platform_id']);
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
    public function getMainAuthor()
    {
        return $this->hasOne(\common\models\VidmageAuthor::className(), ['vidmage_id' => 'id'])
            ->where(['is_main_author'=>true]);
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
