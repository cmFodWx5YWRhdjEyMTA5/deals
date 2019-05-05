<?php

/**
 * This is the model class for table "tbl_service_request".
 *
 * The followings are the available columns in table 'tbl_service_request':
 * @property integer $id
 * @property integer $user_id
 * @property integer $plan_id
 * @property integer $request_type
 * @property integer $status
 * @property string $expire_date
 * @property string $create_date
 * @property string $update_date
 */
class Service_request extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_service_request';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, plan_id, request_type, status, create_date', 'required'),
			array('user_id, plan_id, request_type, status', 'numerical', 'integerOnly'=>true),
			array('expire_date, update_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, plan_id, request_type, status, expire_date, create_date, update_date', 'safe', 'on'=>'search'),
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
			'id' => 'Id',
			'user_id' => 'User',
			'plan_id' => 'Service Config',
			'request_type' => 'Request Type',
			'status' => 'Status',
			'expire_date' => 'Expire Date',
			'create_date' => 'Create Date',
			'update_date' => 'Update Date',
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
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('user_id',$this->user_id);

		$criteria->compare('plan_id',$this->plan_id);

		$criteria->compare('request_type',$this->request_type);

		$criteria->compare('status',$this->status);

		$criteria->compare('expire_date',$this->expire_date,true);

		$criteria->compare('create_date',$this->create_date,true);

		$criteria->compare('update_date',$this->update_date,true);

		return new CActiveDataProvider('Service_request', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Service_request the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}