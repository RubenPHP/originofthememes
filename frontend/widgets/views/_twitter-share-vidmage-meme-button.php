<?php
use yii\helpers\Html;
?>
<a class="twitter-share-button"
  href="https://twitter.com/intent/tweet?text=<?= Html::encode($text) ?>&url=<?= $vidmageMeme->fullSiteUrl ?>">
Tweet</a>