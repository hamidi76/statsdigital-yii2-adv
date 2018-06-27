<?php
/**
 * Created by PhpStorm.
 * User: far-east
 * Date: 26/06/2018
 * Time: 4:16 PM
 */

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
    <h1>Memos</h1>
    <ul>
        <?php foreach ($memos as $memo): ?>
            <li>
                <?= Html::encode("{$memo->name} ({$memo->memo})") ?>:
                <?= $memo->memo_owner ?>
            </li>
        <?php endforeach; ?>
    </ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>



<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'memo',
        'created_at:datetime',
        // ...
    ],
]) ?>
