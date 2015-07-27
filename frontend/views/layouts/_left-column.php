<?php
use yii\helpers\Html;

use common\models\Category;
use common\models\Tag;
use common\models\Author;
use common\models\Meme;
use common\models\Vidmage;

use common\helpers\Tools;


$channels = Category::find()->all();

$tags = Tag::find()
        ->orderBy(['recount' => SORT_DESC])
        ->limit(10)
        ->all();

$authors = Author::find()
        ->orderBy(['recount' => SORT_DESC])
        ->limit(5)
        ->all();

$latestMemes = Meme::find()
        ->orderBy(['id' => SORT_DESC])
        ->limit(10)
        ->all();

$latestReplicas = Vidmage::find()
        ->joinWith('memeVidmages')
        ->where(['meme_vidmage.is_the_origin' => false])
        ->orderBy(['id' => SORT_DESC])
        ->limit(10)
        ->all();
?>
<div id="latest-memes">
    <p>
        <span class="glyphicon glyphicon-globe glyphicon-2x"></span>
        <strong><?= Yii::t('app', 'Latest Memes') ?></strong>
        <?= Tools::ulWithLink($latestMemes) ?>
    </p>
</div>
<div id="latest-replicas">
    <p>
        <span class="glyphicon glyphicon-film glyphicon-2x"></span>
        <strong><?= Yii::t('app', 'Latest Replicas') ?></strong>
        <?= Tools::ulWithLink($latestReplicas) ?>
    </p>
</div>
<div id="channels">
    <p>
        <span class="glyphicon glyphicon-blackboard glyphicon-2x"></span>
        <strong><?= Yii::t('app', 'Channels') ?></strong>
    </p>
    <?= Tools::ulWithLink($channels) ?>
</div>
<div id="tags">
    <p>
        <span class="glyphicon glyphicon-tag glyphicon-2x"></span>
        <strong><?= Yii::t('app', 'Trending Tags') ?></strong>
        <?= Tools::ulWithLink($tags) ?>
    </p>
</div>
<div id="authors">
    <p>
        <span class="glyphicon glyphicon-user glyphicon-2x"></span>
        <strong><?= Yii::t('app', 'Popular Authors') ?></strong>
        <?= Tools::ulWithLink($authors) ?>
    </p>
</div>
