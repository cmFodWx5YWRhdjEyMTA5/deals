<?php

/**
 * This is the model class for table "tbl_register".
 *
 * The followings are the available columns in table 'tbl_register':
 * @property integer $id
 * @property string $register_type
 * @property string $user_name
 * @property string $email
 * @property string $password
 * @property string $designation
 * @property string $phone_number
 * @property string $user_token
 * @property string $image
 * @property string $enterprise_name
 * @property string $business_category_id
 * @property string $country
 * @property string $division
 * @property string $district
 * @property string $thana
 * @property string $package_type
 * @property string $address
 * @property string $create_date
 * @property string $update_date
 * @property string $oauth_token
 * @property integer $otp
 * @property string $otp_time
 * @property integer $user_status
 * @property string $referral_id
 * @property string $license_number
 * @property string $isp_type
 */
class Register extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_register';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('register_type, user_name, email, password, phone_number, user_token', 'required'),
			array('otp, user_status', 'numerical', 'integerOnly'=>true),
			array('register_type, user_name, email, password, designation, phone_number, user_token, image, enterprise_name, business_category_id, country, division, district,thana,package_type, address, create_date, update_date, referral_id', 'length', 'max'=>255),
			array('oauth_token, otp_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, register_type, user_name, email, password, designation, phone_number, user_token, image, enterprise_name, business_category_id, country, division, district,thana,package_type, address, create_date, update_date, oauth_token, otp, otp_time, user_status, referral_id, license_number, isp_type', 'safe', 'on'=>'search'),
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
			'register_type' => 'Register Type',
			'user_name' => 'User Name',
			'email' => 'Email',
			'password' => 'Password',
			'designation' => 'Designation',
			'phone_number' => 'Phone Number',
			'user_token' => 'User Token',
			'image' => 'Image',
			'enterprise_name' => 'Enterprise Name',
			'business_category_id' => 'Business Category',
			'country' => 'Country',
			'division' => 'Division',
			'district' => 'District',
                        'thana' => 'Thana',
                        'package_type' => 'Package Type',
			'address' => 'Address',
			'create_date' => 'Create Date',
			'update_date' => 'Update Date',
			'oauth_token' => 'Oauth Token',
			'otp' => 'Otp',
			'otp_time' => 'Otp Time',
			'user_status' => 'User Status',
			'referral_id' => 'Referral Id',
			'license_number' => 'License Number',
			'isp_type' => 'ISP Category Type'
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
		$criteria->compare('register_type',$this->register_type,true);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('designation',$this->designation,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('user_token',$this->user_token,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('enterprise_name',$this->enterprise_name,true);
		$criteria->compare('business_category_id',$this->business_category_id,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('division',$this->division,true);
		$criteria->compare('district',$this->district,true);
        $criteria->compare('thana',$this->thana,true);
        $criteria->compare('package_type',$this->package_type,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('oauth_token',$this->oauth_token,true);
		$criteria->compare('otp',$this->otp);
		$criteria->compare('otp_time',$this->otp_time,true);
		$criteria->compare('user_status',$this->user_status);
		$criteria->compare('referral_id',$this->referral_id);
		$criteria->compare('license_number',$this->license_number);
		$criteria->compare('isp_type',$this->isp_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'id DESC',
			)
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Register the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
