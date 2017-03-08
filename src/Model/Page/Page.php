<?php
namespace App\Model\Page;
use App\Model\Database\Database;
use App\Model\Message\Message;

class Page extends Database
{
    public $id;
    public $title;
    public $content;
    public $img_name;
    public $trash_at;


    public function __construct()
    {
        parent::__construct();
    }

    public function prepare(array $data)
    {
        if (array_key_exists("id", $data)) {
            $this->id = $data["id"];
        }
        if (array_key_exists("title", $data)) {
            $this->title = $data["title"];
        }
        if (array_key_exists("content", $data)) {
            $this->content = $data["content"];
        }
        if (array_key_exists("img_name", $data)) {
            $this->img_name = $data["img_name"];
        }
        return $this;
    }

    public function store()
    {
        $query = "INSERT INTO `tourism`.`page` ( `title`, `content`, `img_name`) VALUES ('{$this->title}', '{$this->content}', '{$this->img_name}')";
        $result = $this->conn->query($query);
        if ($result){
            Message::message("<div class=\"alert alert-success\">
                                <strong>Success</strong>
                                You Insertd Data Successfully
                              </div>");
            header("Location:createPage.php");
        }else{
            Message::message("<div class=\"alert alert-warning\">
                                <strong>Success</strong>
                                You are not Inserted Data Successfully
                              </div>");
            header("Location:createPage.php");
        }
    }
    public function selectAll()
    {
        $_allPage = array();
        $query = "SELECT * FROM `page` WHERE `trash_at` IS NULL";
        $result = $this->conn->query($query);
        while ($row = $result->fetch_object()) {
            $_allPage[] = $row;
        }
        return $_allPage;
    }

    public function selectById()
    {
        $query = "SELECT * FROM `page` WHERE `id` = {$this->id}";
        $result = $this->conn->query($query);
        $row = "";
        if ($result) {
            $row = $result->fetch_object();
        }
        return $row;
    }

    public function update()
    {
        $query = "UPDATE `page` SET `title`='" . $this->title . "',`content`='" . $this->content . "',`img_name`='" . $this->img_name . "' WHERE `page`.`id`='" . $this->id . "'";
        $result = $this->conn->query($query);
        if ($result) {
            header("Location:page.php");
        }
    }

    public function delete()
    {
        $query = "DELETE FROM `tourism`.`page` WHERE `page`.`id` = '" . $this->id . "'";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            header("Location:page.php");
        }
    }

    public function trash()
    {
        $this->deleted_at = time();
        $query = "UPDATE `tourism`.`page` SET `trash_at` = '" . $this->trash_at . "' WHERE `page`.`id` ='" . $this->id . "'";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            header("Location.page.php");
        }
    }

    public function trashed()
    {
        $_allPage = array();
        $query = "SELECT * FROM `page` WHERE `trash_at` IS NOT NULL";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_object($result);
        while ($row = mysqli_fetch_object($result)) {
            $_allPage[] = $row;
        }
        return $_allPage;
    }

    public function recover()
    {
        $this->deleted_at = time();
        $query = "UPDATE `tourism`.`page` SET `trash_at` = '" . $this->trash_at . "' WHERE `page`.`id` ='" . $this->id . "'";
        $result = mysqli_query($this->conn, $query);
    }

    public function recoverMultiple($idS = array())
    {
        if ((is_array($idS)) && count($idS) > 0) {
            $IDs = implode(",", $idS);
            $query = "UPDATE `tourism`.`page` SET `trash_at` = '" . $this->trash_at . "' NULL WHERE `page`.`id`IN ('" . $IDs . "')";
            $result = mysqli_query($this->conn, $query);
        }
    }

    public function deleteMultiple($ids)
    {
        if ((is_array($ids)) && (count($ids) > 0)) {
            $IDS = implode(",", $ids);
            $sql = "DELETE FROM `atomicprojectb20`.`birthday` WHERE `birthday`.`id` IN ({$IDS})";
            $query = "DELETE FROM `tourism`.`page` WHERE `page`.`id` IN ({$IDS})";
            $result = $this->conn->query($sql);
        }
    }

}