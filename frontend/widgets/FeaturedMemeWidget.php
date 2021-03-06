<?php
namespace frontend\widgets;

use yii\base\Widget;

class FeaturedMemeWidget extends Widget{
    public $meme;
    public $theme;

    public function init(){
        parent::init();
    }

    public function run(){
        $view = isset($this->theme) ? "{$this->theme}\\_featured-meme" : '_featured-meme';
        return $this->render($view, ['meme'=>$this->meme]);
    }
}