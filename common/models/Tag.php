<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use \common\models\base\Tag as BaseTag;

/**
 * This is the model class for table "tag".
 */
class Tag extends BaseTag
{
    public static function getMappedArray(){
        $models = self::find()->asArray()->all();
        return ArrayHelper::map($models, 'id', 'name');
    }

    public function __toString(){
        return $this->name;
    }
}
