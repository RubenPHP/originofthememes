
<section class="mbr-slider mbr-section mbr-section--no-padding carousel slide" data-ride="carousel" data-wrap="true" data-interval="5000" id="<?= $sliderId; ?>">
    <div class="mbr-section__container container article-slider mbr-section__container--last">
        <div class=" col-sm-8 col-sm-offset-2">
            <ol class="carousel-indicators">
                <?php foreach ($memes as $i => $meme): ?>
                    <?php $class = ($i==0) ? 'class="active"' : '' ?>
                    <li data-app-prevent-settings="" data-target="#<?= $sliderId; ?>" data-slide-to="<?= $i ?>" <?= $class; ?>></li>
                <?php endforeach; ?>
            </ol>
            <div class="carousel-inner" role="listbox">
                <?php foreach ($memes as $i => $meme): ?>
                    <?php $active = ($i==0) ? 'active' : '' ?>
                    <div class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--bg-adapted item dark center <?php echo $active; ?>">
                        <div class="mbr-box__magnet">
                            <div>
                                <img src="<?= $meme->thumbnailUrl ?>">
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <div class="mbr-hero">
                                            <h1 class="mbr-hero__text"><?= $meme->name ?></h1>
                                            <?php if (isset($meme->description)): ?>
                                                <p class="mbr-hero__subtext"><?= $meme->description ?></p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mbr-buttons btn-inverse mbr-buttons--center">
                                            <?php $memeOrReplicaName = $sliderId == 'slider-new-replicas' ? 'Replica' : 'Meme'; ?>
                                            <a class="mbr-buttons__btn btn btn-lg btn-default" href="<?= $meme->siteUrl ?>">
                                                Watch <?= $memeOrReplicaName; ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <a data-app-prevent-settings="" class="left carousel-control" role="button" data-slide="prev" href="#<?= $sliderId; ?>">
                <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a data-app-prevent-settings="" class="right carousel-control" role="button" data-slide="next" href="#<?= $sliderId; ?>">
                <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>
