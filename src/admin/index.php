<!-- http://localhost:8080/admin/index.php -->

<?php
require_once('../dbconnect.php'); // 1つ上の階層なので ../

// questionテーブルの検索
$sql = 'SELECT * FROM questions';
$stmt = $dbh->query($sql);
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>問題一覧</title>
    </head>

    <body>
            <h1>問題一覧</h1>
            <table border="1" cellpadding="8">
                <tr>
                    <th>ID</th>
                    <th>内容</th>
                </tr>
                <?php foreach ($questions as $q): ?>
                    <tr>
                        <td><?= htmlspecialchars($q['id']) ?></td>
                        <td>
                            <a href="questions/edit.php?id=<?= htmlspecialchars($q['id']) ?>">
                                <?= htmlspecialchars($q['content']) ?>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <!-- 一件ずつ表示する -->
            </table>
    </body>
</html>
