<?php

mb_language("ja");
mb_internal_encoding("UTF-8");

//var_dump($_POST);

// 変数の初期化
$page_flag = 0;

if( !empty($_POST['btn_confirm']) ) {
	$page_flag = 1;
	// セッションの書き込み
	session_start();
	$_SESSION['page'] = true;

} elseif( !empty($_POST['btn_submit']) ) {
	session_start();
	if( !empty($_SESSION['page']) && $_SESSION['page'] === true ) {

	// セッションの削除
	unset($_SESSION['page']);

	$page_flag = 2;

	// 変数とタイムゾーンを初期化
	$header = null;
	$auto_reply_subject = null;
	$auto_reply_text = null;
	$admin_reply_subject = null;
	$admin_reply_text = null;
	date_default_timezone_set('Asia/Tokyo');

	// ヘッダー情報を設定
	$header = "MIME-Version: 1.0\n";
	$header .= "From: ∧°┐ <pehu@creative-community.space>\n";
	$header .= "Reply-To: ∧°┐ <pehu@creative-community.space>\n";

	// 件名を設定
	$auto_reply_subject = 'Order | The Things I (We) Own';

	// 本文を設定
	$auto_reply_text .= "お問い合わせありがとうございます。\n";
	$auto_reply_text .= "近日中にご返信します。今しばらくお待ちください。\n\n";
	$auto_reply_text .= "あなたの名前 | Your Name\n" . $_POST['name'] . "\n\n";
	$auto_reply_text .= "内容 | Comment\n" . nl2br($_POST['contact']) . "\n\n\n";
	$auto_reply_text .= "Posted on " . date("m-d-Y H:i") . "\n";
	$auto_reply_text .= "creative-community.space/org/";

	// メール送信
	mb_send_mail( $_POST['email'], $auto_reply_subject, $auto_reply_text, $header);

	// 運営側へ送るメールの件名
	$admin_reply_subject = "Order | The Things I (We) Own";

	// 本文を設定
	$admin_reply_text .= "Order | The Things I (We) Own\n\n\n";
	$admin_reply_text .= "Name\n" . $_POST['name'] . "\n";
	$admin_reply_text .= "Email\n" . $_POST['email'] . "\n\n";
	$admin_reply_text .= "Comment\n" . nl2br($_POST['contact']) . "\n\n\n";
	$admin_reply_text .= "Posted on " . date("m-d-Y H:i") . "\n";
	$admin_reply_text .= "creative-community.space/coding/";

	// 運営側へメール送信
	mb_send_mail( 'pehu@creative-community.space', $admin_reply_subject, $admin_reply_text, $header);

	} else {
		$page_flag = 0;
	}
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Order | The Things I (We) Own</title>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<style type="text/css">

@font-face {
    font-family: "ipag";
    src: url("https://creative-community.space/coding/fontbook/family/IPA/ipag.ttf");
}
html,
#form input[type="date"],
#form input[type="name"],
#form input[type="text"],
#form input[type="url"],
#form input[type="email"],
#form input[type="reset"],
#form input[type="password"],
#form input[type="submit"],
#form textarea,
#form button,
#form select,
#form .radio {
    font-family: "ipag", monospace;
    transform: scale(1, 1.25);
}

#contents #main {font-size:2.5vw;}
#contents #main p {width:auto; display:block;}
#contents #confirm {
  width:100%;
  display: flex;
  flex-direction: row;
}
#contents #confirm p {
  font-size:2.5vw;
  display:inline-block;
  padding:1.25% 2.5%;
  width:45%;
}
#contents h1 {font-size:4vw; padding:0 2.5%;}
#contents #hello,
#contents #comment,
#contents #next {
  display:block;
  clear:both;
  font-size:2.5vw;
  padding:1.25% 2.5%;
  width:90%;
}
#contents #comment {
  border:1px solid;
  border-radius:2vw;
  margin:auto;
  }
</style>
</head>
<body>
<div id="contents">
<div id="main">
<h1>The Things I (We) Own</h1>
<p>自分の所有するものを記録するホームページを作るワークショップを予約する</p>
</div>
</div>
<div id="form">
<?php if( $page_flag === 1 ): ?>

<form action="" method="post">
<div id="contents">
<div id="confirm">
<p>Your Name<br/><b><?php echo $_POST['name']; ?></b></p>
<p>Email<br/><b><?php echo $_POST['email']; ?></b></p>
</div>
<div id="comment">
<p><?php echo nl2br($_POST['contact']); ?></p>
</div>

<p id="next">
<input type="submit" name="btn_back" value="Back">
<input type="submit" name="btn_submit" value="Post">
</p>

<input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
<input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
<input type="hidden" name="contact" value="<?php echo $_POST['contact']; ?>">
</div>
</form>

<?php elseif( $page_flag === 2 ): ?>
<div id="contents">
<div id="hello">
<h1 class="fontmotion">Thank You for Your Order</h1>
<p>ワークショップへのご予約を承りました。</p>
<p>フォームに入力いただいたメールアドレスまで、ご予約内容を自動返信いたします。<br/>自動返信メールが届かなかった場合は、お手数ですが、pehu@creative-community.space まで改めてご連絡ください。</p>
</div>
</div>

<?php else: ?>
<section>
<form action="" method="post">

<input id="name" type="name" name="name" placeholder="あなたの名前 | Your Name" value="<?php if( !empty($_POST['name']) ){ echo $_POST['name']; } ?>" required>
<input id="email" type="email" name="email" placeholder="メールアドレス | Email" value="<?php if( !empty($_POST['email']) ){ echo $_POST['email']; } ?>" required>
<br/>
<textarea name="contact" placeholder="内容 | Comment" required><?php if( !empty($_POST['contact']) ){ echo $_POST['contact']; } ?></textarea>
<p><input type="submit" name="btn_confirm" value="Submit"></p>
</form>
</section>
<?php endif; ?>

</div>
</body>
</html>
