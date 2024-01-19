<?php
require "header.php";
require "db-connect.php";
if (isset($_POST['aaa'])) {
    $form = $_POST['aaa'];


    switch ($form) {
        //一覧
        case 'Read':
            echo '<table>';
            $pdo = new PDO($connect, USER, PASS);

            $sql = "SELECT todos.todo_id, todos.task_name, todos.due_date, categories.category_name
            FROM todos
            LEFT JOIN categories ON todos.category_id = categories.category_id";

            foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td>', $row['id'], '</td>';
                echo '<td>', $row['name'], '</td>';
                echo '<td>', $row['create_date'], '</td>';
                echo '<td>', $row['category_name'], '</td>';
                echo '</tr>';
                echo "\n";
            }
            echo '</table>';
            break;


        //登録
        case 'Create':
            echo '<form action="touroku.php" method="post">';
            echo '<input type="text" name="name">';
            echo '<select size="1" name="importance">';
            echo '<option value="importance">1</option>';
            echo '<option value="importance">2</option>';
            echo '<option value="importance">3</option>';
            echo '<option value="importance">4</option>';
            echo '</select>';
            echo '<button type="submit">';
            break;


        //更新
        case 'Update':

            break;


        //削除
        case 'Delete':

            break;

        // デフォルト（初期設定）。いずれでも無かった場合の処理。 ===================
        default:
            //処理処理
            break;
    }

} else {
    // 判別スイッチなしの場合の処理
}
?>

