<!-- 更新されたデータ一覧表示シート -->
<?php
require_once('funcs.php');
$pdo = db_conn();
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<p>';
        $view .= h($result['book_name']) . ' : ' . h($result['book_url']) . ' ' . h($result['book_comment']) . ' ' . h($result['book_date']);
        $view .= '<a href="bm_delete.php?id=' . $result['id'] . '">';
        $view .= '[削除]';
        $view .= '</a>';
        $view .= '</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>(更新後)データ登録</title>
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">データ登録</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->
    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
            <a href="bm_update_view.php"></a>
            <?= $view ?>
        </div>
    </div>
    <!-- Main[End] -->
</body>
</html>