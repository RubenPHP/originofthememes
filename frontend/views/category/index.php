<?php
use yii\widgets\Pjax;
use frontend\widgets\VidmageListWidget;

$this->title = 'Memes on Channel: ' . $channel;
$this->registerMetaTag([
    'name' => 'description',
    'content' => Yii::t('app','Watch and enjoy memes on the channel '). $channel,
]);
?>
<?php Pjax::begin([
        'enablePushState' => false,
        'scrollTo' => 0,
        //'enableReplaceState' => false,
      ]); ?>

<div class="category-index">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h1><span class="glyphicon glyphicon-blackboard"></span> <?= $channel ?> <?= Yii::t('app','Memes')?></h1>
      </div>
      <div class="panel-body no-gutter">
        <?= VidmageListWidget::widget(['vidmages'=>$vidmages])?>
      </div>
    </div>
</div>

<?php Pjax::end(); ?>