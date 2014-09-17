<?php

/**
 * This is the model class for table "account".
 *
 * The followings are the available columns in table 'account':
 * @property string $Id
 * @property string $Username
 * @property string $Pass
 * @property string $Fullname
 * @property string $Email
 * @property integer $Role
 * @property string $LastUpdate
 * @property string $LastLogin
 * @property string $CreateDate
 * @property string $Avatar
 * @property string $Company
 * @property string $LivesIn
 * @property string $Facebook
 * @property string $Twitter
 * @property string $Googleplus
 * @property string $Youtube
 * @property string $Skype
 * @property string $Mobile
 * @property string $Line
 * @property string $Wechat
 * @property string $Description
 */
class Account extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'account';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Username, Pass, Fullname, Email, LastUpdate, LastLogin, CreateDate', 'required'),
			array('Role', 'numerical', 'integerOnly'=>true),
			array('Username, Pass, Fullname, Email, Avatar, Company, LivesIn, Facebook, Twitter, Googleplus, Youtube, Skype, Mobile, Line, Wechat', 'length', 'max'=>200),
			array('Description', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Username, Pass, Fullname, Email, Role, LastUpdate, LastLogin, CreateDate, Avatar, Company, LivesIn, Facebook, Twitter, Googleplus, Youtube, Skype, Mobile, Line, Wechat, Description', 'safe', 'on'=>'search'),
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
			'infrastructures' => array(self::MANY_MANY, 'infrastructure','account_infrastructure(Account_Id, Infrastructure_Id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Username' => 'Username',
			'Pass' => 'Pass',
			'Fullname' => 'Fullname',
			'Email' => 'Email',
			'Role' => 'Role',
			'LastUpdate' => 'Last Update',
			'LastLogin' => 'Last Login',
			'CreateDate' => 'Create Date',
			'Avatar' => 'Avatar',
			'Company' => 'Company',
			'LivesIn' => 'Lives In',
			'Facebook' => 'Facebook',
			'Twitter' => 'Twitter',
			'Googleplus' => 'Googleplus',
			'Youtube' => 'Youtube',
			'Skype' => 'Skype',
			'Mobile' => 'Mobile',
			'Line' => 'Line',
			'Wechat' => 'Wechat',
			'Description' => 'Description',
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

		$criteria->compare('Id',$this->Id,true);
		$criteria->compare('Username',$this->Username,true);
		$criteria->compare('Pass',$this->Pass,true);
		$criteria->compare('Fullname',$this->Fullname,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Role',$this->Role);
		$criteria->compare('LastUpdate',$this->LastUpdate,true);
		$criteria->compare('LastLogin',$this->LastLogin,true);
		$criteria->compare('CreateDate',$this->CreateDate,true);
		$criteria->compare('Avatar',$this->Avatar,true);
		$criteria->compare('Company',$this->Company,true);
		$criteria->compare('LivesIn',$this->LivesIn,true);
		$criteria->compare('Facebook',$this->Facebook,true);
		$criteria->compare('Twitter',$this->Twitter,true);
		$criteria->compare('Googleplus',$this->Googleplus,true);
		$criteria->compare('Youtube',$this->Youtube,true);
		$criteria->compare('Skype',$this->Skype,true);
		$criteria->compare('Mobile',$this->Mobile,true);
		$criteria->compare('Line',$this->Line,true);
		$criteria->compare('Wechat',$this->Wechat,true);
		$criteria->compare('Description',$this->Description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Account the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
