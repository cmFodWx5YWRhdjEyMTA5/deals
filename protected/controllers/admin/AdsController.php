<?php

class AdsController extends Controller
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
			array('allow',  // allow authenticated users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'admin' and 'delete' actions
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
		$base_url = Yii::app()->getBaseUrl(true);
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ads']))
		{
			$model->attributes=$_POST['Ads'];
			if(!$model->attributes['active']) {
				//$model->expire_date = NULL;
			}
			if($model->save())
			{
				if($model->active){
					//Generic::sendNotificationToUsers($model);
					$user_details = Register::model()->findByPk($model->user_id);
					
					$message = 'Your Ad has been approved. You can see it <a href="'.$base_url.'/ad?ad_id='.urlencode(base64_encode($model->id)).'&ad_type='.urlencode(base64_encode("ads")).'" target="_blank">here</a>';
					$message_for_business = 'A request has been approved. You can see it <a href="'.$base_url.'/ad?ad_id='.urlencode(base64_encode($model->id)).'&ad_type='.urlencode(base64_encode("ads")).'" target="_blank">here</a>';
					if($user_details->register_type == 'business'){
						$estore_criteria = new CDbCriteria();
        				$estore_criteria->condition = "user_id = :user_id";
        				$estore_criteria->params = array(':user_id'=>$user_details->id);
						$store_details = Estore::model()->findAll($estore_criteria);

						$message = 'Your Package has been approved. You can see it <a href="'.$base_url.'/isp/'.$store_details[0]->url_alias.'/package-details/'.$model->id.'" target="_blank">here</a>';
						$message_for_business = 'A request has been approved. You can see it <a href="'.$base_url.'/isp/'.$store_details[0]->url_alias.'/package-details/'.$model->id.'" target="_blank">here</a>';
					} else if($user_details->register_type == 'store'){
						$estore_criteria = new CDbCriteria();
        				$estore_criteria->condition = "user_id = :user_id";
        				$estore_criteria->params = array(':user_id'=>$user_details->id);
						$store_details = Estore::model()->findAll($estore_criteria);

						$message = 'Your Ad has been approved. You can see it <a href="'.$base_url.'/estore/'.$store_details[0]->url_alias.'/product-details/'.$model->id.'" target="_blank">here</a>';
						$message_for_business = 'A request has been approved. You can see it <a href="'.$base_url.'/estore/'.$store_details[0]->url_alias.'/product-details/'.$model->id.'" target="_blank">here</a>';
					}
					Generic::sendNotificationToAdOwner($model,$message);
					Generic::sendMailToAdOwner($model,$message);
					Generic::sendMailToBusiness($model,$message_for_business);
				}
				$this->redirect(array('view','id'=>$model->id));
			}
		}
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
		$model=new Ads;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ads']))
		{
			$model->attributes=$_POST['Ads'];
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

		if(isset($_POST['Ads']))
		{
			$model->attributes=$_POST['Ads'];
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
		$dataProvider=new CActiveDataProvider('Ads');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($status = 0)
	{
		//Generic::_setTrace($status);
		$model=new Ads('search');

		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ads']))
			$model->attributes=$_GET['Ads'];
		//Generic::_setTrace($model);
		$this->render('admin',array(
			'model'=>$model,
			'status' => $status
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Ads the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Ads::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Ads $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ads-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
