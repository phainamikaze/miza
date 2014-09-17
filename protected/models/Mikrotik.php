<?php

/**
 * This is the model class for table "mikrotik".
 *
 * The followings are the available columns in table 'mikrotik':
 * @property string $m_id
 * @property string $s_id
 * @property string $m_nameid
 * @property string $m_name
 * @property string $m_serialnumber
 * @property string $cratetime
 * @property string $m_apiport
 * @property string $m_user
 * @property string $m_pass
 * @property string $m_remoteaddress
 * @property string $m_wan
 * @property string $m_ap
 * @property integer $m_online
 * @property string $m_datetime
 */
class Mikrotik extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mikrotik';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('s_id', 'required'),
			array('m_online', 'numerical', 'integerOnly'=>true),
			array('s_id, m_apiport', 'length', 'max'=>10),
			array('m_nameid, m_name, m_user, m_pass, m_remoteaddress', 'length', 'max'=>100),
			array('m_serialnumber, m_wan', 'length', 'max'=>50),
			array('m_ap', 'length', 'max'=>1000),
			array('cratetime, m_datetime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('m_id, s_id, m_nameid, m_name, m_serialnumber, cratetime, m_apiport, m_user, m_pass, m_remoteaddress, m_wan, m_ap, m_online, m_datetime', 'safe', 'on'=>'search'),
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
			'm_id' => 'M',
			's_id' => 'S',
			'm_nameid' => 'M Nameid',
			'm_name' => 'M Name',
			'm_serialnumber' => 'M Serialnumber',
			'cratetime' => 'Cratetime',
			'm_apiport' => 'M Apiport',
			'm_user' => 'M User',
			'm_pass' => 'M Pass',
			'm_remoteaddress' => 'M Remoteaddress',
			'm_wan' => 'M Wan',
			'm_ap' => 'M Ap',
			'm_online' => 'M Online',
			'm_datetime' => 'M Datetime',
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

		$criteria->compare('m_id',$this->m_id,true);
		$criteria->compare('s_id',$this->s_id,true);
		$criteria->compare('m_nameid',$this->m_nameid,true);
		$criteria->compare('m_name',$this->m_name,true);
		$criteria->compare('m_serialnumber',$this->m_serialnumber,true);
		$criteria->compare('cratetime',$this->cratetime,true);
		$criteria->compare('m_apiport',$this->m_apiport,true);
		$criteria->compare('m_user',$this->m_user,true);
		$criteria->compare('m_pass',$this->m_pass,true);
		$criteria->compare('m_remoteaddress',$this->m_remoteaddress,true);
		$criteria->compare('m_wan',$this->m_wan,true);
		$criteria->compare('m_ap',$this->m_ap,true);
		$criteria->compare('m_online',$this->m_online);
		$criteria->compare('m_datetime',$this->m_datetime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Mikrotik the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
