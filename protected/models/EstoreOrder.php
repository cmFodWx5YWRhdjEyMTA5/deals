<?php

/**
 * This is the model class for table "tbl_estore_order".
 *
 * The followings are the available columns in table 'tbl_estore_order':
 * @property integer $id
 * @property integer $registered_user_id
 * @property integer $invoice_id
 * @property integer $estore_id
 * @property string $product_name
 * @property integer $item_code
 * @property string $product_price
 * @property string $estore_name
 * @property string $buyer_name
 * @property string $buyer_email
 * @property string $buyer_phone
 * @property integer $status
 * @property string $create_date
 */
class EstoreOrder extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_estore_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('create_date', 'required'),
			array('registered_user_id, invoice_id, estore_id, item_code, status', 'numerical', 'integerOnly'=>true),
			array('product_name, estore_name, buyer_name, buyer_email, buyer_phone', 'length', 'max'=>255),
			array('product_price', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, registered_user_id, invoice_id, estore_id, product_name, item_code, product_price, estore_name, buyer_name, buyer_email, buyer_phone, status, create_date', 'safe', 'on'=>'search'),
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
			'registered_user_id' => 'Registered User',
			'invoice_id' => 'Invoice',
			'estore_id' => 'Estore',
			'product_name' => 'Product Name',
			'item_code' => 'Item Code',
			'product_price' => 'Product Price',
			'estore_name' => 'Estore Name',
			'buyer_name' => 'Buyer Name',
			'buyer_email' => 'Buyer Email',
			'buyer_phone' => 'Buyer Phone',
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
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('registered_user_id',$this->registered_user_id);
		$criteria->compare('invoice_id',$this->invoice_id);
		$criteria->compare('estore_id',$this->estore_id);
		$criteria->compare('product_name',$this->product_name,true);
		$criteria->compare('item_code',$this->item_code);
		$criteria->compare('product_price',$this->product_price,true);
		$criteria->compare('estore_name',$this->estore_name,true);
		$criteria->compare('buyer_name',$this->buyer_name,true);
		$criteria->compare('buyer_email',$this->buyer_email,true);
		$criteria->compare('buyer_phone',$this->buyer_phone,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EstoreOrder the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
