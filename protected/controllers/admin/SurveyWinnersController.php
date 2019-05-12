<?php

class SurveyWinnersController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new SurveyWinners;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SurveyWinners']))
		{
			$model->attributes=$_POST['SurveyWinners'];

            if(isset($_FILES['SurveyWinners']['tmp_name']['winner_photo']) && !empty($_FILES['SurveyWinners']['tmp_name']['winner_photo'])){
                $file_name = time() + 1;
                $file_size =$_FILES['SurveyWinners']['size']['winner_photo'];
                $file_tmp =$_FILES['SurveyWinners']['tmp_name']['winner_photo'];
                $file_type=$_FILES['SurveyWinners']['type']['winner_photo'];
                $file_name_parts = explode('.',$_FILES['SurveyWinners']['name']['winner_photo']);
                $file_ext=strtolower(end($file_name_parts));

                $extensions= array("jpeg","jpg","png");

                if(in_array($file_ext,$extensions) === false){
                    $variable = "extension not allowed, please choose a JPEG or PNG file.";
                } else {
                    if($_SERVER['REMOTE_ADDR'] == '::1') {
                        $model->winner_photo = 'http://103.102.217.234'."/uploads/winner/".$file_name.".".$file_ext;
                    } else {
                        $model->winner_photo = Yii::app()->getBaseUrl(true)."/uploads/winner/".$file_name.".".$file_ext;
                    }
                    move_uploaded_file($file_tmp,__DIR__."/../../../uploads/winner/".$file_name.".".$file_ext);
                }

            }

            if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SurveyWinners']))
		{
			$model->attributes=$_POST['SurveyWinners'];

            if(isset($_FILES['SurveyWinners']['tmp_name']['winner_photo']) && !empty($_FILES['SurveyWinners']['tmp_name']['winner_photo'])){
                $file_name = time() + 1;
                $file_size =$_FILES['SurveyWinners']['size']['winner_photo'];
                $file_tmp =$_FILES['SurveyWinners']['tmp_name']['winner_photo'];
                $file_type=$_FILES['SurveyWinners']['type']['winner_photo'];
                $file_name_parts = explode('.',$_FILES['SurveyWinners']['name']['winner_photo']);
                $file_ext=strtolower(end($file_name_parts));

                $extensions= array("jpeg","jpg","png");

                if(in_array($file_ext,$extensions) === false){
                    $variable = "extension not allowed, please choose a JPEG or PNG file.";
                } else {
                    if($_SERVER['REMOTE_ADDR'] == '::1') {
                        $model->winner_photo = 'http://103.102.217.234'."/uploads/winner/".$file_name.".".$file_ext;
                    } else {
                        $model->winner_photo = Yii::app()->getBaseUrl(true)."/uploads/winner/".$file_name.".".$file_ext;
                    }
                    move_uploaded_file($file_tmp,__DIR__."/../../../uploads/winner/".$file_name.".".$file_ext);
                }

            }

			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('SurveyWinners');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SurveyWinners('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SurveyWinners']))
			$model->attributes=$_GET['SurveyWinners'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SurveyWinners the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SurveyWinners::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SurveyWinners $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='survey-winners-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
