<?php
namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class MemeListWidget extends Widget{
    public $memes;
    public $theme;
    public $sliderId;

    public function init(){
        parent::init();
    }

    public function run(){
        $view = isset($this->theme) ? "{$this->theme}\\_meme-list" : '_meme-list';
        return $this->render($view, ['memes' => $this->memes, 'sliderId' => $this->sliderId]);
    }
}