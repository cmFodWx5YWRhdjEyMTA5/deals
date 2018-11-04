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

			$model->attributes=$_POST['AdSpecial'];

			$imageInstance = Generic::validateUploadImage($model,'banner_image');

			if($imageInstance){
				$imageName = time() + 1;
				if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIAIRWFUJGOJ46XGJYA');
				if (!defined('awsSecretKey')) define('awsSecretKey', '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');
				$s3 = new S3(awsAccessKey, awsSecretKey);
				$allowed_image_type = Generic::getAllowedImage();
				$image_type = $imageInstance->getExtensionName();
				if(!in_array($image_type, $allowed_image_type)){

					return 'Invalid image type';
				}
				$image = $_FILES['AdSpecial']['tmp_name']['banner_image'];
				//Generic::_setTrace($image);

				$image_name = $imageName.".".$image_type;


				//if($imageSaveName = Generic::uploadImage($imageInstance, $imageName,'topRightSide', $image_width, $image_height)){
					if($imageSaveName = $s3->putObjectFile($image,"ad-dwit-a",$image_name,S3::ACL_PUBLIC_READ)){
						$model->banner_image = "http://ad-dwit-a.s3.amazonaws.com/".$image_name;
				}
			}

			$str = $_FILES['AdSpecial']['name']['page_alias_ad_special'];

			if($str){
				$banner_file = file_get_contents($_FILES['AdSpecial']['tmp_name']['page_alias_ad_special']);
				$value = str_replace(".html","",$str);
				$model->page_content = $banner_file;
				$model->page_alias_ad_special= $value;
			}
			$model->create_date=date('y-m-d');
			if($country_details){
				$model->country_code = $country_details->sortname;
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

		if(isset($_POST['AdSpecial']))
		{

			$old_image_name = $model->banner_image;
			$model->attributes=$_POST['AdSpecial'];
			$imageInstance = Generic::validateUploadImage($model,'banner_image');

			if($imageInstance){
				$imageName = time() + 1;
				if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIAIRWFUJGOJ46XGJYA');
				if (!defined('awsSecretKey')) define('awsSecretKey', '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');
				$s3 = new S3(awsAccessKey, awsSecretKey);
				$allowed_image_type = Generic::getAllowedImage();
				$image_type = $imageInstance->getExtensionName();
				if(!in_array($image_type, $allowed_image_type)){

					return 'Invalid image type';
				}
				$image = $_FILES['AdSpecial']['tmp_name']['banner_image'];
				//Generic::_setTrace($image);

				$image_name = $imageName.".".$image_type;

				if(!empty($model->banner_image)){
					$s3->deleteObject("ad-dwit-a",$old_image_name);
				}


				if($imageSaveName = $s3->putObjectFile($image,"ad-dwit-a",$image_name,S3::ACL_PUBLIC_READ)){
					$model->banner_image = "http://ad-dwit-a.s3.amazonaws.com/".$image_name;

				}
			}
			if(!trim($model->banner_image)){
				$model->banner_image = $old_image_name;
			}
			$model->update_date=date('y-m-d');
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
