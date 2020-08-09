<?php

namespace app\controllers;

use app\models\Aretes;
use app\models\Brucelosis;
use app\models\BrucelosisAretes;
use app\models\Razas;
use app\models\Resultados;
use app\models\TipoPrueba;
use app\models\Tuberculosis;
use app\models\TuberculosisAretes;
use app\models\Upp;
use Yii;
use app\models\Consultas;
use app\models\search\ConsultasSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ConsultasController implements the CRUD actions for Consultas model.
 */
class ConsultasController extends Controller
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
     * Lists all Consultas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConsultasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Consultas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Consultas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Consultas();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->p10_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Consultas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->p10_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Consultas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Consultas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Consultas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Consultas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionTb($valor){
        $dictamen = Tuberculosis::find()->where('p03_folio=:numero', [':numero'=>$valor])->one();

        //Consulta
        $consulta = new Consultas();
        $consulta->p10_usuAlta=Yii::$app->user->getId();
        $consulta->p10_tipo='0';
        $consulta->p10_valor=$valor;
        $consulta->save();

        if($dictamen) {
            $tipodeprueba=TipoPrueba::find()->where('c08_id=:cc', [':cc'=>$dictamen->p03_tipoPrueba])->one();

            $arr[0] = $tipodeprueba->c08_descripcion;
            $unidad = Upp::find()->where('r01_id=:numero', [':numero'=>$dictamen->r01_id])->one();
            $arr[1] = $unidad->r01_clave;
            $arr[2] = TuberculosisAretes::find()->where('p03_tb=:numero', [':numero'=>$dictamen->p03_id])->count();;
            $arr[3] = $dictamen->p03_id;
        }else{
            $arr[0] ="";
            $arr[1] ="";
            $arr[2] ="";
            $arr[3] ="";
        }
        return json_encode($arr);
    }


    public function actionBr($valor){
        $dictamen = Brucelosis::find()->where('p03_folio=:numero', [':numero'=>$valor])->one();
        //Consulta
        $consulta = new Consultas();
        $consulta->p10_usuAlta=Yii::$app->user->getId();
        $consulta->p10_tipo='1';
        $consulta->p10_valor=$valor;
        $consulta->save();

        if($dictamen) {
            $tipodeprueba=TipoPrueba::find()->where('c08_id=:cc', [':cc'=>$dictamen->p03_tipoPrueba])->one();

            $arr[0] = $tipodeprueba->c08_descripcion;
            $unidad = Upp::find()->where('r01_id=:numero', [':numero'=>$dictamen->r01_id])->one();
            $arr[1] = $unidad->r01_clave;
            $arr[2] = BrucelosisAretes::find()->where('p03_br=:numero', [':numero'=>$dictamen->p03_id])->count();;
            $arr[3] = $dictamen->p03_id;
        }else{
            $arr[0] ="";
            $arr[1] ="";
            $arr[2] ="";
            $arr[3] ="";
        }
        return json_encode($arr);
    }

    public function actionTbarete($id, $arete){
        $arete = Aretes::find()->where('r02_numero=:numero', [':numero'=>$arete])->one();

        if($arete){
            $aretedictamen = TuberculosisAretes::find()->where('r02_id=:numero', [':numero'=>$arete->r02_id])->andWhere('p03_tb=:n', [':n'=>$id])->one();

            if($aretedictamen) {
                $res = Resultados::find()->where('c13_id=:numero', [':numero'=>$aretedictamen->r06_diagnostico])->one();
                $arr[0] = $res->c13_descrip;
            }else{
                $arr[0] ="";
            }
        }else{
            $arr[0] ="";
        }

        return json_encode($arr);
    }

    public function actionBrarete($id, $arete){
        $arete = Aretes::find()->where('r02_numero=:numero', [':numero'=>$arete])->one();

        if($arete){
            $aretedictamen = BrucelosisAretes::find()->where('r02_id=:numero', [':numero'=>$arete->r02_id])->andWhere('p03_br=:n', [':n'=>$id])->one();

            if($aretedictamen) {
                $res = Resultados::find()->where('c13_id=:numero', [':numero'=>$aretedictamen->r07_resultado])->one();
                $arr[0] = $res->c13_descrip;
            }else{
                $arr[0] ="";
            }
        }else{
            $arr[0] ="";
        }

        return json_encode($arr);
    }

}
