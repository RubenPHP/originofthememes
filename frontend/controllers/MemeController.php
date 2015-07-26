<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

use common\models\Meme;

class MemeController extends Controller{

    public function actionIndex($slug){
        $meme = Meme::findOne(['slug'=>$slug]);

        return $this->render('index', compact('meme'));
    }
}