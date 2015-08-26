<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    public function authenticate()
    {
        $user = New UserLDAPAuth($this->username, $this->password);
        Yii::app()->user->setState('LDAP', $user->getId() );
        if ($user->getIsError()) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else {
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
}