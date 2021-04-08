<!-- 更新された画面を表示させるシート -->
<?php
require_once('funcs.php');
$pdo = db_conn();
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE id =' . $id . ';');
$status = $stmt->execute();

if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->
    <!-- Main[Start] -->
    <form method="post" action="bm_update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>ブックマークDB</legend>
                <label>書籍名：<input type="text" name="book_name" value="<?= $result['book_name'] ?>"></label><br>
                <label>書籍URL：<input type="text" name="book_url" value="<?= $result['book_url'] ?>"></label><br>
                <label>書籍コメント：<input type="text" name="book_comment" value="<?= $result['book_comment'] ?>"></label><br>
                <label><textArea name="naiyou" rows="4" cols="40"><?= $result['naiyou'] ?></textArea></label><br>
                <input type="hidden" name="id" value="<?= $result['id'] ?>">
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->
</body>
</html>