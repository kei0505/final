<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
</head>

<body>
    <h1>Todoアプリだよー</h1>
    <div>
        <form action="read.php" method="post">
            <button type="submit" name="Read">一覧</button>
        </form>
        <form action="create.php" method="post">
            <button type="submit" name="Create">追加</button>
        </form>
        <form action="update.php" method="post">
            <button type="submit" name="Update">更新</button>
        </form>
        <form action="delete.php" method="post">
            <button type="submit" name="Delete">削除</button>
        </form>
    </div>
    <hr>
</body>

</html>
