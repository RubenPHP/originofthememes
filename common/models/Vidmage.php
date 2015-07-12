<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use \common\models\base\Vidmage as BaseVidmage;

/**
 * This is the model class for table "vidmage".
 */
class Vidmage extends BaseVidmage
{
    public static function getMappedArray(){
        $models = self::find()->asArray()->all();
        return ArrayHelper::map($models, 'id', 'name');
    }

    public function __toString(){
        return $this->name;
    }
}
