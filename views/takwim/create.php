<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Takwim */

$this->title = 'Create Takwim';
$this->params['breadcrumbs'][] = ['label' => 'Takwims', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="takwim-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
