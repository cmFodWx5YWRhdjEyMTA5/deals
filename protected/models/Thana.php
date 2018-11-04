<?php

/**
 * This is the model class for table "tbl_thana".
 *
 * The followings are the available columns in table 'tbl_thana':
 * @property integer $id
 * @property integer $thana_id
 * @property integer $district_id
 * @property string $thana
 * @property integer $status
 * @property string $create_date
 */
class Thana extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_thana';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('thana_id, district_id, thana, create_date', 'required'),
			array('thana_id, district_id, status', 'numerical', 'integerOnly'=>true),
			array('thana', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, thana_id, district_id, thana, status, create_date', 'safe', 'on'=>'search'),
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
			'thana_id' => 'Thana',
			'district_id' => 'District',
			'thana' => 'Thana',
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

		$criteria->compare('thana_id',$this->thana_id);

		$criteria->compare('district_id',$this->district_id);

		$criteria->compare('thana',$this->thana,true);

		$criteria->compare('status',$this->status);

		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider('Thana', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Thana the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}