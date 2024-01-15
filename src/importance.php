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
    <h1>Todo優先度管理画面だよー</h1>
    <?php require 'select.php'; ?>
    <hr>
    <div class="select-cg">
        <form action="create-cg.php" method="post">
            <button type="submit" name="Create">追加</button>
        </form>
        <form action="update-select-cg.php" method="post">
            <button type="submit" name="Update">更新</button>
        </form>
        <form action="delete-cg.php" method="post">
            <button type="submit" name="Delete">削除</button>
        </form>
    </div>
</body>

</html>
