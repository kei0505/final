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
    <table>
        <tr>
            <td>ID</td>
            <td>優先度</td>
            <td>優先度数値</td>
        </tr>
        <?php
        $pdo = new PDO($connect, USER, PASS);
        $sql = ('select * from category');

        foreach ($pdo->query($sql) as $row) {
            echo '<tr>';
            echo '<td>', $row['category_id'], '</td>';
            echo '<td class="star">', $row['category_name'], '</td>';
            echo '<td>', $row['category_num'], '</td>';
            echo '</tr>';
            echo "\n";
        }
        ?>
    </table>
</body>

</html>