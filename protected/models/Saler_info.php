<?php

/**
 * This is the model class for table "tbl_saler_info".
 *
 * The followings are the available columns in table 'tbl_saler_info':
 * @property integer $id
 * @property string $name
 * @property string $saler_id
 * @property string $details
 * @property integer $status
 * @property string $create_date
 * @property string $update_date
 */
class Saler_info extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_saler_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, saler_id, create_date', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('name, saler_id, details', 'length', 'max'=>255),
			array('update_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, saler_id, details, status, create_date, update_date', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'saler_id' => 'Saler',
			'details' => 'Details',
			'status' => 'Status',
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

		$criteria->compare('name',$this->name,true);

		$criteria->compare('saler_id',$this->saler_id,true);

		$criteria->compare('details',$this->details,true);

		$criteria->compare('status',$this->status);

		$criteria->compare('create_date',$this->create_date,true);

		$criteria->compare('update_date',$this->update_date,true);

		return new CActiveDataProvider('Saler_info', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Saler_info the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}