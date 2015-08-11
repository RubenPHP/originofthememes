<?php
use frontend\widgets\FeaturedMemeWidget;
use frontend\widgets\VidmageListWidget;
use yii\widgets\Pjax;

$this->title = 'Origin of the meme ' . $meme;
$this->registerMetaTag([
    'name' => 'description',
    'content' => Yii::t('app','Find the origin of the meme {meme} and all the replicas', ['meme'=>$meme]),
]);
?>

<?php Pjax::begin([
  'enablePushState' => false,
  'scrollTo' => 0,
]); ?>

<div id="meme" class="panel panel-primary">
  <div class="panel-heading">
    <h1><a href="<?= $meme->siteUrl ?>"><?= Yii::t('app','Meme:')?> <?= $meme ?></a></h1>
  </div>
  <div class="panel-body no-gutter">
    <?= FeaturedMemeWidget::widget(['meme'=>$meme]) ?>
  </div>
</div>

<div id="replicas" class="panel panel-info">
  <div class="panel-heading">
    <h2><?= Yii::t('app','Replicas')?></h2>
  </div>
  <div class="panel-body no-gutter">
    <?= VidmageListWidget::widget(['vidmages'=>$vidmages]) ?>
  </div>
</div>
<?php Pjax::end(); ?>
