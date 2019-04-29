<?php

/**
 * This is the model class for table "tbl_ad_special".
 *
 * The followings are the available columns in table 'tbl_ad_special':
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $description
 * @property string $banner_image
 * @property string $banner_position
 * @property string $banner_url
 * @property string $page_alias_ad_special
 * @property string $page_content
 * @property string $create_date
 * @property string $update_date
 * @property string $latitude
 * @property string $longitude
 * @property string $country_code
 * @property string $city
 * @property string $video_link
 * @property string $youtube_link
 * @property string $media_type
 */
class AdSpecial extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_ad_special';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('create_date, media_type', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('title, banner_image, banner_position, banner_url, page_alias_ad_special, latitude, longitude, country_code, city', 'length', 'max'=>255),
			array('description, page_content, update_date, video_link, youtube_link', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, title, description, banner_image, banner_position, banner_url, page_alias_ad_special, page_content, create_date, update_date, latitude, longitude, country_code, city, video_link, youtube_link, media_type', 'safe', 'on'=>'search'),
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
			'description' => 'Description',
			'banner_image' => 'Banner Image',
			'banner_position' => 'Banner Position',
			'banner_url' => 'Banner Url',
			'page_alias_ad_special' => 'Page Alias Ad Special',
			'page_content' => 'Page Content',
			'create_date' => 'Create Date',
			'update_date' => 'Update Date',
			'latitude' => 'Latitude',
			'longitude' => 'Longitude',
			'country_code' => 'Country Code',
			'city' => 'City',
			'video_link' => 'Video Link',
			'youtube_link' => 'Youtube Link',
			'media_type' => 'Media Type',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('banner_image',$this->banner_image,true);
		$criteria->compare('banner_position',$this->banner_position,true);
		$criteria->compare('banner_url',$this->banner_url,true);
		$criteria->compare('page_alias_ad_special',$this->page_alias_ad_special,true);
		$criteria->compare('page_content',$this->page_content,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('latitude',$this->latitude,true);
		$criteria->compare('longitude',$this->longitude,true);
		$criteria->compare('country_code',$this->country_code,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('video_link',$this->video_link,true);
		$criteria->compare('youtube_link',$this->youtube_link,true);
		$criteria->compare('media_type',$this->media_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AdSpecial the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
