<?php
namespace App\Model\Package;
use App\Model\Database\Database;
use App\Model\Message\Message;
class Package extends Database
{
    public $id;
    public $package_id;
    public $img_name;
    public $title;
    public $tour_place;
    public $tour_location;
    public $hotel_name;
    public $duration;
    public $vehicle;
    public $package_cost;

    public function __construct()
    {
        parent::__construct();
    }

    public function prepare(array $data){
        if(array_key_exists("id",$data)){
            $this->id = $data["id"];
        }
        if(array_key_exists("img_name",$data)){
            $this->img_name = $data["img_name"];
        }
        if(array_key_exists("title",$data)){
            $this->title = $data["title"];
        }
        if(array_key_exists("tour_place",$data)){
            $this->tour_place = $data["tour_place"];
        }
        if(array_key_exists("tour_location",$data)){
            $this->tour_location = $data["tour_location"];
        }
        if(array_key_exists("hotel_name",$data)){
            $this->hotel_name = $data["hotel_name"];
        }
        if(array_key_exists("duration",$data)){
            $this->duration = $data["duration"];
        }
        if(array_key_exists("vehicle",$data)){
            $this->vehicle = $data["vehicle"];
        }
        if(array_key_exists("package_cost",$data)){
            $this->package_cost = $data["package_cost"];
        }
        return $this;
    }

    public function store(){

        $sql = "INSERT INTO `package`(`title`, `tour_place`, `tour_location`, `hotel_name`, `duration`, `vehicle`, `package_cost`)
                VALUES
                ('{$this->title}','{$this->tour_place}','{$this->tour_location}','{$this->hotel_name}','{$this->duration}','{$this->vehicle}','{$this->package_cost}')";
         $result = $this->conn->query($sql);
        $this->package_id = $this->conn->insert_id;

        $sql2= "INSERT INTO `img_package`(`package_id`,`img_name`)
              VALUES ({$this->package_id},'{$this->img_name}')";
         $result1 = $this->conn->query($sql2);

        if ($result && $result1){
            Message::message("<div class=\"alert alert-success\">
                                <strong>Success</strong>
                                You Insertd Data Successfully
                              </div>");
            header("Location:createPackage.php");
        }else{
            Message::message("<div class=\"alert alert-warning\">
                                <strong>Success</strong>
                                You are not Inserted Data Successfully
                              </div>");
            header("Location:createPackage.php");
        }
        
    }


    public function selectAll(){
        $sql = "SELECT * FROM `package`
                LEFT JOIN `img_package`
                ON `package`.`id` = `img_package`.`package_id`
                ORDER BY `package`.`id`";
        $result = $this->conn->query($sql);

        $allPackage = array();
        if($result){
            while($row = $result->fetch_object()){
                $allPackage[] = $row;
            }
        }
        return $allPackage;

    }

    public function selectById(){

        $sql = "SELECT * FROM `package`
                LEFT JOIN `img_package`
                ON `package`.`id` = `img_package`.`package_id`
                WHERE `package`.`id` = {$this->id}";
        $result = $this->conn->query($sql);

        $row = "";
        if($result){
            $row = $result->fetch_object();
        }
        return $row;
    }

    public function update(){
    
    $sql="UPDATE `package` LEFT JOIN `img_package` ON `package`.`id`=`img_package`.`package_id`
                SET `package`.`title`= '{$this->title}',
                  `package`.`tour_place`='{$this->tour_place}',
                  `package`.`tour_location`='{$this->tour_location}',
                  `package`.`hotel_name`='{$this->hotel_name}',
                  `package`.`duration`='{$this->duration}',
                  `package`.`vehicle`='{$this->vehicle}',
                  `package`.`package_cost`='{$this->package_cost}',
                  `img_package`.`package_id`={$this->id},
                  `img_package`.`img_name`= '{$this->img_name}'
                   WHERE `package`.`id` = {$this->id}";

        $result = $this->conn->query($sql);

        if ($result){
            Message::message("<div class=\"alert alert-success\">
                                <strong>Success</strong>
                                You Update Data Successfully
                              </div>");
            header("Location:createPackage.php");
        }else{
            Message::message("<div class=\"alert alert-warning\">
                                <strong>Success</strong>
                                You are not Updated Data Successfully
                              </div>");
            header("Location:createPackage.php");
        }
    }

    public function delete(){
        $sql="DELETE `package`,`img_package` FROM `package` LEFT JOIN `img_package` ON `package`.`id`=`img_package`.`package_id` WHERE `package`.`id` = {$this->id}";
        $result = $this->conn->query($sql);
                if ($result && $result1){
            Message::message("<div class=\"alert alert-success\">
                                <strong>Success</strong>
                                You Deleted Data Successfully
                              </div>");
        }else{
            Message::message("<div class=\"alert alert-warning\">
                                <strong>Success</strong>
                                You are not Deleted Data Successfully
                              </div>");
        }
    }


}