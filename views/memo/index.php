<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TakwimSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Memo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memo-index container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Memo', ['create'], ['class' => 'btn btn-success']) ?>

        <?= Html::a('Download Template', ['download-excel'], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('Download Memo', ['download'], ['class' => 'btn btn-info']) ?>

        <?= Html::a('Upload Memo', ['upload'], ['class' => 'btn btn-warning']) ?>

    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'memo',
            'status_id',
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
