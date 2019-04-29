<?php

/**
 * This is the model class for table "tbl_subscription_details".
 *
 * The followings are the available columns in table 'tbl_subscription_details':
 * @property integer $id
 * @property integer $plan_id
 * @property integer $ad_count
 * @property integer $featured_ad_count
 * @property integer $premium_ad_count
 * @property integer $top_ad_count
 * @property integer $hot_ad_count
 * @property integer $live_chat_support
 * @property integer $smm_support
 * @property integer $email_marketing_support
 * @property integer $recommend_ad_support
 * @property integer $promotional_banner_service
 */
class Subscription_details extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_subscription_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('plan_id, ad_count, featured_ad_count, premium_ad_count, top_ad_count', 'required'),
			array('plan_id, ad_count, featured_ad_count, premium_ad_count, top_ad_count, hot_ad_count, live_chat_support, smm_support, email_marketing_support, recommend_ad_support, promotional_banner_service', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, plan_id, ad_count, featured_ad_count, premium_ad_count, top_ad_count, hot_ad_count, live_chat_support, smm_support, email_marketing_support, recommend_ad_support, promotional_banner_service', 'safe', 'on'=>'search'),
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
			'plan_id' => 'Plan',
			'ad_count' => 'Ad Count',
			'featured_ad_count' => 'Featured Ad Count',
			'premium_ad_count' => 'Premium Ad Count',
			'top_ad_count' => 'Top Ad Count',
			'hot_ad_count' => 'Hot Ad Count',
			'live_chat_support' => 'Live Chat Support',
			'smm_support' => 'Smm Support',
			'email_marketing_support' => 'Email Marketing Support',
			'recommend_ad_support' => 'Recommend Ad Support',
			'promotional_banner_service' => 'Promotional Banner Service',
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

		$criteria->compare('plan_id',$this->plan_id);

		$criteria->compare('ad_count',$this->ad_count);

		$criteria->compare('featured_ad_count',$this->featured_ad_count);

		$criteria->compare('premium_ad_count',$this->premium_ad_count);

		$criteria->compare('top_ad_count',$this->top_ad_count);

		$criteria->compare('hot_ad_count',$this->hot_ad_count);

		$criteria->compare('live_chat_support',$this->live_chat_support);

		$criteria->compare('smm_support',$this->smm_support);

		$criteria->compare('email_marketing_support',$this->email_marketing_support);

		$criteria->compare('recommend_ad_support',$this->recommend_ad_support);

		$criteria->compare('promotional_banner_service',$this->promotional_banner_service);

		return new CActiveDataProvider('Subscription_details', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Subscription_details the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}