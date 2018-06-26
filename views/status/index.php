<?php
/**
 * Created by PhpStorm.
 * User: amzari
 * Date: 6/26/18
 * Time: 4:58 PM
 */

use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
    <h1>Status</h1>
    <ul>
        <?php foreach ($status as $view): ?>
            <li>
                <?= Html::encode("{$view->status_name} ({$view->class})") ?>:
                <?= $view->created_at ?>
            </li>
        <?php endforeach; ?>
    </ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>