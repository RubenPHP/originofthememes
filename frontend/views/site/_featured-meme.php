<div class="col-sm-6 jumbo-meme">
    <a href="<?= $meme->siteUrl ?>" class="thumbnail">
      <img src="<?= $meme->thumbnailUrl ?>" alt="...">
    </a>
</div>
<div class="col-sm-6">
    <div class="jumbotron jumbo-meme">
    <a href="<?= $meme->siteUrl ?>"><h3><?= $meme ?></h3></a>
    <p><?= $meme->description ?></p>
    <p>
        <a class="btn btn-social-icon btn-facebook btn-sm">
            <i class="fa fa-facebook"></i>
        </a>
        <?= $this->render('_twitter-share-vidmage-meme-button', 
                            [
                             'vidmageMeme' => $meme,
                             'text' => 'testing text',
                            ]) ?>
    </p>
    <p>1,000,000,000 Views</p>
    </div>
</div>