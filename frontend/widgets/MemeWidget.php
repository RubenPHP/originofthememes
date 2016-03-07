<?php

namespace frontend\widgets;


use yii\base\Widget;

class MemeWidget extends Widget
{
    public $meme;

    public function run(){
        return $this->render('mobirise\\_meme', ['meme' => $this->meme]);
    }
}