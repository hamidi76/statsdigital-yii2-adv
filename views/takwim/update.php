<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Takwim */

$this->title = 'Update Takwim: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Takwims', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="takwim-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
