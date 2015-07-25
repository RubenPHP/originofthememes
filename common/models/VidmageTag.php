<?php

namespace common\models;

use Yii;
use \common\models\base\VidmageTag as BaseVidmageTag;

/**
 * This is the model class for table "vidmage_tag".
 */
class VidmageTag extends BaseVidmageTag
{

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($insert){
                $tag = Tag::findOne($this->tag_id);
                $tag->recount++;
                $tag->save();
            }
            return true;
        } else {
            return false;
        }
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $tag = Tag::findOne($this->tag_id);
            $tag->recount--;
            $tag->save();
            return true;
        } else {
            return false;
        }
    }


}
