<?php

/**
 * This is the model class for table "tbl_subscription_plan".
 *
 * The followings are the available columns in table 'tbl_subscription_plan':
 * @property integer $id
 * @property integer $user_id
 * @property integer $estore_id
 * @property integer $plan_type
 * @property integer $additional_service
 * @property integer $status
 * @property string $activation_date
 * @property string $expiration_date
 * @property string $create_date
 */
class Subscription_plan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_subscription_plan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, plan_type, create_date', 'required'),
			array('user_id, estore_id, plan_type, additional_service, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, estore_id, plan_type, additional_service, status, activation_date, expiration_date, create_date', 'safe', 'on'=>'search'),
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
			'estore_id' => 'Estore',
			'plan_type' => 'Plan Type',
			'additional_service' => 'Additional Service',
			'status' => 'Status',
			'activation_date' => 'Activation Date',
			'expiration_date' => 'Expiration Date',
			'create_date' => 'Create Date',
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

		$criteria->compare('estore_id',$this->estore_id);

		$criteria->compare('plan_type',$this->plan_type);

		$criteria->compare('additional_service',$this->additional_service);

		$criteria->compare('status',$this->status);

		$criteria->compare('activation_date',$this->activation_date,true);

		$criteria->compare('expiration_date',$this->expiration_date,true);

		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider('Subscription_plan', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Subscription_plan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}