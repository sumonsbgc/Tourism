<?php
namespace App\Model\User;
use App\Model\Database\Database as DB;
use App\Model\Utility\Utility;
use App\Model\Message\Message;

class Auth extends DB{

    public $email;
    public $password;

    public function __construct()
    {
        parent::__construct();
    }

    public function prepare(array $data)
    {
        if(array_key_exists('email',$data)){
            $this->email=$data['email'];
        }
        if(array_key_exists('password',$data)){
            $this->password=md5($data['password']);
        }
        return $this;
    }

    public function is_exist()
    {
        $query = "SELECT * FROM `user` WHERE `email`='".$this->email."'";
        $result = mysqli_query($this->conn, $query);
        //$row= mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function is_registered()
    {
        $query = "SELECT * FROM `user` WHERE `email`='".$this->email."' AND `password`='".$this->password."'";
        $result = mysqli_query($this->conn, $query);
        //$row= mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public function logout(){
        if ((array_key_exists('email', $_SESSION)) && (!empty($_SESSION['email']))) {
            $_SESSION['email'] = "";
            return TRUE;
        }
    }
    
    public function logged_in()
    {
        if ( (array_key_exists('email', $_SESSION)) && (!empty($_SESSION['email'])) ) {
            return TRUE;
        }
    }


}