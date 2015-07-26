<?php
namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class MemesAndReplicasWidget extends Widget{
    public $memeList;

    public function init(){
        parent::init();
    }

    public function run(){
        return $this->render('_memes-and-replicas', ['memeList'=>$this->memeList]);
    }
}