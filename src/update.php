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
    <table>
        <tr>
            <td>ID</td>
            <td>タスク名</td>
            <td>作成日</td>
            <td>更新日</td>
            <td>優先度</td>
        </tr>
        <?php
        $pdo = new PDO($connect, USER, PASS);
        if (isset($_POST['upd'])) {
            $sql = $pdo->prepare('SELECT * FROM Todo WHERE id = ?');
            if ($sql->execute([$_POST['upd']])) {
                foreach ($sql as $row) {
                    echo '<tr>';
                    echo '<form action="update-result.php" method="post">';
                    echo '<td>';
                    echo $row['id'];
                    echo '<input type="hidden" name="id" value="', $row['id'], '">';
                    echo '</td>';
                    echo '<td>';
                    echo '<input type="text" name="name" value="', $row['name'], '">';
                    echo '</td>';
                    echo '<td>';
                    echo $row['create_date'];
                    echo '<input type="hidden" name="create_date" value="', $row['create_date'], '">';
                    echo '</td> ';
                    echo '<td>';
                    echo $row['update_date'];
                    echo '<input type="hidden" name="update_date" value="', $row['update_date'], '">';
                    echo '</td> ';
                    echo '<td>';
                    echo
                        '<select name="importance">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>';
                    echo '</td>';
                    echo '</tr>';
                    echo "\n";
                    echo '</table>';
                    echo '<button type="submit" name="Update">更新する</button>';
                    echo '</form>';
                }
            } else {
                echo 'Todoの削除に失敗しました。';
            }
        } else {
            echo '削除するTodoが選択されていません。';
        }


        ?>
</body>

</html>
