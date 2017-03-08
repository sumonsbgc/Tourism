<?php
namespace App\Model\User;
include_once "../../../vendor/autoload.php";
use App\Model\Database\Database as DB;
use App\Model\Utility\Utility;
use App\Model\Message\Message;

class User extends DB{

    public $id;
    public $name;
    public $user_name;
    public $date;
    public $email;
    public $password;

    public function __construct()
    {
        parent::__construct();
    }

    public function prepare(array $data){

        if(array_key_exists('name',$data)){
            $this->name=$data['name'];
        }

        if(array_key_exists('user_name',$data)){
            $this->user_name=$data['user_name'];
        }

        if(array_key_exists('email',$data)){
            $this->email=$data['email'];
        }

        if(array_key_exists('password',$data)){
            $this->password=md5($data['password']);
        }

        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }
        return $this;
    }

    public function store(){
        $this->date = date("Y/m/d");
        $sql = "INSERT INTO `user`(`name`, `user_name`, `email`, `password`, `date`) VALUES ('{$this->name}','{$this->user_name}','{$this->email}','{$this->password}','{$this->date}')";
        $result = $this->conn->query($sql);
        echo $sql;
        if ($result) {
            Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> Data has been stored successfully.
                </div>");
            //Utility::redirect("loginPage.php");
        } else {
            Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Fail!</strong> Data has not been stored successfully.
                </div>");
            //Utility::redirect("loginPage.php");
        }
    }


}