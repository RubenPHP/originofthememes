<?php
use frontend\widgets\VidmageListWidget;
use frontend\widgets\FeaturedMemeWidget;

$this->title = 'Replica ' . $vidmage . ' of the Meme ' . $meme;
$this->registerMetaTag([
    'name' => 'description',
    'content' => Yii::t('app','Whatch the replica {replica} of the meme {meme}', ['replica'=>$vidmage,'meme'=>$meme]),
]);
?>

<div class="vidmage-index">
    <h1>
        <?= Yii::t('app', 'Replica: ') . $vidmage ?>
        <small><?= Yii::t('app', 'This is a replica of the meme: ') . $meme ?></small>
    </h1>
    <?= VidmageListWidget::widget(['vidmages' => [$vidmage]])?>

    <h2><span class="glyphicon glyphicon-globe"></span> <?= Yii::t('app', 'Original Meme') ?></h2>
    <?= FeaturedMemeWidget::widget(['meme'=>$meme]) ?>

    <h2><span class="glyphicon glyphicon-film"></span> <?= Yii::t('app', 'Other Replicas of the Meme: ') . $meme ?></h2>
    <?= VidmageListWidget::widget(['vidmages'=>$meme->getAllNm('notOriginMemeVidmages', 'vidmage')])?>
</div>