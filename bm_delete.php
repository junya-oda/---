<!-- 削除処理を記載するシート -->
<?php
$id = $_GET["id"];

require_once('funcs.php');
$pdo = db_conn();

$stmt = $pdo->prepare(
    'DELETE FROM
        gs_bm_table
    WHERE
        id = :id
    ;'
);

$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('index.php');
}