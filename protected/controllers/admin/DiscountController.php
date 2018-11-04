<?php
set_time_limit(60);
ini_set('memory_limit', '128M');

require_once dirname(__FILE__) . "/../../components/simple_html_dom.php";

class DiscountController extends Controller
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
		$baseUrl = Yii::app()->basePath;
		$model=new Discount();

		if(isset($_POST['Discount']))
		{

			$model->attributes=$_POST['Discount'];

			$imageInstance = Generic::validateUploadImage($model,'images');

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
				$image = $_FILES['Discount']['tmp_name']['images'];
				$secondary_images = $_FILES['secondary_images']['tmp_name'];
				$secondary_images_name = $_FILES['secondary_images']['name'];
				$optional_images = $_FILES['optional_images']['tmp_name'];
				$optional_images_name = $_FILES['optional_images']['name'];

				$image_name = $imageName.".".$image_type;

				if($imageSaveName = $s3->putObjectFile($image,"ad-dwit-a",$image_name,S3::ACL_PUBLIC_READ)){
					$model->images = "http://ad-dwit-a.s3.amazonaws.com/".$image_name;

				}

				if(isset($secondary_images) && !empty($secondary_images)) {
					$secondary_image_array = array();
					$counter = 0;
					foreach ($secondary_images as $secondary_image){
						$secondaryImageName = time().strtolower(str_replace(' ','_',$secondary_images_name[$counter]));
						$secondary_image_name = $secondaryImageName;
						if($imageSaveName = $s3->putObjectFile($secondary_image,"ad-dwit-a",$secondary_image_name,S3::ACL_PUBLIC_READ)){
							$secondary_image_array[] = "http://ad-dwit-a.s3.amazonaws.com/".$secondary_image_name;
						}
						$counter++;
					}
					$model->secondary_images = json_encode($secondary_image_array);
				}

				if(isset($optional_images) && !empty($optional_images)) {
					$optional_images_array = array();
					$counter = 0;
					foreach ($optional_images as $optional_image){
						$optionalImageName = time().strtolower(str_replace(' ','_',$optional_images_name[$counter]));
						$optional_image_name = $optionalImageName;
						if($imageSaveName = $s3->putObjectFile($optional_image,"ad-dwit-a",$optional_image_name,S3::ACL_PUBLIC_READ)){
							$optional_images_array[] = "http://ad-dwit-a.s3.amazonaws.com/".$optional_image_name;
						}
						$counter++;
					}
					$model->optional_images = json_encode($optional_images_array);
				}
			}

			$str = $_FILES['Discount']['name']['page_alias'];
			if($str){
				$uploaded_images = $model->images;
				$title = $_POST['Discount']['title'];
				$banner_file = file_get_contents($_FILES['Discount']['tmp_name']['page_alias']);


				$modified_banner_file = str_replace("Rockmail, Multipurpose Email + Builder Access"," Promotional Banner | $title",$banner_file);
				$modified_banner_files = str_replace('src="images','src="/images',$modified_banner_file);
				$modified_banner_file_size = str_replace('<body style="margin:0; padding:0;">','<body style="padding:0;width: 900px;background: grey;margin:0 auto;">',$modified_banner_files);

				$html = str_get_html($modified_banner_file_size);
				$elements = array();
				foreach($html->find('table') as $element) {
					if(!empty($element->background))
						$elements[] = $element->background;

				}

				$modified_html = str_replace($elements[0], $uploaded_images, $modified_banner_file_size);

                $elements_secondary_images = array();

				foreach($html->find('span img.img_scale') as $element) {
					if(!empty($element->src))
					$elements_secondary_images[] =  $element->src;

				}

				$secondary_image = array_slice($elements_secondary_images,0,5);
				$optional_image_array = array_slice($elements_secondary_images,5,2);

				$max_count = count($secondary_image)-1;
				$counter = 0;
				foreach($secondary_image as $images){
					if($counter > $max_count)
						continue;
					$modified_html = str_replace($images, $secondary_image_array[$counter], $modified_html);
					$counter++;
				}


				$max_count_opt = count($optional_image_array)-1;
				$counters = 0;
				foreach($optional_image_array as $images){
					if($counters > $max_count_opt)
						continue;
					$modified_html = str_replace($images, $optional_images_array[$counters], $modified_html);
					$counters++;
				}


				$value = str_replace(".html","",$str);
				$model->page_content = $modified_html;
				$model->title = $title;
				$model->page_alias= $value;
			}

			$model->create_date=date('y-m-d');
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}


	public  function createDirectory($path){
		if (!file_exists($path)) {
			mkdir($path, 0777, true);
		}
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

		if(isset($_POST['Discount']))
		{
			$model->attributes=$_POST['Discount'];
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
		$dataProvider=new CActiveDataProvider('Discount');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Discount('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Discount']))
			$model->attributes=$_GET['Discount'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Discount the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Discount::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Discount $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='discount-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
