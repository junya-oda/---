<!-- データ「表示」・「入力」用シート -->
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
    <form method="post" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>ブックマークDB</legend>
                <label>書籍名：<input type="text" name="book_name"></label><br>
                <label>書籍URL：<input type="text" name="book_url"></label><br>
                <label>書籍コメント：<input type="text" name="book_comment"></label><br>
                <label><textArea name="naiyou" rows="4" cols="40"></textArea></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->
</body>
</html>