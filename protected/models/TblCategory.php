<?php

/**
 * This is the model class for table "tbl_category".
 *
 * The followings are the available columns in table 'tbl_category':
 * @property integer $category_id
 * @property string $category_name
 * @property string $category_slug
 * @property string $sub_category_slug
 * @property string $parent_id
 * @property string $category_icon
 * @property string $category_banner_image
 * @property integer $category_type
 * @property string $meta_title
 * @property string $meta_description
 */
class TblCategory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_name, parent_id', 'required'),
			array('category_name, category_slug, sub_category_slug, parent_id, category_icon, category_banner_image, meta_title, meta_description', 'length', 'max'=>255),
			array('category_type', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('category_id, category_name, category_slug, sub_category_slug, parent_id,category_icon, category_banner_image, category_type, meta_title, meta_description', 'safe', 'on'=>'search'),
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
			'category_id' => 'Category',
			'category_name' => 'Category Name',
			'category_slug' => 'Category Slug',
			'sub_category_slug' => 'Sub Category Slug',
			'parent_id' => 'Parent',
			'category_icon' => 'Category Icon',
			'category_banner_image' => 'Category Banner Image',
			'category_type' => 'Category Type',
			'meta_title' => 'Meta Title',
			'meta_description' => 'Meta Description',
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

		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('category_name',$this->category_name,true);
		$criteria->compare('category_slug',$this->category_slug,true);
		$criteria->compare('sub_category_slug',$this->sub_category_slug,true);
		$criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('category_icon',$this->category_icon,true);
		$criteria->compare('category_banner_image',$this->category_banner_image,true);
		$criteria->compare('category_type',$this->category_type);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_description',$this->meta_description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
