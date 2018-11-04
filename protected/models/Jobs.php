<?php

/**
 * This is the model class for table "tbl_jobs".
 *
 * The followings are the available columns in table 'tbl_jobs':
 * @property integer $id
 * @property string $title
 * @property integer $vacancy
 * @property string $job_category
 * @property string $description
 * @property string $educational_req
 * @property string $experiment_req
 * @property string $salary
 * @property string $deadline
 * @property string $job_type
 * @property string $additional
 * @property string $job_req
 * @property string $job_location
 * @property string $create_date
 * @property string $update_date
 * @property integer $active
 */
class Jobs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_jobs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, job_category, description, salary, deadline, job_type, job_location, create_date', 'required'),
			array('vacancy, active', 'numerical', 'integerOnly'=>true),
			array('salary, job_type, job_location', 'length', 'max'=>255),
			array('educational_req, experiment_req, additional, job_req, update_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, vacancy, job_category, description, educational_req, experiment_req, salary, deadline, job_type, additional, job_req, job_location, create_date, update_date, active', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'vacancy' => 'Vacancy',
			'job_category' => 'Job Category',
			'description' => 'Description',
			'educational_req' => 'Educational Requirement',
			'experiment_req' => 'Experience Requirement',
			'salary' => 'Salary',
			'deadline' => 'Deadline',
			'job_type' => 'Job Type',
			'additional' => 'Additional',
			'job_req' => 'Job Requirement',
			'job_location' => 'Job Location',
			'create_date' => 'Create Date',
			'update_date' => 'Update Date',
			'active' => 'Active',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('vacancy',$this->vacancy);
		$criteria->compare('job_category',$this->job_category,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('educational_req',$this->educational_req,true);
		$criteria->compare('experiment_req',$this->experiment_req,true);
		$criteria->compare('salary',$this->salary,true);
		$criteria->compare('deadline',$this->deadline,true);
		$criteria->compare('job_type',$this->job_type,true);
		$criteria->compare('additional',$this->additional,true);
		$criteria->compare('job_req',$this->job_req,true);
		$criteria->compare('job_location',$this->job_location,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Jobs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
