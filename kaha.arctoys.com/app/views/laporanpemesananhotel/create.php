<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Datpemesananhotel */

$this->title = 'Create Datpemesananhotel';
$this->params['breadcrumbs'][] = ['label' => 'Datpemesananhotels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datpemesananhotel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
