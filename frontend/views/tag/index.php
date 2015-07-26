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
    <div class="row">
        <h1 class="pull-left"><span class="glyphicon glyphicon-tag"></span> #<?= $tag ?></h1>
        <div>
            <?= ShareButtonsWidget::widget(['vidmageMeme' => $tag])?>
        </div>
    </div>
    <div class="clearfix"></div>
    <?= VidmageListWidget::widget(['vidmages'=>$vidmages])?>
</div>