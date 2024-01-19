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
    <h1>Todo優先度追加完了画面だよー</h1>
    <?php require 'select.php'; ?>
    <hr>

    <?php
    $i = $_POST['num'];
    $star = "";
    for($j=0; $j<$i; $j++) {
        $star .= "☆";
    }
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('insert into category(category_name, category_num) values(?,?)');
    if ($sql->execute([$star, $_POST['num']])) {
        echo 'Todoの優先度を追加しました。';
    } else {
        echo '優先度の追加に失敗しました。';
    }
    ?>
</body>

</html>
