<?php
require '../db/db.php';

$id = $_GET['id'] ?? '';

$req = $db->prepare('DELETE FROM demo WHERE id = ?');
$req->execute([$id]);