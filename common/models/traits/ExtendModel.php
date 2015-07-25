<?php
namespace common\models\traits;

use yii\helpers\ArrayHelper;
use yii\helpers\Url;

trait ExtendModel{

    public static function getMappedArray(){
        $models = self::find()->asArray()->all();
        return ArrayHelper::map($models, 'id', 'name');
    }

    public function getAllNm($relation, $object){
        return ArrayHelper::getColumn($this->$relation, $object);
    }

    public function getSiteUrl(){
        $slug = isset($this->slug) ? $this->slug : $this->name;
        return Url::to([$this->tableName().'/index', 'slug'=>$slug]);
    }

    public function getFullSiteUrl(){
        $slug = isset($this->slug) ? $this->slug : $this->name;
        $route = Url::to([$this->tableName().'/index', 'slug'=>$slug]);
        $domain = Url::base(true);
        return $domain.$route;
        //return $this->name;
    }
}