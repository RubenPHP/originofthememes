<?php
use yii\helpers\Html;

use common\models\Category;
use common\models\Tag;
use common\models\Author;

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
?>
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