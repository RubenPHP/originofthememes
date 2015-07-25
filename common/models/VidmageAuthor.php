<?php

namespace common\models;

use Yii;
use \common\models\base\VidmageAuthor as BaseVidmageAuthor;

/**
 * This is the model class for table "vidmage_author".
 */
class VidmageAuthor extends BaseVidmageAuthor
{

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($insert){
                $author = Author::findOne($this->author_id);
                $author->recount++;
                $author->save();
            }
            return true;
        } else {
            return false;
        }
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $author = Author::findOne($this->author_id);
            $author->recount--;
            $author->save();
            return true;
        } else {
            return false;
        }
    }

}
