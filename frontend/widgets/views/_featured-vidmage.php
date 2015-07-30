<?php
use yii\helpers\Html;

use frontend\widgets\ShareButtonsWidget;
use common\helpers\Tools;
?>
<div class="col-sm-6 jumbo-meme">
    <a href="<?= $vidmage->siteUrl ?>" class="thumbnail">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="<?= $vidmage->url ?>"></iframe>
        </div>
    </a>
</div>
<div class="col-sm-6">
    <div class="jumbotron jumbo-meme">
        <a href="<?= $vidmage->siteUrl ?>"><h3><?= $vidmage ?></h3></a>
        <span class="glyphicon glyphicon-tag pull-left"></span>
        <?= Tools::ulWithLink($vidmage->getAllNm('vidmageTags', 'tag'), 'tag', true) ?>
        <span class="glyphicon glyphicon-user pull-left"></span>
        <?= Tools::ulWithLink($vidmage->getAllNm('vidmageAuthors', 'author'), 'author', true) ?>
        <?php foreach ($vidmage->memeVidmages as $memeVidmage): ?>
            <?php if ($memeVidmage->is_the_origin): ?>
                <p>This is the origin of the meme: <?= Html::a($memeVidmage->meme, $memeVidmage->meme->siteUrl) ?></p>
            <?php else: ?>
                <p>This is a replica of the meme: <?= Html::a($memeVidmage->meme, $memeVidmage->meme->siteUrl) ?></p>
            <?php endif ?>
        <?php endforeach ?>
        <div class="share-buttons">
            <?= ShareButtonsWidget::widget(['vidmageMeme' => $vidmage])?>
        </div>
    </div>
</div>