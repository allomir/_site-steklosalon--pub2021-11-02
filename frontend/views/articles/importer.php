<?php

/* @var $this \yii\web\View */

?>
Обработка article_file, сохранение $articles как array-text<?php echo "<br>" ?>
...<?php echo "<br>" ?>
<?php echo "<br>" ?>
<?php foreach($articles as $article): ?>
<?= $article['key'] . ' ' . $article['path'] . ' ' . $article['frontpath'] . ' ' . $article['name'] . ' ' . $article['label'] ?><br>
<?php endforeach ?>
<?php echo "<br>" ?>
<?php echo "Файл articles - " ?><?= $saver ?>


