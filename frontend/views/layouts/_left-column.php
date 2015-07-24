<?php
use yii\helpers\Html;
?>
<div id="channels">
    <p>
        <span class="glyphicon glyphicon-blackboard glyphicon-2x"></span>
        <strong><?= Yii::t('app', 'Channels') ?></strong>
    </p>
    <?= Html::ul(['Music', 'Humor'], ['item'=>function($item, $index){return '<li><a href="#">hola</a></li>';}]) ?>
</div>
<div id="tags">
    <p>
        <span class="glyphicon glyphicon-tag glyphicon-2x"></span>
        <strong><?= Yii::t('app', 'Trending Tags') ?></strong>
        <?= Html::ul(['Music', 'Humor'], ['item'=>function($item, $index){return '<li><a href="#">hola</a></li>';}]) ?>
    </p>
</div>
<div id="authors">
    <p>
        <span class="glyphicon glyphicon-user glyphicon-2x"></span>
        <strong><?= Yii::t('app', 'Popular Authors') ?></strong>
        <?= Html::ul(['Music', 'Humor'], ['item'=>function($item, $index){return '<li><a href="#">hola</a></li>';}]) ?>
    </p>
</div>