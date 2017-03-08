<?php
namespace App\Model\Booking;
use App\Model\Message\Message;
use App\Model\Utility\Utility;
use App\Model\Database\Database;
class Booking extends Database
{
    public $id;
    public $lastInsertId;
    public $name;
    public $email;
    public $gender;
    public $phone;
    public $address;
    public $country;
    public $tour_package;
    public $person_no;
    public $payment_method;
    public $acc_number;
    public $password;
    public $trash_at;

    public function __construct()
    {
        parent::__construct();
    }
    public function prepare(array $data){
        if(array_key_exists('id',$data)){
            $this->id = $data['id'];
        }
        if(array_key_exists('name',$data)){
            $this->name = $data['name'];
        }
        if(array_key_exists('email',$data)){
            $this->email = $data['email'];
        }
        if(array_key_exists('gender',$data)){
            $this->gender = $data['gender'];
        }
        if(array_key_exists('phone',$data)){
            $this->phone = $data['phone'];
        }

        if(array_key_exists('address',$data)){
            $this->address = $data['address'];
        }

        if(array_key_exists('country',$data)){
            $this->country = $data['country'];
        }

        if(array_key_exists('tour_package',$data)){
            $this->tour_package = $data['tour_package'];
        }

        if(array_key_exists('person_no',$data)){
            $this->person_no = $data['person_no'];
        }
        if(array_key_exists('payment_method',$data)){
            $this->payment_method = $data['payment_method'];
        }

        if(array_key_exists('acc_number',$data)){
            $this->acc_number = $data['acc_number'];
        }

        if(array_key_exists('password',$data)){
            $this->password = $data['password'];
        }
        return $this;
    }

    public function store(){
        $sql = "INSERT INTO `booking`(`name`, `email`, `gender`, `phone`, `address`, `country`, `tour_package`, `person_no`, `payment_method`, `acc_number`, `password`)
                VALUES ('{$this->name}','{$this->email}','{$this->gender}',{$this->phone},'{$this->address}','{$this->country}','{$this->tour_package}',{$this->person_no},'{$this->payment_method}',{$this->acc_number},'{$this->password}')";
        $result = $this->conn->query($sql);
        $this->lastInsertId = $this->conn->insert_id;
        if ($result){
            Message::message("<div class=\"alert alert-success\">
                                <strong>Success</strong>
                                You Inserted Data Successfully
                              </div>");
            header("Location:bookingView.php?id={$this->lastInsertId}");
        }else{
            Message::message("<div class=\"alert alert-warning\">
                                <strong>Success</strong>
                                You are not Inserted Data Successfully
                              </div>");
            header("Location:booking.php");
        }
    }


    public function selectAll(){
        $sql = "SELECT * FROM `booking` WHERE `trash_at` IS NULL";
        $result = $this->conn->query($sql);
        $all = array();
        if($result){
            while($row = $result->fetch_object()){
                $all[] = $row;
            }
        }
        return $all;
    }

    public function selectById(){
        $sql = "SELECT * FROM `booking` WHERE `id`={$this->id}";
        $result = $this->conn->query($sql);
        $row = "";
        if($result){
            $row = $result->fetch_object();
        }
        return $row;
    }

    public function update(){
        $sql = "UPDATE `booking` 
                SET `name`='{$this->name}',
                     `email` = '{$this->email}',
                     `gender` = '{$this->gender}',
                     `phone` = '{$this->phone}',
                     `address` = '{$this->address}',
                     `country` = '{$this->country}',
                     `tour_package` = '{$this->tour_package}',
                     `person_no` = '{$this->person_no}',
                     `payment_method` = '{$this->payment_method}',
                     `acc_number` = '{$this->acc_number}',
                     `password` = '{$this->password}' 
                WHERE `id`= {$this->id}";
        $result = $this->conn->query($sql);
        if ($result){
            Message::message("<div class=\"alert alert-success\">
                                <strong>Update!</strong>
                                You Update Data Successfully
                              </div>");
            header("Location:allBooking.php");
        }else{
            Message::message("<div class=\"alert alert-warning\">
                                <strong>Sorry!</strong>
                                You are not Updated Data Successfully
                              </div>");
            header("Location:allBooking.php");
        }
    }

    public function delete(){
        $sql = "DELETE FROM `booking` WHERE `id` = {$this->id}";
        $result = $this->conn->query($sql);
        if ($result){
            Message::message("<div class=\"alert alert-success\">
                                <strong>Delete!</strong>
                                You Delete Data Successfully
                              </div>");
            header("Location:allBooking.php");
        }else{
            Message::message("<div class=\"alert alert-warning\">
                                <strong>Sorry!</strong>
                                You are not Deleted Data Successfully
                              </div>");
            header("Location:allBooking.php");
        }
    }

    public function trash(){
        $this->trash_at = time();
        $sql = "UPDATE `booking` SET `trash_at` = '{$this->trash_at}' WHERE `id`={$this->id}";
        $result = $this->conn->query($sql);
        
        if ($result){
            Message::message("<div class=\"alert alert-success\">
                                <strong>Trash!</strong>
                                You Trash Data Successfully
                              </div>");
            header("Location:allBooking.php");
        }else{
            Message::message("<div class=\"alert alert-warning\">
                                <strong>Sorry!</strong>
                                You are not Trash Data Successfully
                              </div>");
            header("Location:allBooking.php");
        }
    }

    public function amount(){
        $this->lastInsertId = $this->conn->insert_id;
        $sql = "SELECT `person_no` FROM `booking` WHERE `id`={$this->lastInsertId}";
        $result = $this->conn->query($sql);
        $row = "";
        if($result){
            $row = $result->fetch_object();
        }
        $amount = $row*1000;
        return $amount;
    }













}