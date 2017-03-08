<?php
namespace App\Model\Post;
use App\Model\Database\Database;
use App\Model\Message\Message;
class Post extends Database
{
    public $id;
    public $title;
    public $content;
    public $category;
    public $deleted_at;
    public $post_id;
    public $img_post;

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
        if (array_key_exists("category", $data)) {
            $this->category = $data["category"];
        }
        if (array_key_exists("deleted_at", $data)) {
            $this->deleted_at = $data["deleted_at"];
        }
        if (array_key_exists("post_id", $data)) {
            $this->post_id = $data["post_id"];
        }
        if (array_key_exists("img_post", $data)) {
            $this->img_post = $data["img_post"];
        }
        return $this;
    }


    public function store()
    {
        $sql = "INSERT INTO `post`(`title`, `content`, `category`) VALUES ('{$this->title}','{$this->content}','{$this->category}')";
        $result = $this->conn->query($sql);
        echo $sql;
        $this->post_id = $this->conn->insert_id;
        $sql2 = "INSERT INTO `img_post`(`post_id`, `img_post`) VALUES ('{$this->post_id}','{$this->img_post}')";
        $result2 = $this->conn->query($sql2);

        if ($result && $result2){
            Message::message("<div class=\"alert alert-success\">
                                <strong>Success</strong>
                                You Insert Data Successfully
                              </div>");
            header("Location:post.php");
        }else{
            Message::message("<div class=\"alert alert-warning\">
                                <strong>Success</strong>
                                You did not Insert Data Successfully
                              </div>");
            header("Location:post.php");
        }

    }

    public function selectAll()
    {
        $sql = "SELECT * FROM `post`
                LEFT JOIN `img_post`
                ON `post`.`id` = `img_post`.`post_id`
                ORDER BY `post`.`id`";
        $result = $this->conn->query($sql);
        $allPost = array();
        if ($result) {
            while ($row = $result->fetch_object()) {
                $allPost[] = $row;
            }
        }
        return $allPost;
    }

    public function selectById()
    {
        $sql = "SELECT * FROM `post`
                LEFT JOIN `img_post`
                ON `post`.`id` = `img_post`.`post_id`
                WHERE `post`.`id`={$this->id}";
        $result = $this->conn->query($sql);
        $row = "";
        if ($result) {
            $row = $result->fetch_object();
        }
        return $row;
    }


    public function selectByCategory(){
        $sql = "SELECT `category` FROM `post`";
        $result = $this->conn->query($sql);
        $cat = array();
        if($result){
            while ($row = $result->fetch_object()) {
                $cat[] = $row;
            }
        }
        return $cat;
    }


    public function update(){
        $query="UPDATE `post` 
                LEFT JOIN `img_post`
                ON `post`.`id` = `img_post`.`post_id`
                SET `post`.`title`='{$this->title}',
                    `post`.`content`='{$this->content}',
                    `post`.`category`='{$this->category}',
                    `post`.`img_post`='{$this->img_post}',
                WHERE `post`.`id`='{$this->id}";
        $result=$this->conn->query($query);

        if ($result){
            Message::message("<div class=\"alert alert-success\">
                                <strong>Success!</strong>
                                You Update Data Successfully
                              </div>");
            header("Location:post.php");
        }else{
            Message::message("<div class=\"alert alert-warning\">
                                <strong>Success</strong>
                                You are not Updated Data Successfully
                              </div>");
            header("Location:post.php");
        }
    }


    public function delete(){
        $query="DELETE `post`,`img_post` FROM `post`
                LEFT JOIN `img_post`
                ON `post`.`id` = `img_post`.`post_id`
                WHERE `post`.`id`='{$this->id}";
        $result=$this->conn->query($query);

    }


    public function multiple_delete(){

    }

    public function trash(){
        $this->deleted_at=time();
        $query="UPDATE `post` 
                LEFT JOIN `img_post`
                ON `post`.`id` = `img_post`.`post_id`
                SET `post`.`title`='{$this->title}',
                    `post`.`content`='{$this->content}',
                    `post`.`category`='{$this->category}',
                    `post`.`img_post`='{$this->img_post}',
                    
                WHERE `post`.`id`='{$this->id}";
        $result=$this->conn->query($query);
    }

    public function trashList(){
        $sql = "SELECT * FROM `post`
                LEFT JOIN `img_post`
                ON `post`.`id` = `img_post`.`post_id`
                ORDER BY `post`.`id`";
        $result = $this->conn->query($sql);
        $allPost = array();
        if ($result) {
            while ($row = $result->fetch_object()) {
                $allPost[] = $row;
            }
        }
        return $allPost;
    }

    public function count(){
        $sql = "SELECT * FROM `post`
                LEFT JOIN `img_post`
                ON `post`.`id` = `img_post`.`post_id`
                ORDER BY `post`.`id`";
        $result = $this->conn->query($sql);
        $allPost = array();
        if ($result) {
            while ($row = $result->fetch_object()) {
                $allPost[] = $row;
            }
        }
        return $allPost;

    }

    public function recover(){
        $query="UPDATE `post` 
                LEFT JOIN `img_post`
                ON `post`.`id` = `img_post`.`post_id`
                SET `post`.`title`='{$this->title}',
                    `post`.`content`='{$this->content}',
                    `post`.`category`='{$this->category}',
                    `post`.`img_post`='{$this->img_post}',
                    
                WHERE `post`.`id`='{$this->id}";
        $result=$this->conn->query($query);
    }

    public function recoverMultiple($idS=array())
    {
        if ((is_array($idS)) && (count($idS)) > 0) {
            $IDs = implode(",", $idS);
            $query = "UPDATE `post` 
                LEFT JOIN `img_post`
                ON `post`.`id` = `img_post`.`post_id`
                SET `post`.`title`='{$this->title}',
                    `post`.`content`='{$this->content}',
                    `post`.`category`='{$this->category}',
                    `post`.`img_post`='{$this->img_post}',
                    
                WHERE `post`.`id` IS IN (" . $IDs . ")";
            $result = $this->conn->query($query);
        }
    }



}