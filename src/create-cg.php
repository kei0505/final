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
    <h1>Todo優先度追加画面だよー</h1>
    <?php require 'select.php'; ?>
    <hr>
    <form action="create-result-cg.php" method="post">
        <p>優先度<br><input type="text" name="num"></p>
        <button type="submit">追加する</button>
    </form>
</body>

</html>
