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
    <h1>Todo登録完了画面だよー</h1>
    <?php require 'select.php'; ?>
    <hr>
    <?php
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('insert into Todo(name, create_date, category_id) values(?,current_date,?)');
    if ($sql->execute([$_POST['name'], $_POST['importance']])) {
        echo 'Todoを追加しました。';
    } else {
        echo 'Todoの追加に失敗しました。';
    }
    ?>
</body>

</html>
