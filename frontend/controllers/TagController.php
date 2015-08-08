<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

use common\models\Vidmage;
use common\models\Tag;

class TagController extends Controller{

    public function actionIndex($slug){
        $query = Vidmage::find()
                ->joinWith('vidmageTags.tag')
                ->where(['tag.name'=>$slug])
                ->orderBy(['id' => SORT_DESC]);

        $vidmages = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $tag = Tag::findOne(['name'=>$slug]);

        return $this->render('index', compact('vidmages', 'tag'));
    }
}