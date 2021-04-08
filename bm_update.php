<!-- 更新処理を記載するシート -->
<?php
require_once('funcs.php');
$pdo = db_conn();

$book_name = $_POST['book_name'];
$book_url = $_POST['book_url'];
$book_comment = $_POST['book_comment'];
$id = $_POST["id"];

$stmt = $pdo->prepare(
    "UPDATE
        gs_bm_table
    SET
        book_name =  :book_name,
        book_url =  :book_url,
        book_comment =  :book_comment,
        book_date =  sysdate()
    WHERE
        id = :id
    ;"
);

$stmt->bindValue(':book_name', $book_name, PDO::PARAM_STR);
$stmt->bindValue(':book_url', $book_url, PDO::PARAM_STR);
$stmt->bindValue(':book_comment', $book_comment, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    sql_error($stmt);
} else {
    redirect('bm_list_view.php');
}