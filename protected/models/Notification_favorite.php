<?php

/**
 * This is the model class for table "tbl_notification_favorite".
 *
 * The followings are the available columns in table 'tbl_notification_favorite':
 * @property integer $id
 * @property integer $sender_id
 * @property integer $receiver_id
 * @property integer $ad_id
 * @property integer $seen
 * @property string $create_date
 */
class Notification_favorite extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_notification_favorite';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('receiver_id, ad_id, create_date', 'required'),
			array('sender_id, receiver_id, ad_id, seen', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, sender_id, receiver_id, ad_id, seen, create_date', 'safe', 'on'=>'search'),
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
			'sender_id' => 'Sender',
			'receiver_id' => 'Receiver',
			'ad_id' => 'Ad',
			'seen' => 'Seen',
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

		$criteria->compare('sender_id',$this->sender_id);

		$criteria->compare('receiver_id',$this->receiver_id);

		$criteria->compare('ad_id',$this->ad_id);

		$criteria->compare('seen',$this->seen);

		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider('Notification_favorite', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Notification_favorite the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}