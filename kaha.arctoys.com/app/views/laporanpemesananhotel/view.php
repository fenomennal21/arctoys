<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Datpemesananhotel */

$this->title = $model->KDPESAN;
$this->params['breadcrumbs'][] = ['label' => 'Datpemesananhotels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datpemesananhotel-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->KDPESAN], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->KDPESAN], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'KDPESAN',
            'KDBOOKING',
            'USERID',
            'TGLPESAN',
            'TGLKONFIRMASI',
            'HOTELID',
            'TOTALHRG',
            'CARABYR',
        ],
    ]) ?>

</div>
