<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DatpemesananhotelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="datpemesananhotel-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'KDPESAN') ?>

    <?= $form->field($model, 'KDBOOKING') ?>

    <?= $form->field($model, 'USERID') ?>

    <?= $form->field($model, 'TGLPESAN') ?>

    <?= $form->field($model, 'TGLKONFIRMASI') ?>

    <?php // echo $form->field($model, 'HOTELID') ?>

    <?php // echo $form->field($model, 'TOTALHRG') ?>

    <?php // echo $form->field($model, 'CARABYR') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
