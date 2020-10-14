<?php

namespace App;

class TestDBConn extends Dbh
{

    public function fetchData()
    {
        $sql = "select * from posts";
        $stmt = $this->connect()->query($sql);

        while ($row = $stmt->fetch()) {
            echo $row['body'] . "<br>";
        }
    }

    public function fetchByTitle($title, $body)
    {
        $sql = "select * from posts where title = ? and body = ?";
        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$title, $body]);

        $post = $stmt->fetchAll();

        foreach ($post as $t) {
            echo $t['url'];
        }
    }

    public function addPost($title, $body, $uri)
    {
        $sql = "insert into posts(title, body, url, user_id) values (?,?,?, 1)";
        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$title, $body, $uri]);
    }
}
