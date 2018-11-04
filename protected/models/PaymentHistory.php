<?php

/**
 * This is the model class for table "tbl_payment_history".
 *
 * The followings are the available columns in table 'tbl_payment_history':
 * @property integer $id
 * @property integer $user_id
 * @property integer $store_id
 * @property integer $plan_id
 * @property integer $subscription_id
 * @property integer $ad_id
 * @property integer $service_promotion_id
 * @property string $invoice_id
 * @property string $transaction_id
 * @property string $saler_id
 * @property string $bank_receipt
 * @property integer $payment_method
 * @property string $payment_amount
 * @property string $due_amount
 * @property string $comment
 * @property integer $payment_status
 * @property string $transaction_date
 * @property string $create_date
 * @property string $update_date
 * @property string $referral_id
 * @property string $decline_reason
 * @property string $card_info
 */
class PaymentHistory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_payment_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, invoice_id, payment_method, payment_amount, create_date', 'required'),
			array('user_id, store_id, plan_id, subscription_id,ad_id,service_promotion_id,payment_method, payment_status', 'numerical', 'integerOnly'=>true),
			array('invoice_id, transaction_id, saler_id, bank_receipt, comment, referral_id,decline_reason,card_info', 'length', 'max'=>255),
			array('payment_amount,due_amount', 'length', 'max'=>30),
			array('transaction_id, store_id, plan_id, subscription_id, ad_id,service_promotion_id, due_amount,transaction_date, update_date,decline_reason,card_info', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, store_id, plan_id, subscription_id, ad_id, invoice_id, transaction_id, saler_id, bank_receipt, payment_method, payment_amount, due_amount, comment, payment_status, transaction_date, create_date, update_date, referral_id,decline_reason,card_info', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'user_id' => 'User',
			'store_id' => 'Store',
			'plan_id' => 'Plan',
			'subscription_id' => 'Subscription',
			'ad_id' => 'Individual Ad',
			'service_promotion_id' => 'Service Promotion',
			'invoice_id' => 'Invoice',
			'transaction_id' => 'Transaction',
			'saler_id' => 'Seller Id',
			'bank_receipt' => 'Bank Receipt',
			'payment_method' => 'Payment Method',
			'payment_amount' => 'Payment Amount',
			'due_amount' => 'Due Amount',
			'comment' => 'Comment',
			'payment_status' => 'Payment Status',
			'transaction_date' => 'Transaction Date',
			'create_date' => 'Create Date',
			'update_date' => 'Update Date',
			'referral_id' => 'Referral Id',
			'decline_reason' => 'Decline Reason',
			'card_info' => 'Card Info',
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
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('store_id',$this->store_id);
		$criteria->compare('plan_id',$this->plan_id);
		$criteria->compare('subscription_id',$this->subscription_id);
		$criteria->compare('ad_id',$this->ad_id);
		$criteria->compare('service_promotion_id',$this->service_promotion_id);
		$criteria->compare('invoice_id',$this->invoice_id,true);
		$criteria->compare('transaction_id',$this->transaction_id,true);
		$criteria->compare('saler_id',$this->saler_id,true);
		$criteria->compare('bank_receipt',$this->bank_receipt,true);
		$criteria->compare('payment_method',$this->payment_method,true);
		$criteria->compare('payment_amount',$this->payment_amount,true);
		$criteria->compare('due_amount',$this->due_amount,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('payment_status',$this->payment_status);
		$criteria->compare('transaction_date',$this->transaction_date,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('referral_id',$this->referral_id,true);
		$criteria->compare('decline_reason',$this->decline_reason,true);
		$criteria->compare('card_info',$this->card_info,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PaymentHistory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
