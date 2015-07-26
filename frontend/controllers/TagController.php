<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

use common\models\Vidmage;
use common\models\Tag;

class TagController extends Controller{

    public function actionIndex($slug){
        $vidmages = Vidmage::find()
                ->joinWith('vidmageTags.tag')
                ->where(['tag.name'=>$slug])
                ->orderBy(['id' => SORT_DESC])
                ->all();
        $tag = Tag::findOne(['name'=>$slug]);

        return $this->render('index', compact('vidmages', 'tag'));
    }
}