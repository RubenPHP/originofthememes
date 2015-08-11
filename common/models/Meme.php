<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Query;

use \common\models\base\Meme as BaseMeme;
use \common\models\traits\ExtendModel;
/**
 * This is the model class for table "meme".
 */
class Meme extends BaseMeme
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


    public static function mostPopular(){
        $query = new Query;
        $query->select('meme_id, COUNT(meme_id) AS n_memes')
              ->from('meme_vidmage')
              ->groupBy('meme_id')
              ->orderBy(['n_memes' => SORT_DESC])
              ->limit(1);
        $row = $query->one();

        return self::findOne($row['meme_id']);
    }

    public function saveManyVidmages($vidmages, $is_the_origin=false){
        foreach ($vidmages as $vidmageId) {
            $memeVidmage = new MemeVidmage;
            $memeVidmage->meme_id = $this->id;
            $memeVidmage->vidmage_id = $vidmageId;
            $memeVidmage->is_the_origin = $is_the_origin;
            $memeVidmage->save();
        }
    }

    public function deleteManyVidmages($vidmagesId){
        MemeVidmage::deleteAll([
                        'and', 'meme_id = :meme_id',
                        ['in', 'vidmage_id', $vidmagesId]
                       ],
                       [':meme_id' => $this->id]
                    );
    }

    public function getNotOriginMemeVidmages(){
        return $this->getQueryNotOriginMemeVidmages()->all();
    }

    public function getCountNotOriginMemeVidmages(){
        return $this->getQueryNotOriginMemeVidmages()->count();
    }

    public function getQueryNotOriginMemeVidmages(){
        $query = MemeVidmage::find()
                ->where(['meme_id'=>$this->id])
                ->andWhere(['is_the_origin'=>false]);
        return $query;
    }

    public function getOriginMemeVidmage(){
        return MemeVidmage::find()
                ->where(['meme_id'=>$this->id])
                ->andWhere(['is_the_origin'=>true])
                ->one();
    }

    public function getOriginMemeVidmageAsArray(){
        $originMemeVidmage = $this->originMemeVidmage;
        return isset($originMemeVidmage) ? [$originMemeVidmage->vidmage_id] : [];
    }

    public function updateOriginMemeVidmage($vidmage_id){
        $oldOriginMemeVidmage = $this->originMemeVidmage;
        if (isset($oldOriginMemeVidmage)) {
            $oldOriginMemeVidmage->is_the_origin = false;
            $oldOriginMemeVidmage->save();
        }
        $newOriginMemeVidmage = MemeVidmage::find()
                                ->where(['meme_id'=>$this->id])
                                ->andWhere(['vidmage_id'=>$vidmage_id])
                                ->one();
        $newOriginMemeVidmage = isset($newOriginMemeVidmage) ? $newOriginMemeVidmage : new MemeVidmage;
        $newOriginMemeVidmage->meme_id = $this->id;
        $newOriginMemeVidmage->vidmage_id = $vidmage_id;
        $newOriginMemeVidmage->is_the_origin = true;
        $newOriginMemeVidmage->save();
    }

    public function getUrl(){
        return $this->originMemeVidmage->vidmage->url;
    }

    public function getThumbnail(){
        $originMemeVidmage = $this->originMemeVidmage;
        return $originMemeVidmage->vidmage->thumbnail;
    }

    public function getThumbnailUrl(){
        $originMemeVidmage = $this->originMemeVidmage;
        return $originMemeVidmage->vidmage->thumbnailUrl;
    }

    public function __toString(){
        return $this->name;
    }
}
