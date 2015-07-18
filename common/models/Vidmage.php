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

    public function saveManyCategories($vidmageCategories){
        foreach ($vidmageCategories as $vidmageCategoryId) {
            $vidmageCategory = new VidmageCategory;
            $vidmageCategory->vidmage_id = $this->id;
            $vidmageCategory->category_id = $vidmageCategoryId;
            $vidmageCategory->save();
        }
    }

    public function deleteManyCategories($categoriesId){
        VidmageCategory::deleteAll([
                        'and', 'vidmage_id = :vidmage_id',
                        ['in', 'category_id', $categoriesId]
                       ],
                       [':vidmage_id' => $this->id]
                    );
    }

    public function saveManyAuthors($vidmageAuthors){
        foreach ($vidmageAuthors as $vidmageAuthorId) {
            if (!is_numeric($vidmageAuthorId)) {
                $author = new Author;
                $author->name = $vidmageAuthorId;
                $author->save();
                $vidmageAuthorId = $author->id;
            }
            $vidmageAuthor = new VidmageAuthor;
            $vidmageAuthor->vidmage_id = $this->id;
            $vidmageAuthor->author_id = $vidmageAuthorId;
            $vidmageAuthor->save();
        }
    }

    public function deleteManyAuthors($authorsId){
        VidmageAuthor::deleteAll([
                        'and', 'vidmage_id = :vidmage_id',
                        ['in', 'author_id', $authorsId]
                       ],
                       [':vidmage_id' => $this->id]
                    );
    }

    public function saveManyTags($vidmageTags){
        var_dump($vidmageTags);
        foreach ($vidmageTags as $vidmageTagId) {
            if (!is_numeric($vidmageTagId)) {
                $tag = new Tag;
                $tag->name = $vidmageTagId;
                $tag->save();
                $vidmageTagId = $tag->id;
            }
            $vidmageTag = new VidmageTag;
            $vidmageTag->vidmage_id = $this->id;
            $vidmageTag->tag_id = $vidmageTagId;
            $vidmageTag->save();
        }
    }

    public function deleteManyTags($tagsId){
        VidmageTag::deleteAll([
                        'and', 'vidmage_id = :vidmage_id',
                        ['in', 'tag_id', $tagsId]
                       ],
                       [':vidmage_id' => $this->id]
                    );
    }

    public function saveManyMemes($vidmageMemes){
        foreach ($vidmageMemes as $vidmageMemeId) {
            if (!is_numeric($vidmageMemeId)) {
                $meme = new Meme;
                $meme->name = $vidmageMemeId;
                $meme->save();
                $vidmageMemeId = $meme->id;
            }
            $vidmageMeme = new MemeVidmage;
            $vidmageMeme->vidmage_id = $this->id;
            $vidmageMeme->meme_id = $vidmageMemeId;
            $vidmageMeme->save();
        }
    }

    public function deleteManyMemes($memesId){
        MemeVidmage::deleteAll([
                        'and', 'vidmage_id = :vidmage_id',
                        ['in', 'meme_id', $memesId]
                       ],
                       [':vidmage_id' => $this->id]
                    );
    }

    public function __toString(){
        return $this->name;
    }
}
