<?php
use frontend\widgets\MemeWidget;
use frontend\widgets\VidmageListWidget;
use yii\widgets\Pjax;

$this->title = 'Origin of the meme ' . $meme;
$this->registerMetaTag([
    'name' => 'description',
    'content' => Yii::t('app','Find the origin of the meme {meme} and all the replicas', ['meme'=>$meme]),
]);
?>

<?php Pjax::begin([
  'enablePushState' => true,
  'scrollTo' => 0,
]); ?>

<?= MemeWidget::widget(['meme'=>$meme]) ?>

<div id="replicas" class="panel panel-info">
  <div class="panel-heading">
    <h2><?= Yii::t('app','Replicas')?></h2>
  </div>
  <div class="panel-body no-gutter">
    <?= VidmageListWidget::widget(['vidmages'=>$vidmages]) ?>
  </div>
</div>
<?php Pjax::end(); ?>
