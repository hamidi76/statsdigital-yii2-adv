<?php
/**
 * primary.php
 *
 * @author Pedro Plowman
 * @copyright Copyright &copy; Pedro Plowman, 2017
 * @link https://github.com/p2made
 * @package yii2-startbootstrap-themes
 * @license MIT
 */

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\bootstrap\Html;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<?= $this->render('_head.php') ?>
</head>
<body id="page-top">
	<?php $this->beginBody() ?>
	<?= Alert::widget() ?>

	<?= $this->render('_navigation.php') ?>

    <div class="row">
	<?= $content ?>
    </div>
	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
