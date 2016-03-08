<?php
namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class VidmageListWidget extends Widget{
    public $vidmages;
    public $theme;

    public function init(){
        parent::init();
    }

    public function run(){
        $view = isset($this->theme) ? "{$this->theme}\\_vidmage-list" : '_vidmage-list';
        return $this->render($view, ['vidmages' => $this->vidmages]);
    }
}