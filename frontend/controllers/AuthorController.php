<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

use common\models\Vidmage;
use common\models\Author;

class AuthorController extends Controller{

    public function actionIndex($slug){
        $vidmages = Vidmage::find()
                ->joinWith('vidmageAuthors.author')
                ->where(['author.slug'=>$slug])
                ->orderBy(['id' => SORT_DESC])
                ->all();
        $author = Author::findOne(['slug'=>$slug]);

        return $this->render('index', compact('vidmages', 'author'));
    }
}
