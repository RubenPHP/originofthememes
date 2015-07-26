<?php
use frontend\widgets\VidmageListWidget;
use frontend\widgets\ShareButtonsWidget;

$this->title = 'Memes from Author: ' . $author;
$this->registerMetaTag([
    'name' => 'description',
    'content' => Yii::t('app','Watch memes created or starring '). $author,
]);
?>

<div class="author-index">
    <div class="row">
        <h1 class="pull-left"><span class="glyphicon glyphicon-user"></span> <?= $author ?></h1>
        <div>
            <?= ShareButtonsWidget::widget(['vidmageMeme' => $author])?>
        </div>
    </div>
    <div class="clearfix"></div>
    <?= VidmageListWidget::widget(['vidmages'=>$vidmages])?>
</div>