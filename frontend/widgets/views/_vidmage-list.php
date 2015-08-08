<?php
use yii\widgets\ListView;
?>

<?=
    ListView::widget( [
        'dataProvider' => $vidmages,
        'itemView' => '_featured-vidmage',
    ]);
?>
