<?php
use common\helpers\Tools;
use frontend\widgets\ShareButtonsWidget;
?>

<div class="row featured img-rounded no-gutter">
  <?php foreach ($replicas as $vidmage): ?>
      <div class="col-sm-6 col-md-3 replica">
        <div class="thumbnail">
            <a href="<?= $vidmage->siteUrl ?>">
              <img src="<?= $vidmage->thumbnailUrl ?>" alt="<?= $vidmage ?>">
            </a>
            <div class="caption">
              <h3><a href="<?= $vidmage->siteUrl ?>"><?= $vidmage ?></a></h3>
              <div class="share-buttons">
                <?= ShareButtonsWidget::widget(['vidmageMeme' => $vidmage])?>
              </div>
              <span class="glyphicon glyphicon-user pull-left"></span>
              <?= Tools::ulWithLink($vidmage->getAllNm('vidmageAuthors', 'author'), 'authors', true) ?>
              <span class="glyphicon glyphicon-tag pull-left"></span>
              <?= Tools::ulWithLink($vidmage->getAllNm('vidmageTags', 'tag'), 'tags', true) ?>
            </div>
        </div>
      </div>
  <?php endforeach ?>
</div>