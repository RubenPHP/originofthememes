<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;

use \common\models\base\Category as BaseCategory;
use \common\models\traits\ExtendModel;


/**
 * This is the model class for table "category".
 */
class Category extends BaseCategory
{
    use ExtendModel;

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                // 'slugAttribute' => 'slug',
            ],
        ];
    }

    public function __toString(){
        return $this->name;
    }
}
