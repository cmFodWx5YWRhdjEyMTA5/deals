<?php

class ServiceController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='service';


	public function actionIndex($service_url){

		$criteria = new CDbCriteria();
		$criteria->condition = 'url_alias = :url_alias and active = :active';
		$criteria->params = array(':url_alias' => $service_url,':active' => 1);
		$service_details = Service::model()->find($criteria);
		if(!$service_details){
			throw new CHttpException(404,'No Service found');
		}
		//Generic::_setTrace($service_details);

		$this->render('index',array(
			'base_url' => Yii::app()->getBaseUrl(true)
		));
	}
	public function actionShowEducationTemplate(){
		$this->render('education',array(
			'base_url' => Yii::app()->getBaseUrl(true)
		));
	}

	public function actionShowMedicalTemplate(){
		$this->render('medical',array(
			'base_url' => Yii::app()->getBaseUrl(true)
		));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
