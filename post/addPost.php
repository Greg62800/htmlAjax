<?php
require '../db/db.php';


if(!empty($_POST)) {
    $name = $_POST['name'];
    $content = $_POST['content'];

    $req = $db->prepare('SELECT * FROM demo WHERE name = ?');
    $req->execute([$name]);
    $user = $req->fetch();
    if(!$user) {
        $req = $db->prepare('INSERT INTO demo SET name = ?, content = ?');
        $req->execute([$name, $content]);
        die('L\'article a bien été ajouté');
    }else {
        die('Le titre est dèjà pris');
    }
}