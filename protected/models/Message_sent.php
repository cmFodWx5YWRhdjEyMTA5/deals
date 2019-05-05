<?php

/**
 * This is the model class for table "tbl_message_sent".
 *
 * The followings are the available columns in table 'tbl_message_sent':
 * @property integer $id
 * @property integer $registered_sender
 * @property integer $receiver
 * @property string $sender_name
 * @property string $sender_email
 * @property string $sender_phone
 * @property integer $ad_id
 * @property string $details
 * @property integer $read_status
 * @property integer $is_starred
 * @property string $create_date
 * @property integer $reply_of
 */
class Message_sent extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_message_sent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('receiver, read_status, is_starred, create_date', 'required'),
			array('registered_sender, receiver, ad_id, read_status, is_starred, reply_of', 'numerical', 'integerOnly'=>true),
			array('sender_name, sender_email, sender_phone', 'length', 'max'=>255),
			array('details', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, registered_sender, receiver, sender_name, sender_email, sender_phone, ad_id, details, read_status, is_starred, create_date, reply_of', 'safe', 'on'=>'search'),
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
			'registered_sender' => 'Registered Sender',
			'receiver' => 'Receiver',
			'sender_name' => 'Sender Name',
			'sender_email' => 'Sender Email',
			'sender_phone' => 'Sender Phone',
			'ad_id' => 'Ad',
			'details' => 'Details',
			'read_status' => 'Read Status',
			'is_starred' => 'Is Starred',
			'create_date' => 'Create Date',
			'reply_of' => 'Reply Of',
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

		$criteria->compare('registered_sender',$this->registered_sender);

		$criteria->compare('receiver',$this->receiver);

		$criteria->compare('sender_name',$this->sender_name,true);

		$criteria->compare('sender_email',$this->sender_email,true);

		$criteria->compare('sender_phone',$this->sender_phone,true);

		$criteria->compare('ad_id',$this->ad_id);

		$criteria->compare('details',$this->details,true);

		$criteria->compare('read_status',$this->read_status);

		$criteria->compare('is_starred',$this->is_starred);

		$criteria->compare('create_date',$this->create_date,true);

		$criteria->compare('reply_of',$this->reply_of);

		return new CActiveDataProvider('Message_sent', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Message_sent the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}