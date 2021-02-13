<?php

/* @var $this \yii\web\View */

?>

<h1>ImporterCsvdata</h1>
<?php foreach($savers as $csvfile => $status) :?>
    <?= $csvfile ?> - <?= $status ? 'создан' : 'ошибка' ?>
    <br />
<?php endforeach;?>
