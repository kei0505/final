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
    try {
        $pdo = new PDO($connect, USER, PASS);

        // 1. category_num から category_id を見つけるクエリ
        $categoryNum = $_POST['importance'];
        $findCategoryIdQuery = "SELECT category_id FROM category WHERE category_num = ?";
        $categoryIdStatement = $pdo->prepare($findCategoryIdQuery);
        $categoryIdStatement->execute([$categoryNum]);
        $categoryId = $categoryIdStatement->fetchColumn();

        // 2. Todo テーブルに新しいレコードを挿入
        $insertTodoQuery = "INSERT INTO Todo (name, create_date, category_id) VALUES (?, current_date, ?)";
        $insertTodoStatement = $pdo->prepare($insertTodoQuery);

        if ($insertTodoStatement->execute([$_POST['name'], $categoryId])) {
            echo 'Todoを追加しました。';
        } else {
            echo 'Todoの追加に失敗しました。';
        }
    } catch (PDOException $e) {
        echo 'エラー：' . $e->getMessage();
    }
    ?>
</body>

</html>
