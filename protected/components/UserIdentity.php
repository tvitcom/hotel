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

    public function authenticate()
    {
        $user_record = User::model()->findByAttributes(array(
            'login' => $this->username,
        ));
        if ($user_record === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } elseif (
            !CPasswordHelper::verifyPassword($this->password, $user_record->passhash)
        ) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this->_id = $user_record->id;
            $this->setState('title', $user_record->login);
            $this->errorCode = self::ERROR_NONE;
        }
        return $this->errorCode === self::ERROR_NONE;
    }

    public function getId()
    {
        return $this->_id;
    }
}
