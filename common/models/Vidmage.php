<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\helpers\Url;

use \common\models\base\Vidmage as BaseVidmage;
use \common\models\traits\ExtendModel;

/**
 * This is the model class for table "vidmage".
 */
class Vidmage extends BaseVidmage
{

    use ExtendModel;

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
            ],
            'timestamp' => [
                'class' => TimestampBehavior::className(),
            ],
            [
            'class' => BlameableBehavior::className(),
            ],
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        if($insert){
            $this->downloadAndSaveThumbnail();
        }
        return parent::afterSave($insert, $changedAttributes);
    }

    public function getSiteUrl(){
        $slug = isset($this->slug) ? $this->slug : $this->name;
        $url = Url::to([$this->tableName().'/index', 'slug'=>$slug]);
        if ($this->isTheOrigin) {
            $url = $this->memeVidmage->meme->siteUrl;
        }
        return $url;
    }

    public function getIsTheOrigin(){
        return $this->memeVidmage->is_the_origin;
    }

    public function getMemeVidmage(){
        return $this->memeVidmages[0];
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
        $vidmageAuthors = VidmageAuthor::find()
                                ->where(['vidmage_id' => $this->id])
                                ->andWhere(['in', 'author_id', $authorsId])
                                ->all();
        foreach ($vidmageAuthors as $vidmageAuthor) {
            $vidmageAuthor->delete();
        }
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
        $vidmageTags = VidmageTag::find()
                                ->where(['vidmage_id' => $this->id])
                                ->andWhere(['in', 'tag_id', $tagsId])
                                ->all();
        foreach ($vidmageTags as $vidmageTag) {
            $vidmageTag->delete();
        }
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

    public function getNotOriginMemeVidmages(){
        $query = MemeVidmage::find()
            ->where(['meme_id'=>$this->memeVidmages[0]->meme_id])
            ->andWhere(['is_the_origin'=>false])
            ->andWhere(['<>', 'vidmage_id', $this->id]);
        return $query->all();
    }


    public function downloadAndSaveThumbnail(){
        $thumbnailPath = Yii::$app->params['thumbnailPath'].$this->thumbnail;

        $page = file_get_contents($this->downloadUrl);
        preg_match('/property="og:image" content="(.*?)"/', $page, $matches);
        $remoteImageUrl = (isset($matches[1])&&!empty($matches[1])) ? $matches[1] : false;

        file_put_contents($thumbnailPath, file_get_contents($remoteImageUrl));
    }

    public function getUrl(){
        return str_replace('{id}', $this->id_url, $this->platform->embed_url_pattern);
    }

    public function getDownloadUrl(){
        return str_replace('{id}', $this->id_url, $this->platform->download_url_pattern);
    }
    public function getThumbnailUrl(){
        return Yii::$app->params['thumbnailUrl'] . $this->thumbnail;
    }

    public function getThumbnail(){
        return $this->id . '-' . $this->slug . '' . Yii::$app->params['thumbnailExtension'];
    }

    public function __toString(){
        return $this->name;
    }
}
