<?php

/**
 * This is the model class for table "tbl_estore".
 *
 * The followings are the available columns in table 'tbl_estore':
 * @property integer $id
 * @property integer $user_id
 * @property integer $isp_company_id
 * @property string $slogan
 * @property string $logo
 * @property string $banner
 * @property string $sub_banner
 * @property string $categories
 * @property string $about_us
 * @property string $contact_us
 * @property string $comment
 * @property string $product_details
 * @property string $product_images
 * @property string $keyword
 * @property string $meta_description
 * @property string $url_alias
 * @property string $facebook_link
 * @property string $twitter_link
 * @property string $linkedin_link
 * @property string $google_plus_link
 * @property integer $active
 * @property string $create_date
 * @property string $update_date
 * @property string $country_code
 * @property string $city
 * @property string $web_address
 * @property string $company_email
 * @property string $sales_email
 * @property string $sales_phone_number
 * @property string $company_hotline_number
 */
class Estore extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_estore';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, url_alias, create_date', 'required'),
			array('user_id, active', 'numerical', 'integerOnly'=>true),
			array('slogan, logo, banner, product_details, product_images, categories, country_code, city', 'length', 'max'=>255),
			array('about_us, comment, contact_us, keyword, meta_description, update_date, slogan, logo, banner, categories, web_address, company_email, sales_email, sales_phone_number, company_hotline_number', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, isp_company_id, slogan, logo, banner, categories, about_us, contact_us, comment, product_details, product_images, keyword, meta_description, active, create_date, update_date, country_code, city, web_address, company_email, sales_email, sales_phone_number, company_hotline_number', 'safe', 'on'=>'search'),
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
		    'register' => array(self::HAS_ONE, 'Register','user_id')
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
			'isp_company_id' => 'ISP Company ID',
			'slogan' => 'Slogan',
			'logo' => 'Logo',
			'banner' => 'Banner',
			'sub_banner' => 'Sub Banner',
			'categories' => 'Categories',
			'about_us' => 'About Us',
			'contact_us' => 'Contact Us',
			'comment' => 'Comment',
			'product_details' => 'Product Details',
			'product_images' => 'Product Images',
			'keyword' => 'Keyword',
			'meta_description' => 'Meta Description',
            'url_alias' => 'Url Alias',
            'facebook_link' => 'Facebook Link',
            'twitter_link' => 'Twitter Link',
            'linkedin_link' => 'Linkedin Link',
            'google_plus_link' => 'Google Plus Link',
			'active' => 'Active',
			'create_date' => 'Create Date',
			'update_date' => 'Update Date',
			'country_code' => 'Country Code',
			'web_address' => 'Web Address',
			'company_email' => 'Company Email',
			'sales_email' => 'Sales Email',
			'sales_phone_number' => 'Sales Phone Number',
			'company_hotline_number' => 'Company Hotline Number',
			'city' => 'City',

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
	public function search($store = 0)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria=new CDbCriteria;
		if($store) {
			$criteria->condition = 'isp_company_id is :isp_company_id';
			$criteria->params = array(':isp_company_id' => NULL);
		} else {
			$criteria->condition = 'isp_company_id is not :isp_company_id';
			$criteria->params = array(':isp_company_id' => NULL);
		}
		
		
		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		//$criteria->compare('isp_company_id',$this->isp_company_id);
		$criteria->compare('slogan',$this->slogan,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('banner',$this->banner,true);
		$criteria->compare('sub_banner',$this->sub_banner,true);
		$criteria->compare('categories',$this->categories,true);
		$criteria->compare('about_us',$this->about_us,true);
		$criteria->compare('contact_us',$this->contact_us,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('product_details',$this->product_details,true);
		$criteria->compare('product_images',$this->product_images,true);
		$criteria->compare('keyword',$this->keyword,true);
		$criteria->compare('meta_description',$this->meta_description,true);
        $criteria->compare('url_alias',$this->url_alias,true);
        $criteria->compare('facebook_link',$this->facebook_link,true);
        $criteria->compare('twitter_link',$this->twitter_link,true);
        $criteria->compare('linkedin_link',$this->linkedin_link,true);
        $criteria->compare('google_plus_link',$this->google_plus_link,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('country_code',$this->country_code,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('web_address',$this->web_address,true);
		$criteria->compare('company_email',$this->company_email,true);
		$criteria->compare('sales_email',$this->sales_email,true);
		$criteria->compare('sales_phone_number',$this->sales_phone_number,true);
		$criteria->compare('company_hotline_number',$this->company_hotline_number,true);

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
	 * @return Estore the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
