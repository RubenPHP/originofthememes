<?php
use frontend\widgets\VidmageListWidget;

$this->title = 'Memes on Channel: ' . $channel;
$this->registerMetaTag([
    'name' => 'description',
    'content' => Yii::t('app','Watch and enjoy memes on the channel '). $channel,
]);
?>
<div class="category-index">
    <h1><span class="glyphicon glyphicon-blackboard"></span> <?= $channel ?></h1>
    <?= VidmageListWidget::widget(['vidmages'=>$vidmages])?>
</div>