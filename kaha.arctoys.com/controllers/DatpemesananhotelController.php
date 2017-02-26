<?php

namespace app\controllers;

use Yii;
use app\models\Datpemesananhotel;
use app\models\DatpemesananhotelSearch;
use app\models\Datpemesanan;
use app\models\DatpemesananSearch;
use app\models\datuser;
use app\models\refkamar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DatpemesananhotelController implements the CRUD actions for Datpemesananhotel model.
 */
class DatpemesananhotelController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Datpemesananhotel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DatpemesananhotelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout = 'main-backend';

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	public function actionDetpesanhotel($id)
    {
		$model = $this->findModelDatpemesanan($id);
		
        return $this->render('detpesanhotel', [
            'model' => $model,
        ]);
    }

	public function actionLaporanPemesananHotel()
    {
        $searchModel = new DatpemesananhotelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout = 'main-backend';

        return $this->render('../laporanpemesananhotel/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Datpemesananhotel model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = 'main-backend';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Datpemesananhotel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Datpemesananhotel();
        $this->layout = 'main-backend';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->KDPESAN]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Datpemesananhotel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $this->layout = 'main-backend';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->KDPESAN]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Datpemesananhotel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $this->layout = 'main-backend';

        return $this->redirect(['index']);
    }

    /**
     * Finds the Datpemesananhotel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Datpemesananhotel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Datpemesananhotel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	protected function findModelDatpemesanan($id)
    {
        if (($model = Datpemesanan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
