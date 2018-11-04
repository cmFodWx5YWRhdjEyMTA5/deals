<?php

/**
 * This is the model class for table "tbl_portal_settings".
 *
 * The followings are the available columns in table 'tbl_portal_settings':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $create_date
 * @property string $update_date
 * @property integer $group_id
 * @property integer $created_by
 */
class Portal_settings extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_portal_settings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, password, create_date, group_id, created_by', 'required'),
			array('name, email, password', 'length', 'max'=>255),
			array('update_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, email, password, create_date, update_date, group_id, created_by', 'safe', 'on'=>'search'),
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
			'email' => 'Email',
			'password' => 'Password',
			'create_date' => 'Create Date',
			'update_date' => 'Update Date',
			'group_id' => 'Group Id',
			'created_by' => 'Created By',
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

		$criteria->compare('email',$this->email,true);

		$criteria->compare('password',$this->password,true);

		$criteria->compare('create_date',$this->create_date,true);

		$criteria->compare('update_date',$this->update_date,true);

		$criteria->compare('group_id',$this->group_id,true);

		$criteria->compare('created_by',$this->created_by,true);

		return new CActiveDataProvider('Portal_settings', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Portal_settings the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}