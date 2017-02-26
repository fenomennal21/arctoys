<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DatpemesananhotelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Datpemesananhotels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datpemesananhotel-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Datpemesananhotel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'KDPESAN',
            'KDBOOKING',
            'USERID',
            'TGLPESAN',
            'TGLKONFIRMASI',
            // 'HOTELID',
            // 'TOTALHRG',
            // 'CARABYR',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
