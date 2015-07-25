<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

use common\models\Author;

class AuthorController extends Controller{

    public function actionIndex($slug){
        return 'hola';
    }
}