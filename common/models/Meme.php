<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use \common\models\base\Meme as BaseMeme;

/**
 * This is the model class for table "meme".
 */
class Meme extends BaseMeme
{
    public static function getMappedArray(){
        $models = self::find()->asArray()->all();
        return ArrayHelper::map($models, 'id', 'name');
    }

    public function __toString(){
        return $this->name;
    }
}
