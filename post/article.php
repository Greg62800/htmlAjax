<?php

require '../db/db.php';

$req = $db->query('SELECT * FROM demo');
$demo = $req->fetchAll();
?>

<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($demo as $post): ?>
            <tr>
                <td><?= $post['name']; ?></td>
                <td>
                    <a href="#" onclick="deletePost(<?= $post['ID']; ?>);">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    var deletePost = function(id) {
        if(confirm('Sûr ?')) {
            $.post('post/deletePost.php?id=' + id, function(response) {
                $('#success').text('L\'article a bien été supprimé').fadeIn();
                setInterval(function() {
                    $('#success').fadeOut();
                }, 2000);
            });
        }else {
            $('#success').text('Impossiblde de supprimer l\'article');
        }
        return false;
    }
</script>