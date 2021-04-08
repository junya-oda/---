<!-- 「一覧表示」用シート -->
<?php
require_once('funcs.php');

//1.DB接続
// 関数化後
$pdo = db_conn();
// try {
//     $pdo = new PDO('mysql:dbname=junya_db;charset=utf8;host=localhost', 'root', 'root');
// } catch (PDOException $e) {
//     exit('DBConnectError' . $e->getMessage());
// }
//２.データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();
//３.データ表示
$view = "";
if ($status == false) {
    // 関数化後
    sql_error($status);
    // execute（SQL実行時にエラーがある場合）
    // $error = $stmt->errorInfo();
    // exit('ErrorQuery:' . print_r($error, true));
} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<p>';

        // 更新
        $view .= '<a href="bm_update_view.php?id=' . $result['id'] . '">';
        $view .= h($result['book_name']) . ' : ' . h($result['book_url']) . ' ' . h($result['book_comment']) . ' ' . h($result['book_date']);
        $view .= '</a>';

        // 削除
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
    <title>データ登録</title>
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