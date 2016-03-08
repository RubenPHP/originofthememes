<section class="mbr-section" id="header3-15">
    <div class="mbr-section__container container mbr-section__container--isolated">
        <div class="mbr-header mbr-header--wysiwyg row">
            <div class="col-sm-8 col-sm-offset-2">
                <h3 class="mbr-header__text">REPLICAS</h3>
                <p class="mbr-header__subtext">for <?= $vidmages->getModels()[0]->meme->name ?> Meme</p>
            </div>
        </div>
    </div>
</section>



<section class="mbr-slider mbr-section mbr-section--no-padding carousel slide" data-ride="carousel" data-wrap="true" data-interval="false" id="slider-22" style="background-color: rgb(255, 255, 255);">
    <div class="mbr-section__container">
        <div>
            <ol class="carousel-indicators">
                <?php foreach ($vidmages->getModels() as  $i => $replica): ?>
                    <?php $class = ($i==0) ? 'class="active"' : '' ?>
                    <li data-app-prevent-settings="" data-target="#slider-22" data-slide-to="<?= $i ?>" <?= $class; ?>></li>
                <?php endforeach; ?>
            </ol>
            <div class="carousel-inner" role="listbox">
                <?php foreach ($vidmages->getModels() as $index => $vidmage ): ?>
                    <?= $this->render('_featured-vidmage', compact('vidmage', 'index')); ?>
                <?php endforeach; ?>
            </div>

            <a data-app-prevent-settings="" class="left carousel-control" role="button" data-slide="prev" href="#slider-22">
                <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a data-app-prevent-settings="" class="right carousel-control" role="button" data-slide="next" href="#slider-22">
                <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>