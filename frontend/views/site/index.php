<?php
use frontend\widgets\FeaturedMemeWidget;
use frontend\widgets\ReplicaListWidget;
use frontend\widgets\MemeListWidget;

/* @var $this yii\web\View */
$this->title = 'Origin of the Memes';
$this->registerMetaTag([
    'name' => 'description',
    'content' => Yii::t('app','Find the origin of the most popular memes on Internet. Enjoy watching memes from vine, youtube, instagram and more.')
]);
?>
<div class="site-index">

    <div id="most-popular-meme" class="panel panel-primary">
      <div class="panel-heading">
        <h2><span class="panel-title glyphicon glyphicon-fire glyphicon-1-5x"></span> <?= Yii::t('app', 'Most Popular Meme')?></h2>
      </div>
      <div class="panel-body">
        <?= FeaturedMemeWidget::widget(['meme'=>$mostPopularMeme]) ?>
      </div>
    </div>

    <div class="row">
      <h3><span class="glyphicon glyphicon-time glyphicon-2x text-primary"></span> <?= Yii::t('app', 'New Replicas')?></h3>
      <?= ReplicaListWidget::widget(['replicas'=>$newReplicas]) ?>
    </div>


    <div id="editor-pick-meme" class="panel panel-primary">
      <div class="panel-heading">
        <h3><span class="panel-title glyphicon glyphicon-certificate glyphicon-1-5x"></span> <?= Yii::t('app', "Editor's Pick")?></h3>
      </div>
      <div class="panel-body">
        <?= FeaturedMemeWidget::widget(['meme'=>$editorMemePick]) ?>
      </div>
    </div>

    <div class="row">
      <h3><span class="glyphicon glyphicon-time glyphicon-2x text-primary"></span> <?= Yii::t('app', 'New Memes')?></h3>
      <?= MemeListWidget::widget(['memes'=>$newMemes]) ?>
    </div>
</div>
