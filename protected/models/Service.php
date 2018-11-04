<?php

/**
 * This is the model class for table "tbl_service".
 *
 * The followings are the available columns in table 'tbl_service':
 * @property integer $id
 * @property integer $user_id
 * @property integer $plan_id
 * @property string $about_us
 * @property string $contact_us
 * @property string $documents
 * @property string $additional_comments
 * @property string $facebook_link
 * @property string $twitter_link
 * @property string $linkedin_link
 * @property string $google_plus_link
 * @property string $keyword
 * @property string $meta_description
 * @property string $url_alias
 * @property integer $active
 * @property string $create_date
 * @property string $update_date
 * @property string $expire_date
 * @property string $country_code
 * @property string $city
 */
class Service extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_service';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id,plan_id, about_us, contact_us, documents, additional_comments, url_alias, create_date', 'required'),
			array('user_id,plan_id, active', 'numerical', 'integerOnly'=>true),
			array('facebook_link, twitter_link, linkedin_link, google_plus_link, url_alias, country_code, city', 'length', 'max'=>255),
			array('keyword, meta_description, update_date, expire_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, about_us, contact_us, documents, additional_comments, facebook_link, twitter_link, linkedin_link, google_plus_link, keyword, meta_description, url_alias, active, create_date, update_date,expire_date, country_code, city', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'plan_id' => 'Service Plan',
			'about_us' => 'About Us',
			'contact_us' => 'Contact Us',
			'documents' => 'Documents',
			'additional_comments' => 'Additional Comments',
			'facebook_link' => 'Facebook Link',
			'twitter_link' => 'Twitter Link',
			'linkedin_link' => 'Linkedin Link',
			'google_plus_link' => 'Google Plus Link',
			'keyword' => 'Keyword',
			'meta_description' => 'Meta Description',
			'url_alias' => 'Url Alias',
			'active' => 'Active',
			'create_date' => 'Create Date',
			'update_date' => 'Update Date',
			'expire_date' => 'Expire Date',
			'country_code' => 'Country Code',
			'city' => 'City'
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

		$criteria->compare('user_id',$this->user_id);

		$criteria->compare('plan_id',$this->plan_id);

		$criteria->compare('about_us',$this->about_us,true);

		$criteria->compare('contact_us',$this->contact_us,true);

		$criteria->compare('documents',$this->documents,true);

		$criteria->compare('additional_comments',$this->additional_comments,true);

		$criteria->compare('facebook_link',$this->facebook_link,true);

		$criteria->compare('twitter_link',$this->twitter_link,true);

		$criteria->compare('linkedin_link',$this->linkedin_link,true);

		$criteria->compare('google_plus_link',$this->google_plus_link,true);

		$criteria->compare('keyword',$this->keyword,true);

		$criteria->compare('meta_description',$this->meta_description,true);

		$criteria->compare('url_alias',$this->url_alias,true);

		$criteria->compare('active',$this->active);

		$criteria->compare('create_date',$this->create_date,true);

		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('expire_date',$this->expire_date,true);
		$criteria->compare('country_code',$this->country_code,true);
		$criteria->compare('city',$this->city,true);

		return new CActiveDataProvider('Service', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Service the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}