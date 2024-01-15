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
    <h1>Todo優先度更新画面だよー</h1>
    <?php require 'select.php'; ?>
    <hr>
    <form action="update-cg.php" method="post">
        <table>
            <tr>
                <td></td>
                <td>ID</td>
                <td>優先度</td>
                <td>優先度数値</td>
            </tr>
            <?php
            $pdo = new PDO($connect, USER, PASS);
            $sql = ('select * from category');

            foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td><input type="radio" name="upd" value="', $row['category_id'], '"></td>';
                echo '<td>', $row['category_id'], '</td>';
                echo '<td>', $row['category_name'], '</td>';
                echo '<td>', $row['category_num'], '</td>';
                echo '</tr>';
                echo "\n";
            }
            ?>
        </table>
        <button type="submit">更新</button>
    </form>
</body>

</html>
