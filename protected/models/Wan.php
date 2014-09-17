<?php

/**
 * This is the model class for table "wan".
 *
 * The followings are the available columns in table 'wan':
 * @property string $w_id
 * @property string $m_id
 * @property integer $w_link
 * @property string $w_ip
 * @property integer $w_status
 * @property string $cratetime
 */
class Wan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'wan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('m_id', 'required'),
			array('w_link, w_status', 'numerical', 'integerOnly'=>true),
			array('m_id', 'length', 'max'=>10),
			array('w_ip', 'length', 'max'=>15),
			array('cratetime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('w_id, m_id, w_link, w_ip, w_status, cratetime', 'safe', 'on'=>'search'),
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
			'w_id' => 'W',
			'm_id' => 'M',
			'w_link' => 'W Link',
			'w_ip' => 'W Ip',
			'w_status' => 'W Status',
			'cratetime' => 'Cratetime',
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

		$criteria->compare('w_id',$this->w_id,true);
		$criteria->compare('m_id',$this->m_id,true);
		$criteria->compare('w_link',$this->w_link);
		$criteria->compare('w_ip',$this->w_ip,true);
		$criteria->compare('w_status',$this->w_status);
		$criteria->compare('cratetime',$this->cratetime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Wan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
