<?php
/** @var common\models\Meme $meme */
use common\helpers\Tools;

?>
<section class="mbr-section mbr-section--relative" id="msg-box4-12" style="background-color: rgb(233, 188, 47);">

    <div class="mbr-section__container mbr-section__container--isolated container">
        <div class="row">
            <div class="mbr-box mbr-box--fixed mbr-box--adapted">

                <div class="mbr-box__magnet mbr-class-mbr-box__magnet--center-left col-sm-6 mbr-section__left">
                    <div class="mbr-section__container mbr-section__container--middle">
                        <div class="mbr-header mbr-header--auto-align mbr-header--wysiwyg">
                            <h3 class="mbr-header__text">EDITOR'S PICK</h3>
                            <p class="mbr-header__subtext"><?= $meme->name; ?> By <?= $meme->getAuthorNameOfTheOriginalMeme() ?></p>
                            <span class="glyphicon glyphicon-tag pull-left"></span>
                            <?= Tools::ulWithLink($meme->originMemeVidmage->vidmage->getAllNm('vidmageTags', 'tag'), 'tag', true) ?>
                            <span class="glyphicon glyphicon-blackboard pull-left"></span>
                            <?= Tools::ulWithLink($meme->originMemeVidmage->vidmage->getAllNm('vidmageCategories', 'category'), 'channel', true) ?>
                        </div>
                    </div>
                    <div class="mbr-section__container mbr-section__container--middle">
                        <div class="mbr-article mbr-article--auto-align mbr-article--wysiwyg"><p><?= $meme->description ?></p></div>
                    </div>
                    <div class="mbr-section__container">
                        <div class="mbr-buttons mbr-buttons--auto-align btn-inverse"><a class="mbr-buttons__btn btn btn-lg btn-default" href="<?= $meme->siteUrl ?>">Watch Meme</a></div>
                    </div>
                </div>
                <div class="mbr-box__magnet mbr-box__magnet--top-left mbr-section__right col-sm-6">
                    <figure class="mbr-figure mbr-figure--adapted mbr-figure--caption-inside-bottom mbr-figure--full-width">
                        <iframe class="mbr-embedded-video" src="<?= $meme->url; ?>" width="1280" height="720" frameborder="0" allowfullscreen></iframe>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>
