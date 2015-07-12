<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use \common\models\base\Category as BaseCategory;

/**
 * This is the model class for table "category".
 */
class Category extends BaseCategory
{
    public static function getMappedArray(){
        $models = self::find()->asArray()->all();
        return ArrayHelper::map($models, 'id', 'name');
    }

    public function __toString(){
        return $this->name;
    }
}
