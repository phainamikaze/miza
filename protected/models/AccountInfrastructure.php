<?php

/**
 * This is the model class for table "account_infrastructure".
 *
 * The followings are the available columns in table 'account_infrastructure':
 * @property string $Account_Id
 * @property string $Infrastructure_Id
 * @property integer $IsOnwer
 */
class AccountInfrastructure extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'account_infrastructure';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Account_Id, Infrastructure_Id', 'required'),
			array('IsOnwer', 'numerical', 'integerOnly'=>true),
			array('Account_Id, Infrastructure_Id', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Account_Id, Infrastructure_Id, IsOnwer', 'safe', 'on'=>'search'),
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
			'Account_Id' => 'Account',
			'Infrastructure_Id' => 'Infrastructure',
			'IsOnwer' => 'Is Onwer',
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

		$criteria->compare('Account_Id',$this->Account_Id,true);
		$criteria->compare('Infrastructure_Id',$this->Infrastructure_Id,true);
		$criteria->compare('IsOnwer',$this->IsOnwer);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AccountInfrastructure the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
