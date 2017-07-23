<?php

namespace app\modules\product\controllers\admin;

use Yii;
use app\modules\product\models\admin\Product;
use app\modules\product\models\admin\ProductSearch;
use app\modules\product\models\admin\Pm;
use app\modules\product\models\admin\Pap;
use app\modules\product\models\admin\Sp;
use app\modules\product\models\admin\Papr;
use app\modules\product\models\admin\Pop;
use app\modules\product\models\admin\Op;
use app\modules\product\models\admin\Lp;
use app\modules\product\models\admin\Pma;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;
use app\modules\product\models\ProductAggregator;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
//        $model_file = 
        $dataProviderPm = new ActiveDataProvider(['query' => $model->getPms()->with('pmMaterial')]);
        $dataProviderPap = new ActiveDataProvider(['query' => $model->getPaps()->with('papPack')]);
        $dataProviderPapr = new ActiveDataProvider(['query' => $model->getPaprs()->with('paprParameter')]);
        $dataProviderSp = new ActiveDataProvider(['query' => $model->getSps()->with('spSolution')]);
        $dataProviderPop = new ActiveDataProvider(['query' => $model->getPops()->with('popPosition')]);
        $dataProviderOp = new ActiveDataProvider(['query' => $model->getOps()->with('opOther')]);
        $dataProviderLp = new ActiveDataProvider(['query' => $model->getLps()->with('lpLoss')]);
        $dataProviderPma = new ActiveDataProvider(['query' => $model->getPmas()->with('pmaMaterial')]);
        return $this->render('view', [
                    'model' => $model,
                    'dataProviderPm' => $dataProviderPm,
                    'dataProviderPap' => $dataProviderPap,
                    'dataProviderPapr' => $dataProviderPapr,
                    'dataProviderSp' => $dataProviderSp,
                    'dataProviderPop' => $dataProviderPop,
                    'dataProviderOp' => $dataProviderOp,
                    'dataProviderLp' => $dataProviderLp,
                    'dataProviderPma' => $dataProviderPma,
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Product();
        if ($model->load(Yii::$app->request->post())) {
            $model->product_date = date('Y-m-d H:i:s');
            $model->product_update = date('Y-m-d H:i:s');
            $model->product_tech_map = UploadedFile::getInstance($model, 'product_tech_map');
            $model->product_tech_desc = UploadedFile::getInstance($model, 'product_tech_desc');
            if ($model->save() && $model->upload()) {
                $model->save(); //так надо чтобы получить id
                return $this->redirect(['view', 'id' => $model->product_id]);
            } else {
                return $this->render('create', [
                            'model' => $model,
                ]);
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->product_update = date('Y-m-d H:i:s');
            $model->product_tech_map = UploadedFile::getInstance($model, 'product_tech_map');
            $model->product_tech_desc = UploadedFile::getInstance($model, 'product_tech_desc');
            if ($model->upload() && $model->save()) {
                return $this->redirect(['view', 'id' => $model->product_id]);
            } else {
                return $this->render('create', [
                            'model' => $model,
                ]);
            }
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $transaction = Yii::$app->db->beginTransaction();
        $model = $this->findModel($id);
        try {
            Pm::deleteAll('pm_product_id = :id', [':id' => $id]);
            Pma::deleteAll('pma_product_id = :id', [':id' => $id]);
            Pap::deleteAll('pap_product_id = :id', [':id' => $id]);
            Sp::deleteAll('sp_product_id = :id', [':id' => $id]);
            Papr::deleteAll('papr_product_id = :id', [':id' => $id]);
            Pop::deleteAll('pop_product_id = :id', [':id' => $id]);
            Op::deleteAll('op_product_id = :id', [':id' => $id]);
            Lp::deleteAll('lp_product_id = :id', [':id' => $id]);
            $model->delete();
            $transaction->commit();
        } catch (Exception $e) {
            $transaction->rollback();
            return $this->render('view', ['model' => $model]);
        }
        return $this->redirect(['index']);
    }

    public function actionClone($id) {
        $product = new Product();
        $model = $product->findOne($id);
        unset($model->product_tech_map);
        unset($model->product_tech_desc);
        $productAggregator = new ProductAggregator($model);
        unset($model->product_id);
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $newProduct = $this->copy($model, $product);
            $newProduct->product_title .= ' (копия)';
            $newProduct->product_date = date('Y-m-d H:i:s');
            $newProduct->product_update = date('Y-m-d H:i:s');
            $newProduct->save();

            $this->copyMaterials($productAggregator->materials, $newProduct->product_id);
            $this->copyAdditionalMaterials($productAggregator->materialsAdditional, $newProduct->product_id);
            $this->copyPacks($productAggregator->packs, $newProduct->product_id);
            $this->copyPositions($productAggregator->positions, $newProduct->product_id);
            $this->copyExpenses($productAggregator->expenses, $newProduct->product_id);
            $this->copyLosses($productAggregator->losses, $newProduct->product_id);
            $this->copyParameters($productAggregator->parameters, $newProduct->product_id);
            $this->copySolutions($productAggregator->solutions, $newProduct->product_id);

            $transaction->commit();
        } catch (Exception $e) {
            $transaction->rollback();
            $this->actionIndex();
        }
        return $this->redirect(['view', 'id' => $newProduct->product_id]);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    private function copy($oldModel, $newModel) {
        $data = $oldModel->toArray();
        foreach ($data as $key => $value) {
            $newModel->$key = $value;
        }
        return $newModel;
    }

    private function copyMaterials($materials, $id) {
        if (!empty($materials)) {
            foreach ($materials as $maretial) {
                $productMaterial = new Pm();
                $newProductMaterial = $this->copy($maretial, $productMaterial);
                unset($newProductMaterial->pm_id);
                $newProductMaterial->pm_product_id = $id;
                $newProductMaterial->save();
            }
        }
    }

    private function copyAdditionalMaterials($materials, $id) {
        if (!empty($materials)) {
            foreach ($materials as $maretial) {
                $productMaterial = new Pma();
                $newProductMaterial = $this->copy($maretial, $productMaterial);
                unset($newProductMaterial->pma_id);
                $newProductMaterial->pma_product_id = $id;
                $newProductMaterial->save();
            }
        }
    }
    
    private function copyPacks($packs, $id) {
        if (!empty($packs)) {
            foreach ($packs as $pack) {
                $productPack = new Pap();
                $newProductPack = $this->copy($pack, $productPack);
                unset($newProductPack->pap_id);
                $newProductPack->pap_product_id = $id;
                $newProductPack->save();
            }
        }
    }

    private function copyPositions($positions, $id) {
        if (!empty($positions)) {
            foreach ($positions as $position) {
                $productPosition = new Pop();
                $newProductPosition = $this->copy($position, $productPosition);
                unset($newProductPosition->pop_id);
                $newProductPosition->pop_product_id = $id;
                $newProductPosition->save();
            }
        }
    }
    
    private function copyExpenses($expenses, $id) {
        if (!empty($expenses)) {
            foreach ($expenses as $expense) {
                $productExpense = new Op();
                $newProductExpense = $this->copy($expense, $productExpense);
                unset($newProductExpense->op_id);
                $newProductExpense->op_product_id = $id;
                $newProductExpense->save();
            }
        }
    }
    
    private function copyLosses($losses, $id) {
        if (!empty($losses)) {
            foreach ($losses as $loss) {
                $productLoss = new Lp();
                $newProductLoss = $this->copy($loss, $productLoss);
                unset($newProductLoss->lp_id);
                $newProductLoss->lp_product_id = $id;
                $newProductLoss->save();
            }
        }
    }
    
    private function copyParameters($parameters, $id) {
        if (!empty($parameters)) {
            foreach ($parameters as $parameter) {
                $productParameter = new Papr();
                $newProductParameter = $this->copy($parameter, $productParameter);
                unset($newProductParameter->papr_id);
                $newProductParameter->papr_product_id = $id;
                $newProductParameter->save();
            }
        }
    }
    
    private function copySolutions($solutions, $id) {
        if (!empty($solutions)) {
            foreach ($solutions as $solution) {
                $productSolution = new Sp();
                $newProductSolution = $this->copy($solution, $productSolution);
                unset($newProductSolution->sp_id);
                $newProductSolution->sp_product_id = $id;
                $newProductSolution->save();
            }
        }
    }

}
