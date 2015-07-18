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
        return MemeVidmage::find()
                ->where(['meme_id'=>$this->id])
                ->andWhere(['is_the_origin'=>false])
                ->all();
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

    public function __toString(){
        return $this->name;
    }
}
