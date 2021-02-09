<?php
declare(strict_types=1);


namespace App\Model;

use DateTime;

class Model
{
    public function __construct()
    {
        $this->mysqli = mysqli_connect("localhost", "user_forum", "gN5zQ21mCFaHQYRU", "forum");
    }
    public function validateRegister(array $POST)
    {
        session_start();
        $login = $POST["login"];
        $password = password_hash($POST["password"], PASSWORD_DEFAULT);
        $mail = $POST['mail'];
        $userName = $this->searchUserByName($login);
        // TODO 1 :Dodanie aby nie powtarzac nazw uzytkownika
        $res = mysqli_query($this->mysqli, "INSERT INTO users(login,password,mail) VALUES ('$login','$password','$mail')");
        header("Location: /");
    }
    public function searchUserByName(string $name)
    {
        $res = mysqli_query($this->mysqli, "SELECT * FROM users WHERE login = '$name' ");
        $rows = mysqli_fetch_assoc($res);
        return $rows;
    }
    public function requestLogin(array $POST):void
    {
        session_start();
    
        $password = $POST["password"];
        $login = $POST["login"];
        $res = mysqli_query($this->mysqli, "SELECT * FROM users WHERE login = '$login'");
       
        $row = mysqli_fetch_assoc($res);
        if (!$row["password"]) {
            setcookie("login", "false");
            header("Location: /?action=failLogin");
        }

        if (password_verify($password, $row["password"])) {
            $_SESSION['user'] = $login;
            setcookie("login", "true");
            header("Location: /");
        } else {
            setcookie("login", "false");
            header("Location: /?action=failLogin");
        }
    }
    public function logoutUser():void
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        header("Location: /");
    }
    public function getArticles():array
    {
        $res = mysqli_query($this->mysqli, "SELECT * FROM articles");
        $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
        return $rows ?? [];
    }
    public function getNews():array
    {
        $res = mysqli_query($this->mysqli, "SELECT * FROM news");
        $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
        return $rows ?? [];
    }
    public function getReviews():array
    {
        $res = mysqli_query($this->mysqli, "SELECT * FROM reviews");
        $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
        return $rows ?? [];
    }
    public function getPosts():array
    {
        $res = mysqli_query($this->mysqli, "SELECT * FROM forum ORDER BY id DESC");
        $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
        return $rows ?? [];
    }
    public function addPost(array $POST):void
    {
        session_start();
        $title = $POST["title"];
        $content = $POST["content"];
        $author = $_SESSION['user'];
        $date = date('Y-m-d H:i:s');
        $res = mysqli_query($this->mysqli, "INSERT INTO forum(title,content,author,date) VALUES ('$title','$content','$author','$date')");
        header("Location: /?action=forum");
    }
    public function addComment(array $POST):void
    {
        session_start();
        $id = $POST['id'];
        $comment = $POST["comment"];
        $author = $_SESSION['user'];
        $date = date('Y-m-d H:i:s');
        $res = mysqli_query($this->mysqli, "INSERT INTO comments(comment,author,date,articleId) VALUES ('$comment','$author','$date','$id')");
        header("Location: /?action=forum");
    }
    public function getComments():array
    {
        $res = mysqli_query($this->mysqli, "SELECT * FROM comments ");
        $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
        return $rows ?? [];
    }
}
