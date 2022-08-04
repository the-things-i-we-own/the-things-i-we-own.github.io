<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$org = (string)filter_input(INPUT_POST, 'org');
$title = (string)filter_input(INPUT_POST, 'title');
$text = (string)filter_input(INPUT_POST, 'text');

$fp = fopen('about.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$org, $title, $text,]);
    rewind($fp);
}

flock($fp, LOCK_SH);
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
flock($fp, LOCK_UN);
fclose($fp);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="searchBox.css" />
    <style>
        :root {
            --about-bg: #fff;
            --about-text: orange;
            --about-border: dashed 1px purple;
            --about-decoration: pink wavy underline;
            --about-a: pink;
        }
        
        #about p u {
            float: right;
            text-transform: uppercase;
            font-size: 75%;
            margin: 0;
            padding: 0.125rem 0.25rem;
            text-decoration: none;
            color: orange;
            background: pink;
            border: solid 1px orange;
            border-radius: 0.25rem;
            display: block;
        }

        #about {
            position: relative;
            color: var(--about-text);
            background-color: var(--about-bg);
        }

        #about hr {
            margin: 2rem 0;
            border: none;
            border-bottom: var(--about-border);
        }

        #about h2 {
            padding: 1rem 1rem 0.25rem;
        }

        #about p {
            font-size: 0.75rem;
            margin: 0;
            padding: 1rem;
            font-weight: 500;
            display: block;
            transform: scale(1, 1.25);
        }
        
        #about p a {
            display: inline-block;
            font-size: 75%;
            margin: 0 0.25rem;
            color: var(--about-a);
            text-decoration: var(--about-decoration);
        }
        
        #about p b {
            font-size: 150%;
            display: inline-block;
        }
    </style>
</head>

<body>
    <ol id="about" class="org">
        <h2>ｎａｋａｏｋａｏｒｉ</h2>
        <p>このホームページについて</p>
        <p>カバービジュアルは、大切なものの写真です</p>
        <p>リストの最後には、カバービジュアルに掲載したものをコメント付きで紹介しています</p>
        <p>今後、写真付きで紹介したいものがあれば追加していきます</p>
        <p>リストの区分について</p>
        <p>1.身につける</p>
        <p>2.食事</p>
        <p>3.住まい</p>
        <p>3-a.日用品</p>
        <p>3-b.道具</p>
        <p>3-c.置物・飾り</p>
        <hr/>
        <h2>絞り込みについて</h2>
        <br/>
        <?php if (!empty($rows)): ?>
        <?php foreach ($rows as $row): ?>
        <li class="list_item list_toggle" data-org="<?=h($row[0])?>">
            <p>
                <u><?=h($row[0])?></u>
                <b><?=h($row[1])?></b>
            </p>
            <p><?=h($row[2])?></p>
        </li>
        <?php endforeach; ?>
        <?php else: ?>
        <li class="list_item list_toggle" data-org="test">
            <p>
                <u>ORG</u>
                <b>カテゴリ名</b>
            </p>
            <p>カテゴリの説明</p>
        </li>
        <?php endif; ?>
        <br/>
        <p>Links <a href="#" target="_blank">Title</a></p>
    </ol>

    <script src="index.js"></script>
</body>

</html>
