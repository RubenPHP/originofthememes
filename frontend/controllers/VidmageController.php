<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

use common\models\Vidmage;
use common\models\Meme;

class VidmageController extends Controller{

    public function actionIndex($slug){
        $vidmage = Vidmage::findOne(['slug'=>$slug]);
        $meme = $vidmage->memeVidmages[0]->meme;

        return $this->render('index', compact('vidmage','meme'));
    }
}