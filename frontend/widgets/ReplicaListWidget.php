<?php
namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class ReplicaListWidget extends Widget{
    public $replicas;

    public function init(){
        parent::init();
    }

    public function run(){
        return $this->render('_replica-list', ['replicas' => $this->replicas]);
    }
}