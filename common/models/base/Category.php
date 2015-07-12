<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "category".
 *
 * @property integer $id
 * @property string $name
 *
 * @property \common\models\VidmageCategory[] $vidmageCategories
 */
class Category extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
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
    public function getVidmageCategories()
    {
        return $this->hasMany(\common\models\VidmageCategory::className(), ['category_id' => 'id']);
    }


    
}
