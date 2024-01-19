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
    <h1>Todo優先度削除完了画面だよー</h1>
    <?php require 'select.php'; ?>
    <hr>
    <?php
    // var_dump($_POST);
    $pdo = new PDO($connect, USER, PASS);

    if (isset($_POST['cate']) && is_array($_POST['cate'])) {
        $sql = $pdo->prepare('DELETE FROM category WHERE category_id = ?');

        foreach ($_POST['cate'] as $cateId) {

            if ($sql->execute([$cateId])) {
            } else {
                echo 'Todoの優先度削除に失敗しました。<br>';
            }
        }
        echo 'Todoの優先度を削除しました。<br>';
    } else {
        echo '削除するTodo優先度が選択されていません。';
    }
    ?>
</body>

</html>
