<div class="row featured img-rounded">
  <?php foreach ($memes as $meme): ?>
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