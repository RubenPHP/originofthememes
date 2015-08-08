<?php
use frontend\widgets\VidmageListWidget;
use frontend\widgets\FeaturedMemeWidget;
use frontend\widgets\FeaturedVidmageWidget;

$this->title = 'Replica ' . $vidmage . ' of the Meme ' . $meme;
$this->registerMetaTag([
    'name' => 'description',
    'content' => Yii::t('app','Whatch the replica {replica} of the meme {meme}', ['replica'=>$vidmage,'meme'=>$meme]),
]);
?>
<div class="vidmage-index">
    <div id="replica" class="panel panel-primary">
      <div class="panel-heading">
        <h1>
            <a href="<?= $vidmage->siteUrl ?>"><?= $vidmage ?></a>
            <small><?= Yii::t('app', 'This is a replica of the meme: ') . $meme ?></small>
        </h1>
      </div>
      <div class="panel-body no-gutter">
        <?= FeaturedVidmageWidget::widget(['vidmage'=>$vidmage]) ?>
      </div>
    </div>

    <div id="meme" class="panel panel-info">
      <div class="panel-heading">
        <h2><span class="glyphicon glyphicon-globe"></span> <?= Yii::t('app','Original Meme')?></h2>
      </div>
      <div class="panel-body no-gutter">
        <?= FeaturedMemeWidget::widget(['meme'=>$meme]) ?>
      </div>
    </div>

    <div class="panel panel-success">
      <div class="panel-heading">
        <h2><?= Yii::t('app','Other Replicas of this Meme: ')?></h2>
      </div>
      <div class="panel-body no-gutter">
        <?= VidmageListWidget::widget(['vidmages'=>$vidmages])?>
      </div>
    </div>
</div>