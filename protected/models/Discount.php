<?php

/**
 * This is the model class for table "tbl_discount".
 *
 * The followings are the available columns in table 'tbl_discount':
 * @property integer $id
 * @property string $title
 * @property string $images
 * @property string $secondary_images
 * @property string $optional_images
 * @property string $description
 * @property string $create_date
 * @property string $expire_date
 * @property string $estore_link
 * @property string $external_link
 * @property string $discount
 * @property string $page_alias
 * @property string $page_content
 */
class Discount extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_discount';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('images, discount', 'required'),
			array('estore_link, external_link, discount', 'length', 'max'=>255),
			array('secondary_images, description, create_date, expire_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, images, secondary_images, description, create_date, expire_date, estore_link, external_link, discount', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'images' => 'Images',
			'secondary_images' => 'Secondary Images',
			'optional_images' => 'Optional Images',
			'description' => 'Description',
			'create_date' => 'Create Date',
			'expire_date' => 'Expire Date',
			'estore_link' => 'Estore Link',
			'external_link' => 'External Link',
			'discount' => 'Discount',
			'page_alias' => 'Page Alias',
			'page_content' => 'Page Content',
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
		$criteria->compare('title',$this->title);
		$criteria->compare('images',$this->images,true);
		$criteria->compare('secondary_images',$this->secondary_images,true);
		$criteria->compare('optional_images',$this->optional_images,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('expire_date',$this->expire_date,true);
		$criteria->compare('estore_link',$this->estore_link,true);
		$criteria->compare('external_link',$this->external_link,true);
		$criteria->compare('discount',$this->discount,true);
		$criteria->compare('page_alias',$this->page_alias,true);
		$criteria->compare('page_content',$this->page_content,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Discount the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
