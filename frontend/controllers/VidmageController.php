<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

use common\models\Vidmage;
use common\models\Meme;

class VidmageController extends Controller{

    public function actionIndex($slug){
        $vidmage = Vidmage::findOne(['slug'=>$slug]);
        $meme = $vidmage->memeVidmages[0]->meme;

        $query = Vidmage::find()
                    ->joinWith('memeVidmages.meme')
                    ->where(['meme.id' => $meme->id])
                    ->andWhere(['meme_vidmage.is_the_origin' => false])
                    ->andWhere(['<>', 'vidmage_id', $vidmage->id]);

        $vidmages = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', compact('vidmage', 'meme', 'vidmages'));
    }
}