<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "vidmage_category".
 *
 * @property integer $id
 * @property integer $vidmage_id
 * @property integer $category_id
 *
 * @property \common\models\Vidmage $vidmage
 * @property \common\models\Category $category
 */
class VidmageCategory extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vidmage_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vidmage_id', 'category_id'], 'required'],
            [['vidmage_id', 'category_id'], 'integer']
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
            'category_id' => Yii::t('app', 'Category ID'),
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
    public function getCategory()
    {
        return $this->hasOne(\common\models\Category::className(), ['id' => 'category_id']);
    }


    
}
