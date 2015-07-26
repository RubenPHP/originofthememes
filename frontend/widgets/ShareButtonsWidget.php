<?php
namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class ShareButtonsWidget extends Widget{
    public $vidmageMeme;

    public function init(){
        parent::init();
    }

    public function run(){
        return $this->render('_share-buttons', ['vidmageMeme'=>$this->vidmageMeme]);
    }
}