<?php

/**
 * This is the model class for table "tbl_registered_user_location".
 *
 * The followings are the available columns in table 'tbl_registered_user_location':
 * @property integer $id
 * @property integer $user_id
 * @property integer $division_id
 * @property string $district_id
 * @property string $thana_id
 * @property string $create_date
 */
class Registered_user_location extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_registered_user_location';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, division_id, create_date', 'required'),
			array('user_id, division_id', 'numerical', 'integerOnly'=>true),
			array('district_id,thana_id', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, division_id, district_id, thana_id, create_date', 'safe', 'on'=>'search'),
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
			'division_id' => 'Division',
			'district_id' => 'District',
			'thana_id' => 'Thana',
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

		$criteria->compare('division_id',$this->division_id);

		$criteria->compare('district_id',$this->district_id);

		$criteria->compare('thana_id',$this->thana_id,true);

		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider('Registered_user_location', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Registered_user_location the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}