<?php
use frontend\widgets\FeaturedMemeWidget;
use frontend\widgets\VidmageListWidget;

$this->title = 'Origin of the meme ' . $meme;
$this->registerMetaTag([
    'name' => 'description',
    'content' => Yii::t('app','Find the origin of the meme {meme} and all the replicas', ['meme'=>$meme]),
]);
?>

<div id="most-popular-meme" class="row no-gutter">
    <h2><?= Yii::t('app','Meme:')?> <?= $meme ?></h2>
    <?= FeaturedMemeWidget::widget(['meme'=>$meme]) ?>
</div>
<div class="row">
  <h3><?= Yii::t('app','Replicas')?></h3>
  <?= VidmageListWidget::widget(['vidmages'=>$meme->getAllNm('notOriginMemeVidmages','vidmage')]) ?>
</div>
