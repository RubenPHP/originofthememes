<?php
use frontend\widgets\ShareButtonsWidget;
?>
<div class="col-sm-6 jumbo-meme">
    <a href="<?= $meme->siteUrl ?>" class="thumbnail">
      <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="<?= $meme->url ?>"></iframe>
      </div>
    </a>
</div>
<div class="col-sm-6">
    <div class="jumbotron jumbo-meme">
      <a href="<?= $meme->siteUrl ?>"><h3><?= $meme ?></h3></a>
      <p><?= $meme->description ?></p>
      <div class="share-buttons">
        <?= ShareButtonsWidget::widget(['vidmageMeme' => $meme])?>
      </div>
    </div>
</div>