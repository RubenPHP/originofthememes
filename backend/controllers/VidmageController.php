<?php

namespace backend\controllers;

use Yii;
use common\models\Vidmage;
use common\models\VidmageSearch;
use common\models\VidmageCategory;
use yii\web\Controller;
use common\models\User;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use dmstr\bootstrap\Tabs;

/**
 * VidmageController implements the CRUD actions for Vidmage model.
 */
class VidmageController extends Controller
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
	 * Lists all Vidmage models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel  = new VidmageSearch;
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
	 * Displays a single Vidmage model.
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
	 * Creates a new Vidmage model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Vidmage;
        $model->loadDefaultValues();

		try {
            if ($model->load($_POST) && $model->save()) {
                $post = Yii::$app->request->post();
                $postVidmageCategories = !empty($post['vidmageCategories']) ? $post['vidmageCategories'] : [];
                $postVidmageAuthors = !empty($post['vidmageAuthors']) ? $post['vidmageAuthors'] : [];
                $postVidmageTags = !empty($post['vidmageTags']) ? $post['vidmageTags'] : [];
                $postVidmageMemes = !empty($post['vidmageMemes']) ? $post['vidmageMemes'] : [];

                $model->saveManyCategories($postVidmageCategories);
                $model->saveManyAuthors($postVidmageAuthors);
                $model->saveManyTags($postVidmageTags);
                $model->saveManyMemes($postVidmageMemes);

                return $this->redirect(['update', 'id'=>$model->id]);
            } elseif (!\Yii::$app->request->isPost) {
                $model->load($_GET);
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            $model->addError('_exception', $msg);
		}
        return $this->render('create', compact('model'));
	}

	/**
	 * Updates an existing Vidmage model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);
		if ($model->load($_POST) && $model->save()) {
            $post = Yii::$app->request->post();

            $postVidmageCategories = !empty($post['vidmageCategories']) ? $post['vidmageCategories'] : [];
            $postVidmageAuthors = !empty($post['vidmageAuthors']) ? $post['vidmageAuthors'] : [];
            $postVidmageTags = !empty($post['vidmageTags']) ? $post['vidmageTags'] : [];
            $postVidmageMemes = !empty($post['vidmageMemes']) ? $post['vidmageMemes'] : [];

            $vidmageCategoriesArray = ArrayHelper::getColumn($model->vidmageCategories, 'category_id');
            $vidmageAuthorsArray = ArrayHelper::getColumn($model->vidmageAuthors, 'author_id');
            $vidmageTagsArray = ArrayHelper::getColumn($model->vidmageTags, 'tag_id');
            $vidmageMemesArray = ArrayHelper::getColumn($model->memeVidmages, 'meme_id');

            $categoriesToRemove = array_diff($vidmageCategoriesArray, $postVidmageCategories);
            $categoriesToAdd = array_diff($postVidmageCategories, $vidmageCategoriesArray);
            $authorsToRemove = array_diff($vidmageAuthorsArray, $postVidmageAuthors);
            $authorsToAdd = array_diff($postVidmageAuthors, $vidmageAuthorsArray);
            $tagsToRemove = array_diff($vidmageTagsArray, $postVidmageTags);
            $tagsToAdd = array_diff($postVidmageTags, $vidmageTagsArray);
            $memesToRemove = array_diff($vidmageMemesArray, $postVidmageMemes);
            $memesToAdd = array_diff($postVidmageMemes, $vidmageMemesArray);

            $model->deleteManyCategories($categoriesToRemove);
            $model->saveManyCategories($categoriesToAdd);
            $model->deleteManyAuthors($authorsToRemove);
            $model->saveManyAuthors($authorsToAdd);
            $model->deleteManyTags($tagsToRemove);
            $model->saveManyTags($tagsToAdd);
            $model->deleteManyMemes($memesToRemove);
            $model->saveManyMemes($memesToAdd);

            return $this->refresh();
            //return $this->redirect(Url::previous());
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing Vidmage model.
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
	 * Finds the Vidmage model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Vidmage the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Vidmage::findOne($id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
