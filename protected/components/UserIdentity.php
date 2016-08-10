<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    private $_id;

    public function authenticate() {
        //$username = strtolower($this->username);
        $username = $this->username;
        //$user = Usuario::model()->find('LOWER(usu_nombreusuario)=?', array($username));
        $user = Usuario::model()->find('usu_nombreusuario=?', array($username));
        //var_dump($user);
        //Yii::app()->end();
        if ($user === null){
            //echo "<br><br><br> entre por user null";
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }else if (!$user->validatePassword($this->password)){
            //echo "<br><br><br> entre password incorrecta";
            $this->errorCode = self::ERROR_PASSWORD_INVALID;

       /* else if ($user->usu_estado === 1) 
            $this->errorCode = self::ERROR_USER_INACTIVE;*/

        }else {
            
            //Yii::app()->end();
        

            $this->_id = $user->usu_id;
            $this->username = $user->usu_nombreusuario;
            $this->errorCode = self::ERROR_NONE;

            /* Consultamos los datos del usuario por el username ($user->username) */
            //$info_usuario = Usuario::model()->find('LOWER(usu_nombreusuario)=?', array($user->usu_nombreusuario));
            /* En las vistas tendremos disponibles last_login y perfil pueden setear las que requieran */
            //$this->setState('last_login', $info_usuario->last_login);
            //$this->setState('perfil', $info_usuario->perfil);

            /* Actualizamos el last_login del usuario que se esta autenticando ($user->username) */
            /*$sql = "update usuario set last_login = now() where username='$user->username'";
            $connection = Yii::app()->db;
            $command = $connection->createCommand($sql);
            $command->execute();*/
        }
        //Yii::app()->end();
        return $this->errorCode == self::ERROR_NONE;
    }

    public function getId() {
        return $this->_id;
    }

    /*public function authenticate()
    {
        $users=array(
            // username => password
            'demo'=>'demo',
            'admin'=>'admin',
        );
        if(!isset($users[$this->username]))
        $this->errorCode=self::ERROR_USERNAME_INVALID;
        elseif($users[$this->username]!==$this->password)
        $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        $this->errorCode=self::ERROR_NONE;
        return !$this->errorCode;
    }*/
}
