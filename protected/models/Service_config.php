<?php

/**
 * This is the model class for table "tbl_service_config".
 *
 * The followings are the available columns in table 'tbl_service_config':
 * @property integer $id
 * @property integer $request_type
 * @property string $name
 * @property integer $status
 * @property string $price
 * @property string $duration
 * @property string $others
 * @property string $create_date
 * @property string $expire_date
 */
class Service_config extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_service_config';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('request_type, name, status, create_date', 'required'),
			array('request_type, status', 'numerical', 'integerOnly'=>true),
			array('name, duration, others', 'length', 'max'=>255),
			array('price', 'length', 'max'=>10),
			array('expire_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, request_type, name, status, price, duration, others, create_date, expire_date', 'safe', 'on'=>'search'),
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
			'request_type' => 'Request Type',
			'name' => 'Name',
			'status' => 'Status',
			'price' => 'Price',
			'duration' => 'Duration',
			'others' => 'Others',
			'create_date' => 'Create Date',
			'expire_date' => 'Expire Date',
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

		$criteria->compare('request_type',$this->request_type);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('status',$this->status);

		$criteria->compare('price',$this->price,true);

		$criteria->compare('duration',$this->duration,true);

		$criteria->compare('others',$this->others,true);

		$criteria->compare('create_date',$this->create_date,true);

		$criteria->compare('expire_date',$this->expire_date,true);

		return new CActiveDataProvider('Service_config', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Service_config the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}