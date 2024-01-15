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
    <h1>Todo優先度更新画面だよー</h1>
    <?php require 'select.php'; ?>
    <hr>
    <?php
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('update category set category_name=?, category_num=? where category_id=?');

    if ($sql->execute([$_POST['id'], $_POST['name'], $_POST['num']])) {
        echo 'Todoを更新しました。';
    } else {
        echo ' Todoの更新に失敗しました。';
    }
    ?>
</body>

</html>
