<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;

use \common\models\base\Author as BaseAuthor;
use \common\models\traits\ExtendModel;

/**
 * This is the model class for table "author".
 */
class Author extends BaseAuthor
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

    public static function recalculateRecount(){
        $authors = self::find()->all();
        foreach ($authors as $author) {
            $author->recount = count($author->vidmageAuthors);
            $author->save();
        }
    }

    public function __toString(){
        return $this->name;
    }
}
