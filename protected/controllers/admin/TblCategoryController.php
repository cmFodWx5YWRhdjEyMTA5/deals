<?php

class TblCategoryController extends Controller
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
				'users'=>array('@'),
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
		$model=new TblCategory;

		if(isset($_POST['TblCategory']))
		{

			$model->attributes=$_POST['TblCategory'];
			if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIAIRWFUJGOJ46XGJYA');
			if (!defined('awsSecretKey')) define('awsSecretKey', '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');
			$s3 = new S3(awsAccessKey, awsSecretKey);
			$images = $_FILES['category_banner_image']['tmp_name'];
			$image_type = "jpg";
			if($images){
					  $image_array = array();
					  foreach ($images as $image){
						  $image_name = time() + 1;
						  $image_names = $image_name.".".$image_type;
						  if($imageSaveName = $s3->putObjectFile($image,"ad-dwit-a",$image_names,S3::ACL_PUBLIC_READ)){
							  $image_array[] = "http://ad-dwit-a.s3.amazonaws.com/".$image_names;
						  }
					  }

					  $model->category_banner_image = json_encode($image_array);
                  }


			if($model->save())
				$this->redirect(array('view','id'=>$model->category_id));
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

		if(isset($_POST['TblCategory']))
		{
			$old_image_name = $model->category_banner_image;
			$model->attributes=$_POST['TblCategory'];

			if($_FILES['category_banner_image']['tmp_name'][0]) {
				if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIAIRWFUJGOJ46XGJYA');
				if (!defined('awsSecretKey')) define('awsSecretKey', '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');
				$s3 = new S3(awsAccessKey, awsSecretKey);

				if (!empty($model->category_banner_image)) {
					$image_array = json_decode($old_image_name, true);
					foreach ($image_array as $image) {
						$s3->deleteObject("ad-dwit-a", $image);
					}
				}

				$images = $_FILES['category_banner_image']['tmp_name'];
				$image_type = "jpg";
				if ($images) {
					$image_array = array();
					foreach ($images as $image) {
						$image_name = time() + 1;
						$image_names = $image_name . "." . $image_type;
						if ($imageSaveName = $s3->putObjectFile($image, "ad-dwit-a", $image_names, S3::ACL_PUBLIC_READ)) {
							$image_array[] = "http://ad-dwit-a.s3.amazonaws.com/" . $image_names;
						}
					}

					$model->category_banner_image = json_encode($image_array);
				}

				if (!trim($model->category_banner_image)) {
					$model->category_banner_image = $old_image_name;
				}
			}
			if($model->update())
				$this->redirect(array('view','id'=>$model->category_id));

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
		$dataProvider=new CActiveDataProvider('TblCategory');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblCategory('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblCategory']))
			$model->attributes=$_GET['TblCategory'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TblCategory the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TblCategory::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TblCategory $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-category-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
