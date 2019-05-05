<?php

/**
 * This is the model class for table "tbl_ads".
 *
 * The followings are the available columns in table 'tbl_ads':
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $image_url
 * @property string $description
 * @property integer $ad_condition
 * @property string $price
 * @property string $price_end
 * @property integer $price_type
 * @property integer $category_id
 * @property string $create_date
 * @property string $update_date
 * @property string $expire_date
 * @property integer $active
 * @property integer $show_in_store
 * @property string $ad_id
 * @property integer $is_featured
 * @property integer $is_premium
 * @property integer $is_top
 * @property integer $is_paid
 * @property integer $hot_ads
 * @property string $hot_ads_start_date
 * @property string $hot_ads_end_date
 * @property double $discount
 * @property integer $special_offer
 * @property string $location
 * @property string $latitude
 * @property string $longitude
 * @property integer $show_price
 * @property string $country_code
 * @property string $city
 * @property string $package_type
 * @property string $internet_speed
 * @property string $youtube_speed
 * @property string $bdix_speed
 * @property string $ftp_link
 * @property string $live_tv
 * @property string $facebook_link
 * @property string $website_link
 * @property integer $public_ip
 * @property string $service_charge
 * @property string $migration_charge
 */
class Ads extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_ads';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, title, image_url, description, price, category_id, create_date', 'required'),
			array('user_id, ad_condition, price_type, category_id, active, show_in_store, is_featured, is_premium, is_top, is_paid, special_offer, hot_ads, show_price', 'numerical', 'integerOnly'=>true),
			array('discount', 'numerical'),
			array('price,price_end', 'length', 'max'=>30),
			array('ad_id, location, country_code, city', 'length', 'max'=>255),
			array('update_date, expire_date, hot_ads_start_date, hot_ads_end_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, title, image_url, description, ad_condition, price, price_end,price_type, category_id, create_date, update_date, expire_date, active, show_in_store, ad_id, is_featured, is_premium, is_top, is_paid, special_offer, hot_ads, show_price, hot_ads_start_date, hot_ads_end_date, discount, location, country_code, city, package_type, internet_speed, youtube_speed, bdix_speed, ftp_link, live_tv, facebook_link, website_link, public_ip, service_charge, migration_charge', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'image_url' => 'Image Url',
			'description' => 'Description',
			'ad_condition' => 'Ad Condition',
			'price' => 'Price',
			'price_end' => 'Price Upper Range',
			'price_type' => 'Price Type',
			'category_id' => 'Category',
			'create_date' => 'Create Date',
			'update_date' => 'Update Date',
			'expire_date' => 'Expire Date',
			'active' => 'Active',
			'show_in_store' => 'Show In Store',
			'ad_id' => 'Ad',
			'is_featured' => 'Is Featured',
			'is_premium' => 'Is Premium',
			'is_top' => 'Is Top',
			'is_paid' => 'Is Paid',
			'hot_ads' => 'Hot Ads',
			'hot_ads_start_date' => 'Hot Ads Start Date',
			'hot_ads_end_date' => 'Hot Ads End Date',
			'discount' => 'Discount',
			'special_offer' => 'Special Offer',
			'location' => 'Location',
			'latitude' => 'Latitude',
			'longitude' => 'Longitude',
			'show_price' => 'Show Price',
			'country_code' => 'Country Code',
			'city' => 'City',
			'package_type' => 'Package Type',
			'internet_speed' => 'Internet Speed',
			'youtube_speed' => 'Youtube Speed',
			'bdix_speed' => 'BDIX Speed',
			'ftp_link' => 'Ftp Link',
			'live_tv' => 'Live TV',
			'facebook_link' => 'Facebook Page',
			'website_link' => 'Website',
			'public_ip' => 'Public IP',
			'service_charge' => 'Service Charge/OTC',
			'migration_charge' => 'Migration Charge'
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
	public function search($status = 0)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
//Generic::_setTrace($status);
		$criteria=new CDbCriteria;
		$criteria->condition = 'active = :active';
		$criteria->params = array(':active' => $status);
		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('image_url',$this->image_url,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('ad_condition',$this->ad_condition);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('price_type',$this->price_type);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('expire_date',$this->expire_date,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('show_in_store',$this->show_in_store);
		$criteria->compare('ad_id',$this->ad_id,true);
		$criteria->compare('is_featured',$this->is_featured);
		$criteria->compare('is_premium',$this->is_premium);
		$criteria->compare('is_top',$this->is_top);
		$criteria->compare('is_paid',$this->is_paid);
		$criteria->compare('hot_ads',$this->hot_ads);
		$criteria->compare('hot_ads_start_date',$this->hot_ads_start_date,true);
		$criteria->compare('hot_ads_end_date',$this->hot_ads_end_date,true);
		$criteria->compare('discount',$this->discount);
		$criteria->compare('special_offer',$this->special_offer);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('latitude',$this->latitude,true);
		$criteria->compare('longitude',$this->longitude,true);
		$criteria->compare('show_price',$this->show_price,true);
		$criteria->compare('country_code',$this->country_code,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('package_type',$this->package_type,true);
		$criteria->compare('internet_speed',$this->internet_speed,true);
		$criteria->compare('youtube_speed',$this->youtube_speed,true);
		$criteria->compare('bdix_speed',$this->bdix_speed,true);
		$criteria->compare('ftp_link',$this->ftp_link,true);
		$criteria->compare('live_tv',$this->live_tv,true);
		$criteria->compare('facebook_link',$this->facebook_link,true);
		$criteria->compare('website_link',$this->website_link,true);
		$criteria->compare('public_ip',$this->public_ip,true);
		$criteria->compare('service_charge',$this->service_charge,true);
		$criteria->compare('migration_charge',$this->migration_charge,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'id DESC',
			)
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ads the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
