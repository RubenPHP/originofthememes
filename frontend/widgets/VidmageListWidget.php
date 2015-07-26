<?php
namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class VidmageListWidget extends Widget{
    public $vidmages;

    public function init(){
        parent::init();
    }

    public function run(){
        return $this->render('_vidmage-list', ['vidmages' => $this->vidmages]);
    }
}