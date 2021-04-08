<!-- データ「登録」用シート -->
<!-- 
①表示・入力用のindex.phpを作成
②登録用のinsert.phpを作成
1.POSTデータ取得
2.DB接続
3.データ登録処理後の動きを設定
③(+α)ブラウザ表示用のselect.phpを作成
-->

<?php
// 1.POSTデータ取得
$book_name = $_POST['book_name'];
$book_url = $_POST['book_url'];
$book_comment = $_POST['book_comment'];

// 2.DB接続(Username・Passはデフォルトのroot使用)
try {
    $pdo = new PDO('mysql:dbname=junya_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}
// 2.(1) SQL文を用意(:で無効化し忘れないこと！)
$stmt = $pdo->prepare(
    "INSERT INTO
        gs_bm_table(id, book_name, book_url, book_comment, book_date)
    VALUES(
        NULL, :book_name, :book_url, :book_comment, sysdate())"
);
// 2.(2) バインド変数を用意 
$stmt->bindValue(':book_name', $book_name, PDO::PARAM_STR);
$stmt->bindValue(':book_url', $book_url, PDO::PARAM_STR);
$stmt->bindValue(':book_comment', $book_comment, PDO::PARAM_STR);
// 2.(3) 実行
$status = $stmt->execute();

// 3.データ登録処理後
if ($status == false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("ErrorMessage:" . print_r($error, true));
} else {
    //index.phpへリダイレクト
    header('Location: index.php');
}