<?php
use frontend\widgets\VidmageListWidget;
use frontend\widgets\ShareButtonsWidget;
use yii\widgets\Pjax;


$this->title = 'Memes from Author: ' . $author;
$this->registerMetaTag([
    'name' => 'description',
    'content' => Yii::t('app','Watch memes created or starring '). $author,
]);
?>

<?php Pjax::begin([
  'enablePushState' => false,
  'scrollTo' => 0,
  //'enableReplaceState' => false,
]); ?>

<div class="author-index">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h1>
            <span class="glyphicon glyphicon-user"></span> 
            <a href="<?= $author->siteUrl ?>"><?= $author ?> <?= Yii::t('app','Memes')?></a>
        </h1>
      </div>
      <div class="panel-body no-gutter">
        <?= VidmageListWidget::widget(['vidmages'=>$vidmages])?>
      </div>
    </div>
</div>

<?php Pjax::end(); ?>
