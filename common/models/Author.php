<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use \common\models\base\Author as BaseAuthor;

/**
 * This is the model class for table "author".
 */
class Author extends BaseAuthor
{
    public static function getMappedArray(){
        $models = self::find()->asArray()->all();
        return ArrayHelper::map($models, 'id', 'name');
    }

    public function __toString(){
        return $this->name;
    }
}
