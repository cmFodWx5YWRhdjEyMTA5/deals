<?php

/**
 * This is the model class for table "tbl_portal_referral".
 *
 * The followings are the available columns in table 'tbl_portal_referral':
 * @property integer $id
 * @property integer $portal_user_id
 * @property string $referral_id
 * @property string $create_date
 * @property string $update_date
 */
class Portal_referral extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_portal_referral';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('portal_user_id, referral_id, create_date', 'required'),
			array('portal_user_id', 'numerical', 'integerOnly'=>true),
			array('referral_id', 'length', 'max'=>255),
			array('update_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, portal_user_id, referral_id, create_date, update_date', 'safe', 'on'=>'search'),
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
			'portal_user' => array(self::BELONGS_TO, 'TblPortalSettings', 'portal_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'portal_user_id' => 'Portal User',
			'referral_id' => 'Referral',
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

		$criteria->compare('portal_user_id',$this->portal_user_id);

		$criteria->compare('referral_id',$this->referral_id,true);

		$criteria->compare('create_date',$this->create_date,true);

		$criteria->compare('update_date',$this->update_date,true);

		return new CActiveDataProvider('Portal_referral', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Portal_referral the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}