<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;

use \common\models\base\Tag as BaseTag;
use \common\models\traits\ExtendModel;

/**
 * This is the model class for table "tag".
 */
class Tag extends BaseTag
{
    use ExtendModel;

    public static function recalculateRecount(){
        $tags = self::find()->all();
        foreach ($tags as $tag) {
            $tag->recount = count($tag->vidmageTags);
            $tag->save();
        }
    }

    public function __toString(){
        return $this->name;
    }
}
