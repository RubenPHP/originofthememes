<?php
use common\helpers\Tools;
?>

<div class="row featured img-rounded">
  <?php foreach ($replicas as $vidmage): ?>
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
            <a href="<?= $vidmage->siteUrl ?>">
              <img src="<?= $vidmage->thumbnailUrl ?>" alt="...">
            </a>
            <div class="caption">
              <h3><a href="<?= $vidmage->siteUrl ?>"><?= $vidmage ?></a></h3>
              <p>
                  <?= $this->render('_twitter-share-vidmage-meme-button', 
                          [
                           'vidmageMeme' => $vidmage,
                           'text' => $vidmage->name . ' #meme',
                          ]) ?>
                  <a class="btn btn-social-icon btn-facebook btn-xs">
                      <i class="fa fa-facebook"></i>
                  </a>
              </p>
              <span class="glyphicon glyphicon-tag"></span>
              <?= Tools::ulWithLink($vidmage->getAllNm('vidmageTags', 'tag')) ?>
              <span class="glyphicon glyphicon-user"></span>
              <?= Tools::ulWithLink($vidmage->getAllNm('vidmageAuthors', 'author')) ?>
            </div>
        </div>
      </div>
  <?php endforeach ?>
</div>