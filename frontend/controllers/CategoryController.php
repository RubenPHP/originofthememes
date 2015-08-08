<?php
namespace frontend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

use common\models\Vidmage;
use common\models\Category;

class CategoryController extends Controller{

    public function actionIndex($slug){
        $query = Vidmage::find()
                ->joinWith('vidmageCategories.category')
                ->where(['category.slug'=>$slug])
                ->orderBy(['id' => SORT_DESC]);

        $vidmages = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        $channel = Category::findOne(['slug'=>$slug]);

        return $this->render('index', compact('vidmages','channel'));
    }
}