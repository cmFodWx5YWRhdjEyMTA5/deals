<?php

/**
 * This is the model class for table "tbl_district".
 *
 * The followings are the available columns in table 'tbl_district':
 * @property integer $id
 * @property integer $district_id
 * @property integer $division_id
 * @property string $district
 * @property integer $status
 * @property string $create_date
 */
class District extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_district';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('district_id, division_id, district, create_date', 'required'),
			array('district_id, division_id, status', 'numerical', 'integerOnly'=>true),
			array('district', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, district_id, division_id, district, status, create_date', 'safe', 'on'=>'search'),
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
			'district_id' => 'District',
			'division_id' => 'Division',
			'district' => 'District',
			'status' => 'Status',
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

		$criteria->compare('district_id',$this->district_id);

		$criteria->compare('division_id',$this->division_id);

		$criteria->compare('district',$this->district,true);

		$criteria->compare('status',$this->status);

		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider('District', array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'district ASC',
			)
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return District the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}