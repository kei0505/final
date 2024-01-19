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
    <h1>Todo登録画面だよー</h1>
    <?php require 'select.php'; ?>
    <hr>
    <form action="touroku.php" method="post">
        <p>タイトル<br><input type="text" name="name" placeholder="Todo名を入力してください"></p>
        <?php
        echo '<p>優先度<br><select name="importance">';
        $pdo = new PDO($connect, USER, PASS);
        $sql = $pdo->query('select category_num from category');
        foreach ($sql as $row) {
            echo '<option value="', $row['category_num'], '">', $row['category_num'], '</option>';
        }
        echo '</select></p>';
        ?>
        <div class="btn">
            <button type="submit" class="btn1">追加する</button>
        </div>
    </form>
</body>

</html>
