<figure class="mbr-figure mbr-figure--wysiwyg mbr-figure--full-width mbr-figure--caption-outside-bottom mbr-after-navbar" id="video1-20" style="background-color: rgb(37, 37, 37);">

    <div>
        <iframe class="mbr-embedded-video" src="<?= $meme->url; ?>" width="1280" height="720" frameborder="0" allowfullscreen>
        </iframe>
    </div>
    <figcaption class="mbr-figure__caption mbr-figure__caption--std-grid">
        <small class="mbr-figure__caption-small">
            <?= $meme->name ?> <?= $meme->description ?>
        </small>
    </figcaption>
</figure>