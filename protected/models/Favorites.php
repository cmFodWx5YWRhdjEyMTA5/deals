<?php

/**
 * This is the model class for table "tbl_favorites".
 *
 * The followings are the available columns in table 'tbl_favorites':
 * @property integer $id
 * @property string $user_token
 * @property string $recently_view_ad_ids
 * @property string $ad_id
 * @property string $users_last_visit
 * @property
 */
class Favorites extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_favorites';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_token, users_last_visit', 'required'),
			array('user_token', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_token, recently_view_ad_ids, ad_id, users_last_visit, user_id', 'safe', 'on'=>'search'),
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
			'user_token' => 'User Token',
            'recently_view_ad_ids' => 'Recently View Ad Ids',
			'ad_id' => 'Ad',
			'users_last_visit' => 'Users Last Visit',
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
		$criteria->compare('user_token',$this->user_token,true);
        $criteria->compare('recently_view_ad_ids',$this->recently_view_ad_ids,true);
		$criteria->compare('ad_id',$this->ad_id,true);
		$criteria->compare('users_last_visit',$this->users_last_visit,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Favorites the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
