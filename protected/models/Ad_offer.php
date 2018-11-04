<?php

/**
 * This is the model class for table "tbl_ad_offer".
 *
 * The followings are the available columns in table 'tbl_ad_offer':
 * @property integer $id
 * @property integer $ad_id
 * @property string $offered_price
 * @property integer $offered_by
 * @property string $ip_address
 * @property string $create_date
 * @property string $update_date
 */
class Ad_offer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_ad_offer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ad_id, offered_price, create_date', 'required'),
			array('ad_id, offered_by', 'numerical', 'integerOnly'=>true),
			array('offered_price, ip_address', 'length', 'max'=>255),
			array('update_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ad_id, offered_price, offered_by, ip_address, create_date, update_date', 'safe', 'on'=>'search'),
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
			'ad_id' => 'Ad',
			'offered_price' => 'Offered Price',
			'offered_by' => 'Offered By',
			'ip_address' => 'Ip Address',
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

		$criteria->compare('ad_id',$this->ad_id);

		$criteria->compare('offered_price',$this->offered_price,true);

		$criteria->compare('offered_by',$this->offered_by);

		$criteria->compare('ip_address',$this->ip_address,true);

		$criteria->compare('create_date',$this->create_date,true);

		$criteria->compare('update_date',$this->update_date,true);

		return new CActiveDataProvider('Ad_offer', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Ad_offer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}