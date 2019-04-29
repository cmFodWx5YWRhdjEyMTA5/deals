<?php

/**
 * This is the model class for table "tbl_blacklist".
 *
 * The followings are the available columns in table 'tbl_blacklist':
 * @property integer $id
 * @property string $name
 * @property string $nid
 * @property string $phone
 * @property string $address
 * @property string $reason
 * @property integer $reported_by
 * @property integer $status
 * @property string $create_date
 * @property string $update_date
 */
class Blacklist extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_blacklist';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, nid, phone, reason, reported_by, create_date', 'required'),
			array('reported_by, status', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>256),
			array('nid, phone', 'length', 'max'=>80),
			array('address', 'length', 'max'=>255),
			array('update_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, nid, phone, address, reason, reported_by, status, create_date, update_date', 'safe', 'on'=>'search'),
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
			'nid' => 'Nid',
			'phone' => 'Phone',
			'address' => 'Address',
			'reason' => 'Reason',
			'reported_by' => 'Reported By',
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

		$criteria->compare('nid',$this->nid,true);

		$criteria->compare('phone',$this->phone,true);

		$criteria->compare('address',$this->address,true);

		$criteria->compare('reason',$this->reason,true);

		$criteria->compare('reported_by',$this->reported_by);

		$criteria->compare('status',$this->status);

		$criteria->compare('create_date',$this->create_date,true);

		$criteria->compare('update_date',$this->update_date,true);

		return new CActiveDataProvider('Blacklist', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Blacklist the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}