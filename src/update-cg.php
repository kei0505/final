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
    <table>
        <tr>
            <td>ID</td>
            <td>優先度</td>
            <td>優先度数値</td>
        </tr>
        <?php
        $pdo = new PDO($connect, USER, PASS);
        if (isset($_POST['upd'])) {
            $sql = $pdo->prepare('SELECT * FROM category WHERE category_id = ?');
            if ($sql->execute([$_POST['upd']])) {
                foreach ($sql as $row) {
                    echo '<tr>';
                    echo '<form action="update-result-cg.php" method="post">';
                    echo '<td>';
                    echo $row['category_id'];
                    echo '<input type="hidden" name="id" value="', $row['category_id'], '">';
                    echo '</td>';
                    echo '<td>';
                    echo '<input type="text" name="name" value="', $row['category_name'], '">';
                    echo '</td>';
                    echo '<td>';
                    echo '<input type="text" name="num" value="', $row['category_num'], '">';
                    echo '</td> ';
                    echo '</tr>';
                    echo "\n";
                    echo '</table>';
                    echo '<button type="submit" name="Update">更新する</button>';
                    echo '</form>';
                }
            } else {
                echo 'Todoの更新に失敗しました。';
            }
        } else {
            echo '更新するTodoが選択されていません。';
        }


        ?>
</body>

</html>
