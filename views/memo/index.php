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

<div class="takwim-index container" style="margin-top: 100px">
    <h3>Memos</h3>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'memo',
        'created_at:datetime',
        // ...
    ],
]) ?>

</div>
