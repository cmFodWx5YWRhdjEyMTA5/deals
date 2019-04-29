<?php

/**
 * This is the model class for table "tbl_search".
 *
 * The followings are the available columns in table 'tbl_search':
 * @property integer $id
 * @property string $search_keyword
 * @property string $search_time
 * @property integer $search_result
 * @property string $user_ip
 */
class TblSearch extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_search';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('search_result', 'numerical', 'integerOnly'=>true),
			array('search_keyword, user_ip', 'length', 'max'=>255),
			array('search_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, search_keyword, search_time, search_result, user_ip', 'safe', 'on'=>'search'),
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
			'search_keyword' => 'Search Keyword',
			'search_time' => 'Search Time',
			'search_result' => 'Search Result',
			'user_ip' => 'User Ip',
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
		$criteria->compare('search_keyword',$this->search_keyword,true);
		$criteria->compare('search_time',$this->search_time,true);
		$criteria->compare('search_result',$this->search_result);
		$criteria->compare('user_ip',$this->user_ip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblSearch the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
