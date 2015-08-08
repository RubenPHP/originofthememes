<?php
use yii\helpers\Html;

use frontend\widgets\ShareButtonsWidget;
use common\helpers\Tools;
?>
<div class="col-sm-6 jumbo-meme">
    <a href="<?= $model->siteUrl ?>" class="thumbnail">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="<?= $model->url ?>"></iframe>
        </div>
    </a>
</div>
<div class="col-sm-6">
    <div class="jumbotron jumbo-meme">
        <a href="<?= $model->siteUrl ?>"><h3><?= $model ?></h3></a>
        <span class="glyphicon glyphicon-tag pull-left"></span>
        <?= Tools::ulWithLink($model->getAllNm('vidmageTags', 'tag'), 'tag', true) ?>
        <span class="glyphicon glyphicon-user pull-left"></span>
        <?= Tools::ulWithLink($model->getAllNm('vidmageAuthors', 'author'), 'author', true) ?>
        <span class="glyphicon glyphicon-blackboard pull-left"></span>
        <?= Tools::ulWithLink($model->getAllNm('vidmageCategories', 'category'), 'channel', true) ?>
        <?php foreach ($model->memeVidmages as $memeVidmage): ?>
            <?php if ($memeVidmage->is_the_origin): ?>
                <p>This is the origin of the meme: <?= Html::a($memeVidmage->meme, $memeVidmage->meme->siteUrl) ?></p>
            <?php else: ?>
                <p>This is a replica of the meme: <?= Html::a($memeVidmage->meme, $memeVidmage->meme->siteUrl) ?></p>
            <?php endif ?>
        <?php endforeach ?>
        <div class="share-buttons">
            <?= ShareButtonsWidget::widget(['vidmageMeme' => $model])?>
        </div>
    </div>
</div>