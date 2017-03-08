<?php
namespace App\Model\Contact;
use App\Model\Database\Database;
use App\Model\Message\Message;
use App\Model\Utility\Utility;

class Contact extends Database
{
    public $id = "";
    public $name = "";
    public $email = "";
    public $phone_no = "";
    public $subject = "";
    public $deleted_at = "";
    public $multiple_deleted = "";
    public $conn;

    public function __construct()
    {
        parent::__construct();
    }

    public function prepare($data)  {
        if(array_key_exists("id",$data)){
            $this->id=$data["id"];
        }
        if (array_key_exists("name", $data)) {
            $this->name = $data["name"];
        }
        if (array_key_exists("email", $data)) {
            $this->email = $data["email"];
        }
        if (array_key_exists("phone_no", $data)) {
            $this->phone_no = $data["phone_no"];
        }
        if (array_key_exists("subject", $data)) {
            $this->subject = $data["subject"];
        }
        return $this;
    }


public function store()
{
    $query = "INSERT INTO `tourism`.`contact` (`name`, `email`, `phone_no`, `subject`) VALUES ('" . $this->name . "', '" . $this->email . "', '" . $this->phone_no . "', '" . $this->subject . "')";
    $result = mysqli_query($this->conn, $query);
    if ($result) {
        Message::message("Data has benn stored successfully");
        Utility::redirect('../../home.php');
    } else {
        Message::message("Data has not been stored successfully");
        //Utility::redirect('home.php');
    }
}

public function selectAll()
{
    $query = "SELECT * FROM contact WHERE `deleted_at` IS NULL";
    $result = mysqli_query($this->conn, $query);
    $allContact=array();
    while($row= mysqli_fetch_object($result)){
        $allContact[] = $row;
    }
    return $allContact;
}

public function view(){
    $query="SELECT * FROM `contact` WHERE `id`=".$this->id;
    $result= mysqli_query($this->conn,$query);
    $row= mysqli_fetch_object($result);
    return $row;
}

public function update()
{
    $query = "UPDATE `contact` SET `id`,`name`,`email`,`phone_no`,`subject` WHERE `contact`.`id` = " . $this->id;
    $result = mysqli_query($this->conn, $query);
    if ($result) {
        Message::message("<div class=\"alert alert-info\">
  <strong>Updated!</strong> Data has been updated successfully.
</div>");
        header("Location:home.php");

    } else {
        Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been updated successfully.
</div>");
        header("Location:home.php");;

    }

}

public function delete()
{
    $query = "DELETE FROM `tourism`.`contact` WHERE `contact`.`id` =" . $this->id;
    $result = mysqli_query($this->conn, $query);
    if ($result) {
        Message::message("<div class=\"alert alert-info\">
  <strong>Updated!</strong> Data has been deleted successfully.
</div>");
        header("Location:home.php");

    } else {
        Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been deleted successfully.
</div>");
        header("Location:home.php");


    }
}

public function trash()
{
    $this->deleted_at = time();
    $query = "UPDATE `tourism`.`contact` SET `deleted_at` = '" . $this->deleted_at . "' WHERE `contact`.`id` = " . $this->id;
    $result = mysqli_query($this->conn, $query);
    if ($result) {
        Message::message("<div class=\"alert alert-info\">
  <strong>Updated!</strong> Data has been trashed successfully.
</div>");
        header("Location:home.php");

    } else {
        Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been trashed successfully.
</div>");
        header("Location:home.php");


    }


}

public function trashList()
{
    $query = "SELECT * FROM `contact` WHERE `deleted_at` IS NOT NULL";
    $result = mysqli_query($this->conn, $query);
    if ($result) {
        Message::message("<div class=\"alert alert-info\">
  <strong>Updated!</strong> Data has been trashed successfully.
</div>");
        header("Location:home.php");

    } else {
        Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been trashed successfully.
</div>");
        header("Location:home.php");


    }
}

public function recover()
{
    $query = "UPDATE `tourism`.`contact` SET `deleted_at` =NULL WHERE `contact`.`id` = " . $this->id;
    $result = mysqli_query($this->conn, $query);
    if ($result) {
        Message::message("<div class=\"alert alert-info\">
    <strong>Updated!</strong> Data has been trashed successfully.
    </div>");
        header("Location:home.php");

    } else {
        Message::message("<div class=\"alert alert-danger\">
    <strong>Error!</strong> Data has not been trashed successfully.
    </div>");
        header("Location:home.php");
    }
}

    public function recoverMultiple($idS=array()){
        if((is_array($idS))&& count($idS)>0) {
            $IDs = implode(",", $idS);
            $query = "UPDATE `tourism`.`contact` SET `deleted_at` =NULL WHERE `contact`.`id` IN(" . $IDs . ")";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                Message::message("<div class=\"alert alert-info\">
        <strong>Updated!</strong> Selected Data has been recovered successfully.
        </div>");
                header("Location:home.php");

            } else {
                Message::message("<div class=\"alert alert-danger\">
        <strong>Error!</strong> Selected Data has not been recovered successfully.
        </div>");
                header("Location:home.php");

            }
        }
    }
    public function count(){
        $sql = "SELECT COUNT(*) AS totalItem FROM `tourism`.`contact`";
        $result = $this->conn->query($sql);
        $row = $result->fetch_object();
        return $row->totalItem;
    }

    public function paginator($pageStartFrom=0,$limit=5){
        $query = "SELECT * FROM `contact` LIMIT {$pageStartFrom}, {$limit}";
        $result = $this->conn->query($query);
        $allContact = array();
        if($result){
            while($row = $result->fetch_object()){
                $allContact[]=$row;
            }
        }
        return $allContact;
    }
}