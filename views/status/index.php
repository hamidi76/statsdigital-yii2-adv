<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Statuses');
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row container" style="margin-top: 100px">


    <div class="col-md-3 col-sm-4">

        <?= $this->render('/status/side', array('activePage' => 'index')) ?>

    </div>

        <div class="col-md-9 col-sm-8">
            <div class="status-index">

                <h1><?= Html::encode($this->title) ?></h1>
                <?php Pjax::begin(); ?>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::a(Yii::t('app', 'Create Status'), ['create'], ['class' => 'btn btn-success']) ?>

                    <?= Html::a('Download Status Template', ['download-excel'], ['class' => 'btn btn-danger']) ?>
                </p>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'status_id',
                        'status_name',
                        'class',
                        'created_at',
                        'updated_at',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>