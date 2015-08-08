<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

use common\models\Meme;
use common\models\Vidmage;

class MemeController extends Controller{

    public function actionIndex($slug){
        $meme = Meme::findOne(['slug'=>$slug]);

        $query = Vidmage::find()
                    ->joinWith('memeVidmages.meme')
                    ->where(['meme.id' => $meme->id])
                    ->andWhere(['meme_vidmage.is_the_origin' => false]);

        $vidmages = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', compact('meme', 'vidmages'));
    }
}