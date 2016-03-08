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

<?= VidmageListWidget::widget(['vidmages'=>$vidmages, 'theme'=>'mobirise']) ?>
<?php Pjax::end(); ?>
