<?php
namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class MemeListWidget extends Widget{
    public $memes;

    public function init(){
        parent::init();
    }

    public function run(){
        return $this->render('_meme-list', ['memes' => $this->memes]);
    }
}