<?php require 'db-connect.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
</head>
<body>
    <?php
    $i = $_POST['importance'];
    $star;
    for($j=0; $j<$i; $j++) {
        $star += "☆";
    }
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('insert into category set category_name=?, category_num=?');
    if ($sql->execute([$star,$_POST['importance']])) {
        echo 'Todoを更新しました。';
    } else {
        echo ' Todoの更新に失敗しました。';
    }
    ?>
</body>
</html>
