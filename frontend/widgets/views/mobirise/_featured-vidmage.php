<?php $active = ($index==0) ? 'active' : '' ?>
<div class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--bg-adapted item dark center mbr-section--full-height <?php echo $active; ?>" style="background-image: url( <?= $vidmage->getThumbnailUrl() ?> );">
    <div class="mbr-box__magnet mbr-box__magnet--sm-padding">
        <div class=" container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="mbr-hero">
                        <h1 class="mbr-hero__text"><?= $vidmage->name; ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>