<?php

/**
 * This is the model class for table "isp_company_details".
 *
 * The followings are the available columns in table 'isp_company_details':
 * @property integer $id
 * @property integer $user_id
 * @property integer $no_of_thana
 * @property integer $ad_post_service
 * @property string $amount
 * @property integer $status
 * @property string $create_date
 * @property string $expire_date
 */
class ISP_details extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'isp_company_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, no_of_thana, amount, create_date, expire_date', 'required'),
			array('user_id, no_of_thana, status', 'numerical', 'integerOnly'=>true),
			array('amount', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, no_of_thana, ad_post_service, amount, status, create_date, expire_date', 'safe', 'on'=>'search'),
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
			'no_of_thana' => 'No Of Thana',
			'ad_post_service' => 'Ad post service',
			'amount' => 'Amount',
			'status' => 'Status',
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

		$criteria->compare('user_id',$this->user_id);

		$criteria->compare('no_of_thana',$this->no_of_thana);

		$criteria->compare('ad_post_service',$this->ad_post_service);

		$criteria->compare('amount',$this->amount,true);

		$criteria->compare('status',$this->status);

		$criteria->compare('create_date',$this->create_date,true);

		$criteria->compare('expire_date',$this->expire_date,true);

		return new CActiveDataProvider('ISP_details', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return ISP_details the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}