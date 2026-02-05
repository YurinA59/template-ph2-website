<?php
header('Content-Type: text/html; charset=utf8');

$dsn = 'mysql:host=db;dbname=posse;charset=utf8';
$user = 'root';
$password = 'root';

$options = [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
];

try {
    $dbh = new PDO($dsn, $user, $password, $options);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connection success!';
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}


// questionテーブルの検索
$sql = 'SELECT * FROM questions';
    //sqlという名前の変数は''の中の文字列ですよ。ただし何も実行はしません
    // もし""なら文字列として認識されないので変数として使われるかも？？

// SQLを実行して結果を取得（テーブルの検索）
$stmt = $dbh->query($sql);
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // stmtはstatementのことで結果を表す。
    // データベースに実際に接続するためのオブジェクト（一番上で書いたPDOはあくまでもクラス名
    // みたいな感じでまだ使用できるものではないので、それを実際に使用できるものに変えたもの）
    //->query($sql)は $sql に書かれたSQL文を実行するメソッド

    // fetchAll()：全部の行を一気に取り出す
    // PDO::FETCH_ASSOC：取り出すときに「連想配列の形」で取り出す
    // つまり無駄な重複をなくして、軽くて分かりやすい形にするため
    // 多分だけどdisplay flex とかdisplay columnみたいにいろいろあるうちの一つだと思う。

// 画面に表示
echo '<h2>Questionsテーブルの中身</h2>';
echo '<ul>';
foreach ($questions as $question) {
    echo '<li>';
    echo 'ID: ' . htmlspecialchars($question['id']) . '<br>';
    echo '内容: ' . htmlspecialchars($question['content']) . '<br>';
    echo '画像: ' . htmlspecialchars($question['image']) . '<br>';
    echo '補足: ' . htmlspecialchars($question['supplement']);
    echo '</li><hr>';
}
echo '</ul>';
// echoは出力
// foreachとは配列の中身を1つずつ取り出して、同じ処理を繰り返すための文
// ($questions as $question)は、
// データがたくさん入った配列（例：質問が6件）その中から1件ずつ $question に取り出すという感じ
// htmlspecialchars() は、HTMLタグなどがそのまま表示されるようにする安全対策
// （タグをただの文字とみなすことでJAVASCRIPTなどと間違えないようにする！）

// choicesテーブルの検索
$sql = 'SELECT * FROM choices';
$stmt = $dbh->query($sql);
$choices = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<h2>choicesテーブルの中身</h2>';
    echo '<pre>';
    var_dump($choices);
    echo '</pre>';
// <pre> は preformatted（プリフォーマット） の略で、
// スペースや改行をそのまま表示してくれるHTMLタグ
// var_dump() は、変数の中身を「型」や「構造」ごとに詳しく表示してくれる関数
// つまり＜h1＞りんご＜h1＞みたいに表示されるということ。
?>
