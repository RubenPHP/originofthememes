<?php

namespace backend\controllers;

use Yii;
use common\models\Meme;
use common\models\MemeSearch;
use yii\web\Controller;
use common\models\User;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use dmstr\bootstrap\Tabs;

/**
 * MemeController implements the CRUD actions for Meme model.
 */
class MemeController extends Controller
{
    /**
     * @var boolean whether to enable CSRF validation for the actions in this controller.
     * CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
     */
    public $enableCsrfValidation = false;

	/**
     * Restrict access permissions to admin user and users with auth-item 'module-controller'
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
					'rules' => [
					[
                       'actions' => ['index', 'view', 'create', 'update', 'delete'],
                       'allow' => true,
                       'roles' => ['@'],
                       'matchCallback' => function ($rule, $action) {
                           return User::isUserAdmin(Yii::$app->user->identity->username);
                       }
                   ]
				]
			]
		];
	}

	/**
	 * Lists all Meme models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel  = new MemeSearch;
		$dataProvider = $searchModel->search($_GET);

		Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}

	/**
	 * Displays a single Meme model.
	 * @param integer $id
     *
	 * @return mixed
	 */
	public function actionView($id)
	{
        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember();
        Tabs::rememberActiveState();

        return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new Meme model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Meme;

		try {
            if ($model->load($_POST) && $model->save()) {
                $post = Yii::$app->request->post();
                $postOriginMemeVidmage = !empty($post['memeVidmageOrigin']) ? [$post['memeVidmageOrigin']] : [];
                $postMemeVidmages = !empty($post['memeVidmages']) ? $post['memeVidmages'] : [];

                $model->saveManyVidmages($postOriginMemeVidmage, true);
                $model->saveManyVidmages($postMemeVidmages);

                //return $this->redirect(Url::previous());
                return $this->redirect(['update', 'id'=>$model->id]);
            } elseif (!\Yii::$app->request->isPost) {
                $model->load($_GET);
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            $model->addError('_exception', $msg);
		}
        return $this->render('create', ['model' => $model]);
	}

	/**
	 * Updates an existing Meme model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);
        /*var_dump($model);
        var_dump($_POST);die;*/

		if ($model->load($_POST) && $model->save()) {
            $post = Yii::$app->request->post();
            $postMemeVidmages = !empty($post['memeVidmages']) ? $post['memeVidmages'] : [];

            $memeVidmagesArray = ArrayHelper::getColumn($model->notOriginMemeVidmages, 'vidmage_id');
            $memeVidmagesToRemove = array_diff($memeVidmagesArray, $postMemeVidmages);
            $memeVidmagesToAdd = array_diff($postMemeVidmages, $memeVidmagesArray);

            //var_dump($memeVidmagesArray);var_dump($memeVidmagesToRemove);var_dump($memeVidmagesToAdd);die;

            $model->updateOriginMemeVidmage($post['memeVidmageOrigin']);

            $model->deleteManyVidmages($memeVidmagesToRemove);
            $model->saveManyVidmages($memeVidmagesToAdd);

            //return $this->redirect(Url::previous());
            return $this->refresh();
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing Meme model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
        try {
            $this->findModel($id)->delete();
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            \Yii::$app->getSession()->setFlash('error', $msg);
            return $this->redirect(Url::previous());
        }

        // TODO: improve detection
        $isPivot = strstr('$id',',');
        if ($isPivot == true) {
            return $this->redirect(Url::previous());
        } elseif (isset(\Yii::$app->session['__crudReturnUrl']) && \Yii::$app->session['__crudReturnUrl'] != '/') {
			Url::remember(null);
			$url = \Yii::$app->session['__crudReturnUrl'];
			\Yii::$app->session['__crudReturnUrl'] = null;

			return $this->redirect($url);
        } else {
            return $this->redirect(['index']);
        }
	}

	/**
	 * Finds the Meme model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Meme the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Meme::findOne($id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
