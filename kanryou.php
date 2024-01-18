
<?php
session_start();

// セッションに予約データが存在するか確認
if (!isset($_SESSION['confirmation_data'])) {
    // データが利用できない場合はフォームページにリダイレクト
    header("Location: reservation.php");
    exit;
}

// セッションから予約データを取得
$confirmation_data = $_SESSION['confirmation_data'];

// 予約データが表示されるHTMLを作成
$reservation_info = "
    <p>氏名: {$confirmation_data['name']}</p>
    <p>ふりがな: {$confirmation_data['huri']}</p>
    <p>住所: {$confirmation_data['zyuusyo']}</p>
    <p>電話番号: {$confirmation_data['denwa']}</p>
    <p>予約日時: {$confirmation_data['datetime']}</p>
    <p>人数: {$confirmation_data['people']}</p>
    <p>その他の必要事項: {$confirmation_data['sonota']}</p>
";

// セッションデータをクリア
unset($_SESSION['confirmation_data']);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>カフェサイト(仮称)</title>
	<link rel="stylesheet" href="style.css">
</head>
<body style="display: flex; flex-direction: column; min-height: 100vh;">
	<header id="same">
		<h1 class="name">Name</h1>
		<h1><a href="index.html">TOP</a></h1>
		<h1><a href="menu.html">Menu</a></h1>
		<h1><a href="http://localhost/web_developmentV-main/web_developmentV-main/reservation.php">Reserve</a></h1>
		<h1><a href="http://localhost/web_developmentV-main/web_developmentV-main/shop_top.php">Shop</a></h1>
	</header>
	<main style="flex: 1;">
    
        <img src="images/thankyou.png" alt="ありがとう" style="max-width: 100%; display: block; margin: 0 auto;">
        <p style="text-align: center; margin: 0 auto; color: red; font-weight: bold; font-size: large;">以下は予約内容です。ご確認ください。</p>

        <br>
        <div style="text-align: center; margin: 0 auto;">
            <?php echo $reservation_info; ?>
        </div>
        <br>
        <br>
      <p style="text-align: center; margin: 0 auto; font-weight: bold; font-size: larger;">ご予約いただきありがとうございます。</p>

        
        

    </main>
	<footer id="samefoot">
	<h1><a href="index.html">TOP</a></h1>
	<h1><a href="menu.html">Menu</a></h1>
	<h1><a href="http://localhost/web_developmentV-main/web_developmentV-main/reservation.php">Reserve</a></h1>
	<h1><a href="http://localhost/web_developmentV-main/web_developmentV-main/shop_top.php">Shop</a></h1>
	</footer>
</body>
</html>
