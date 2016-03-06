<?php
use frontend\widgets\FeaturedMemeWidget;
use frontend\widgets\ReplicaListWidget;
?>

<?php foreach ($memeList as $meme): ?>
    <h2><?= $meme ?></h2>
    <div id="most-popular-meme" class="row no-gutter">
        <?= FeaturedMemeWidget::widget(['meme'=>$meme])?>
    </div>
    <div class="row">
        <?= ReplicaListWidget::widget(['replicas'=>$meme->getAllNm('notOriginMemeVidmages','vidmage')]) ?>
    </div>
<?php endforeach ?>