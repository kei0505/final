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
    <h1>Todo更新画面だよー</h1>
    <?php require 'select.php'; ?>
    <hr>
    <?php
    $pdo = new PDO($connect, USER, PASS);
    $categoryNum = $_POST['importance'];
    $findCategoryIdQuery = "SELECT category_id FROM category WHERE category_num = ?";
    $categoryIdStatement = $pdo->prepare($findCategoryIdQuery);
    $categoryIdStatement->execute([$categoryNum]);
    $categoryId = $categoryIdStatement->fetchColumn();

    $insertTodoQuery = 'UPDATE Todo SET name=?, update_date=CURDATE(), category_id=? WHERE id=?';  // 修正したクエリ
    
    $insertTodoStatement = $pdo->prepare($insertTodoQuery);

    // 修正：executeメソッドに渡す配列の要素数を合わせる
    if ($insertTodoStatement->execute([$_POST['name'], $categoryId, $_POST['id']])) {
        echo 'Todoを更新しました。';
    } else {
        echo ' Todoの更新に失敗しました。';
    }
    ?>
</body>

</html>
