<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

use common\models\Vidmage;
use common\models\Author;

class AuthorController extends Controller{

    public function actionIndex($slug){
        $query = Vidmage::find()
                ->joinWith('vidmageAuthors.author')
                ->where(['author.slug'=>$slug])
                ->orderBy(['id' => SORT_DESC]);

        $vidmages = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $author = Author::findOne(['slug'=>$slug]);

        return $this->render('index', compact('vidmages', 'author'));
    }
}
