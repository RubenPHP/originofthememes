<?php
use frontend\widgets\VidmageListWidget;
use frontend\widgets\ShareButtonsWidget;

$this->title = 'Memes with Tag: ' . $tag;
$this->registerMetaTag([
    'name' => 'description',
    'content' => Yii::t('app','Watch memes from vine, youtube, instagram, labeled with the tag '). $tag,
]);
?>
<div class="tag-index">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h1><span class="glyphicon glyphicon-tag"></span> #<?= $tag ?> <?= Yii::t('app','Memes')?></h1>
      </div>
      <div class="panel-body no-gutter">
        <?= VidmageListWidget::widget(['vidmages'=>$vidmages])?>
      </div>
    </div>
</div>