<?php

use common\helpers\Tools;

/* @var $this yii\web\View */
$this->title = 'Origin of the Memes';
?>
<div class="site-index">
    <div id="most-popular-meme" class="row no-gutter">
        <h2><span class="glyphicon glyphicon-fire glyphicon-2x text-danger"></span> <?= Yii::t('app', 'Most Popular Meme')?></h2>
        <?= $this->render('_featured-meme', ['meme'=>$mostPopularMeme]) ?>
    </div>

    <div class="row">
      <h3><span class="glyphicon glyphicon-time glyphicon-2x text-primary"></span> <?= Yii::t('app', 'New Replicas')?></h3>
      <div class="row featured img-rounded">
          <?php foreach ($newReplicas as $vidmage): ?>
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
    </div>

    <div id="editor-pick-meme" class="row no-gutter">
        <h3><span class="glyphicon glyphicon-certificate glyphicon-2x text-success"></span> <?= Yii::t('app', "Editor's Pick")?></h3>
        <?= $this->render('_featured-meme', ['meme'=>$editorMemePick]) ?>
    </div>

    <div class="row">
      <h3><span class="glyphicon glyphicon-time glyphicon-2x text-primary"></span> <?= Yii::t('app', 'New Memes')?></h3>
      <div class="row featured img-rounded">
        <?php foreach ($newMemes as $meme): ?>
              <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <a href="<?= $meme->siteUrl ?>">
                      <img src="<?= $meme->thumbnailUrl ?>" alt="...">
                    </a>
                    <div class="caption">
                        <h3><a href="<?= $meme->siteUrl ?>"><?= $meme ?></a>
                         <small>and <?= $meme->countNotOriginMemeVidmages ?> replicas</small>
                        </h3>
                        <p>
                            <?= $meme->description ?>
                        </p>
                        <p>
                            <?= $this->render('_twitter-share-vidmage-meme-button', 
                                    [
                                     'vidmageMeme' => $meme,
                                     'text' => $meme->name . ' #meme',
                                    ]) ?>
                            <a class="btn btn-social-icon btn-facebook btn-xs">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </p>
                    </div>
                </div>
              </div>
          <?php endforeach ?>
      </div>
    </div>
</div>
