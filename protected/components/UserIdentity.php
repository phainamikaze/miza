<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
 	private $_id;
    //private $_username;
    //public $_fullname;
    public function authenticate()
    {
        $record = Account::model()->findByAttributes(array('Username'=>$this->username));
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->Pass!==$this->password)
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$record->Id;
            $this->setState('role', $record->Role);
            $this->setState('fullname', $record->Fullname);
            $this->setState('my_infrastructureid','');
            $this->setState('my_infrastructurename','');
            $record->LastLogin = new CDbExpression('NOW()');
            $record->save();         
            /*
            foreach ($record->mikrotiks as $mikrotik){
                $my_mikrotik[$mikrotik->m_id] = $mikrotik->m_name;
                if($record->m_id==0){
                    $record->m_id = $mikrotik->m_id;
                    $record->save(); 
                }
            }
            $this->setState('my_mikrotik',$my_mikrotik);
            $this->setState('my_mikrotikid', $record->m_id);
            */  
            $this->errorCode=self::ERROR_NONE;


        }
        return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->_id;
    }

}