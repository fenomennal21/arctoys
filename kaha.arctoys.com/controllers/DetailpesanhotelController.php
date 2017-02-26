<?php

namespace app\controllers;

use Yii;
use app\models\Datpemesananhotel;
use app\models\refKamar;
use app\models\DatUser;
use app\models\Detailpesanhotel;
use app\models\DetailpesanhotelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetailpesanhotelController implements the CRUD actions for Detailpesanhotel model.
 */
class DetailpesanhotelController extends Controller
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
     * Lists all Detailpesanhotel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DetailpesanhotelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout = 'main-backend';

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Detailpesanhotel model.
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
	public function actionDetailpesanhotel($id)
    {
		$model = $this->findModel($id);
		
        return $this->render('detailpesanhotel', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Detailpesanhotel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Detailpesanhotel();
        $this->layout = 'main-backend';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->DEATILID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Detailpesanhotel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $this->layout = 'main-backend';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->DEATILID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Detailpesanhotel model.
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
     * Finds the Detailpesanhotel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Detailpesanhotel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Detailpesanhotel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
