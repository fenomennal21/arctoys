<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Datpemesananhotel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="datpemesananhotel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'KDPESAN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KDBOOKING')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'USERID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TGLPESAN')->textInput() ?>

    <?= $form->field($model, 'HOTELID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TOTALHRG')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CARABYR')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
