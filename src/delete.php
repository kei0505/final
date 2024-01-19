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
    <h1>Todo削除画面だよー</h1>
    <?php require 'select.php'; ?>
    <hr>
    <form action="delete-result.php" method="post">
        <table>
            <tr>
                <td></td>
                <td>ID</td>
                <td>タスク名</td>
                <td>作成日</td>
                <td>更新日</td>
                <td>優先度</td>
            </tr>
            <?php
            $pdo = new PDO($connect, USER, PASS);
            $sql = "SELECT Todo.id, Todo.name, Todo.create_date, Todo.update_date, category.category_name
            FROM Todo
            LEFT JOIN category ON Todo.category_id = category.category_id
            GROUP BY Todo.id";

            foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td><input type="checkbox" name="todo[]" value=', $row['id'], '></td>';
                echo '<td>', $row['id'], '</td>';
                echo '<td>', $row['name'], '</td>';
                echo '<td>', $row['create_date'], '</td>';
                echo '<td>', $row['update_date'], '</td>';
                echo '<td class="star">', $row['category_name'], '</td>';
                echo '</tr>';
                echo "\n";
            }
            ?>
        </table>
        <div class="btn">
            <button type="submit" class="btn1">削除する</button>
        </div>
    </form>
</body>

</html>
