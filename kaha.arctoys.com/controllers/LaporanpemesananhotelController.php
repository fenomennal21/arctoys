<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\SqlDataProvider;

use app\models\Laporanpemesananhotel;

class LaporanpemesananhotelController extends Controller{
    //put your code here
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex() {
		$this->layout = 'main-backend';

		$hasil_db = Laporanpemesananhotel::laporan_pemesanan_hotel();
		//$count = count($hasil_db);

        if (Yii::$app->request->isAjax)
		{
            return $this->renderPartial('index', [
            ]);
        }
		else
		{
            return $this->render('index', [

				'data'=>$hasil_db,
				//'count'=>$count,
				//'dataProvider' => $dataProvider,
            ]);
        }

    }

    
}
