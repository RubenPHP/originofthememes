<?php
namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class FeaturedVidmageWidget extends Widget{
    public $vidmage;

    public function init(){
        parent::init();
    }

    public function run(){
        return $this->render('_featured-vidmage', ['model'=>$this->vidmage]);
    }
}