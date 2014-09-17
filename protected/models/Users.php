<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $u_id
 * @property string $u_name
 * @property string $u_pass
 * @property string $u_fullname
 * @property string $u_email
 * @property string $u_contact
 * @property string $u_role
 * @property string $m_id
 * @property string $u_last_edit
 * @property string $u_last_login
 * @property string $u_create_at
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('u_name, u_pass, u_fullname, u_email, u_contact, u_last_edit, u_last_login, u_create_at', 'required'),
			array('u_name, u_pass, u_fullname, u_email, u_contact', 'length', 'max'=>200),
			array('u_role', 'length', 'max'=>1),
			array('m_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('u_id, u_name, u_pass, u_fullname, u_email, u_contact, u_role, m_id, u_last_edit, u_last_login, u_create_at', 'safe', 'on'=>'search'),
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
			'mikrotiks' => array(self::MANY_MANY, 'mikrotik', 
                'users_mikrotik(u_id, m_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'u_id' => 'U',
			'u_name' => 'U Name',
			'u_pass' => 'U Pass',
			'u_fullname' => 'U Fullname',
			'u_email' => 'U Email',
			'u_contact' => 'U Contact',
			'u_role' => 'U Role',
			'm_id' => 'M',
			'u_last_edit' => 'U Last Edit',
			'u_last_login' => 'U Last Login',
			'u_create_at' => 'U Create At',
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

		$criteria->compare('u_id',$this->u_id,true);
		$criteria->compare('u_name',$this->u_name,true);
		$criteria->compare('u_pass',$this->u_pass,true);
		$criteria->compare('u_fullname',$this->u_fullname,true);
		$criteria->compare('u_email',$this->u_email,true);
		$criteria->compare('u_contact',$this->u_contact,true);
		$criteria->compare('u_role',$this->u_role,true);
		$criteria->compare('m_id',$this->m_id,true);
		$criteria->compare('u_last_edit',$this->u_last_edit,true);
		$criteria->compare('u_last_login',$this->u_last_login,true);
		$criteria->compare('u_create_at',$this->u_create_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
