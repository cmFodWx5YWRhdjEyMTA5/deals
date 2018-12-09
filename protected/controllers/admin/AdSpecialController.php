<?php

class AdSpecialController extends Controller
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
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
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
		$model=new AdSpecial;
		$country_details = Generic::checkForStoredCountry();

		if(isset($_POST['AdSpecial']))
		{

			$file_name = time() + 1;
      		$file_size =$_FILES['AdSpecial']['size']['banner_image'];
      		$file_tmp =$_FILES['AdSpecial']['tmp_name']['banner_image'];
      		$file_type=$_FILES['AdSpecial']['type']['banner_image'];
      		$file_name_parts = explode('.',$_FILES['AdSpecial']['name']['banner_image']);
      		$file_ext=strtolower(end($file_name_parts));
      
      		$expensions= array("jpeg","jpg","png");

      		if(in_array($file_ext,$expensions) === false){
		        $variable = "extension not allowed, please choose a JPEG or PNG file.";
		    } else {
		    	$model->attributes=$_POST['AdSpecial'];

				$model->banner_image = Yii::app()->getBaseUrl(true)."/uploads/".$file_name.".".$file_ext;
				move_uploaded_file($file_tmp,__DIR__."/../../../uploads/".$file_name.".".$file_ext);
				$model->create_date=date('y-m-d');
				$model->country_code = 'BD';
				if($model->save())
					$this->redirect(array('view','id'=>$model->id));
			    }
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

		if(isset($_POST['AdSpecial']))
		{

			$old_image_name = $model->banner_image;

			$model->attributes=$_POST['AdSpecial'];
			
			$file_name = time() + 1;
			$file_size =$_FILES['AdSpecial']['size']['banner_image'];
      		$file_tmp =$_FILES['AdSpecial']['tmp_name']['banner_image'];
      		$file_type=$_FILES['AdSpecial']['type']['banner_image'];
      		$file_name_parts = explode('.',$_FILES['AdSpecial']['name']['banner_image']);
      		$file_ext=strtolower(end($file_name_parts));

      		$new_file_name = Yii::app()->getBaseUrl(true)."/uploads/".$file_name.".".$file_ext;

      		$expensions= array("jpeg","jpg","png");
      		$model->banner_image = $new_file_name;
			if(empty($file_ext)){
				$model->banner_image = $old_image_name;
			}
			if(in_array($file_ext,$expensions) === false){
		        $variable = "extension not allowed, please choose a JPEG or PNG file.";
		    } else {
				move_uploaded_file($file_tmp,__DIR__."/../../../uploads/".$file_name.".".$file_ext);
				$model->update_date=date('y-m-d');
				if($model->save())
					$this->redirect(array('view','id'=>$model->id));
			}
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
		$dataProvider=new CActiveDataProvider('AdSpecial');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AdSpecial('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AdSpecial']))
			$model->attributes=$_GET['AdSpecial'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AdSpecial the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AdSpecial::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AdSpecial $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ad-special-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}



}
