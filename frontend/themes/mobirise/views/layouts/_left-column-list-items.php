<div id="<?= $divId?>" class="panel panel-<?= $class ?>">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-<?= $icon ?> glyphicon-1-5x"></span>
        <strong><?= Yii::t('app', $title) ?></strong>
    </div>
    <div class="panel-body list-group">
    <?php foreach ($items as $item): ?>
        <a href="<?= $item->siteUrl ?>" class="list-group-item"><?= $item ?></a>
    <?php endforeach ?>
    </div>
</div>