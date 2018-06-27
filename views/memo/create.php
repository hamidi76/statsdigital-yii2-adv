<?php
/**
 * Created by PhpStorm.
 * User: far-east
 * Date: 26/06/2018
 * Time: 4:44 PM
 */

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

?>

<div class="memo-create">

    <h3>Add New Memo</h3>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'memo')->textInput() ?>


    <?= $form->field($model, 'memo_owner')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Add'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>