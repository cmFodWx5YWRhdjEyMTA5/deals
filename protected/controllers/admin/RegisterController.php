<?php

class RegisterController extends Controller
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
				'actions'=>array('index','view','sendNotification','GetUsersOfLocation'),
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
		$division_array = $district_array = $thana_array = $division = $district = $thana = [];
		$user_details = Register::model()->findByPk($id);
		
		if($user_details->register_type == 'business'){
			$user_criteria = new CDbCriteria();
			$user_criteria->condition = 'user_id = :user_id';
			$user_criteria->params = array(':user_id' => $id);
			$user_thana_mapping = Registered_user_location::model()->findAll($user_criteria);
			
			foreach ($user_thana_mapping as $single_mapping) {
				$division_array[] = $single_mapping->division_id;
				$district_array[] = $single_mapping->district_id;
				$thana_array[] = $single_mapping->thana_id;
				
			}

			$division = Division::model()->findAllByAttributes(['division_id' => array_unique($division_array)]);
			$district = District::model()->findAllByAttributes(['district_id' => array_unique($district_array)]);
			
			$thana = Thana::model()->findAllByAttributes(['district_id' => array_unique($district_array),'thana_id' => array_unique($thana_array)]);

			$division = array_map(function($item){
				return $item->division;
			}, $division);

			$district = array_map(function($item){
				return $item->district;
			}, $district);
			$thana = array_map(function($item){
				return $item->thana;
			}, $thana);
		}

		//Generic::_setTrace($division);
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'division' => $division,
			'district' => $district,
			'thana' => $thana,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Register;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Register']))
		{
			$model->attributes=$_POST['Register'];
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

		if(isset($_POST['Register']))
		{
			$model->attributes=$_POST['Register'];
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
		$dataProvider=new CActiveDataProvider('Register');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Register('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Register']))
			$model->attributes=$_GET['Register'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Register the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Register::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/*
	 * send notification to a registered user
	 */
	public function actionSendNotification(){

		$register_model = new Register();
		$criteria=new CDbCriteria;
		$criteria->select = 'district';
		$all_location = Register::model()->findAll($criteria);
		$message = '';
		$create_time = new \DateTime();

		if(isset($_POST['Register']))
		{
			$receiver = $_POST['Register']['district'];
			$user_id = isset($_POST['Register']['select_user']) ? $_POST['Register']['select_user'] : 0;
			$details = $_POST['Register']['notification_details'];
			$short_description = $_POST['Register']['notification_short_desc'];
			if($user_id) {
				foreach ($user_id as $single_id) {

					$notification_alert = new Notification_alert();
					$notification_alert->receiver_id = $single_id;
					$notification_alert->short_desc = $short_description;
					$notification_alert->details = $details;
					$notification_alert->seen = 0;
					$notification_alert->create_date = $create_time->format('Y-m-d H:i:s');

					if ($notification_alert->save()) {
						$message = '<div class="success">Notification have been sent successfully</div>';
					} else {
						$message = '<div class="error">Notification send error</div>';
					}
				}
			} else {
				$message = '<div class="error">Notification send error. Please select an user</div>';
			}

		}

		$location = array();
		$location[0] = 'Select Location';
		foreach($all_location as $loc){
			if(!in_array($loc->district,$location)) {
				$location[$loc->district] = $loc->district;
			}
		}

		$this->render('notification',array(
			'model_register' => $register_model,
			'location' => $location,
			'message' => $message
		));
	}

	/*
	 * return all ads of the user
	 */
	public function actionGetUsersOfLocation(){
		$location_id = Yii::app()->request->getParam('location_id');
		$current_date = new \DateTime();
		$criteria=new CDbCriteria;
		$criteria->select = 'id,user_name';
		$criteria->condition = 'district = :district';
		$criteria->params = array(':district' => $location_id);
		$all_users = Register::model()->findAll($criteria);

		$ad_block = '';
		foreach($all_users as $user){
			$ad_block .= '<option value="'.$user->id.'">'.$user->user_name.'</option>';
		}

		$response['ad_block'] = $ad_block;
		echo json_encode($response);
	}

	/**
	 * Performs the AJAX validation.
	 * @param Register $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
