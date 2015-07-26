<?php
namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class FeaturedMemeWidget extends Widget{
    public $meme;

    public function init(){
        parent::init();
    }

    public function run(){
        return $this->render('_featured-meme', ['meme'=>$this->meme]);
    }
}