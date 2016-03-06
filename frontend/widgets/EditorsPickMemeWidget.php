<?php
namespace frontend\widgets;

use yii\base\Widget;

class EditorsPickMemeWidget extends Widget{
    public $meme;
    public $theme;

    public function init(){
        parent::init();
    }

    public function run(){
        $view = isset($this->theme) ? "{$this->theme}\\_editors-pick-meme" : '_editors-pick-meme';
        return $this->render($view, ['meme'=>$this->meme]);
    }
}