<?php require 'db-connect.php'; ?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Todo</title>
</head>

<body>
    <h1>Todo削除完了画面だよー</h1>
    <?php require 'select.php'; ?>
    <hr>
    <?php
    // var_dump($_POST);
    $pdo = new PDO($connect, USER, PASS);

    if (isset($_POST['todo']) && is_array($_POST['todo'])) {
        $sql = $pdo->prepare('DELETE FROM Todo WHERE id = ?');

        foreach ($_POST['todo'] as $todoId) {

            if ($sql->execute([$todoId])) {
                echo 'Todoを削除しました。<br>';
            } else {
                echo 'Todoの削除に失敗しました。<br>';
            }
        }
    } else {
        echo '削除するTodoが選択されていません。';
    }
    ?>
</body>

</html>
