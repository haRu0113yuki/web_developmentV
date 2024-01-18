
<?php
session_start();
if (!isset($_SESSION['confirmation_data'])) {
    // データが利用できない場合はフォームページにリダイレクト
    header("Location: reservation.php");
    exit;
} else {
    // セッションからデータを取得
    $confirmation_data = $_SESSION['confirmation_data'];
}

// ユーザーが確認した場合はデータをデータベースに挿入
if (isset($_POST['confirm'])) {
    // データベース接続設定
    $dsn = 'mysql:dbname=yoyaku;host=localhost';
    $db_user = 'root';
    $db_password = '';

    try {
        $db = new PDO($dsn, $db_user, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // 例外を有効にする

        // プリペアドステートメントを使用してデータベースに挿入
        $stmt = $db->prepare("INSERT INTO kyakuzyouhou (ban, name, huri, zyuusyo, denwa, datetime, people, sonota) VALUES (NULL, :name, :huri, :zyuusyo, :denwa, :datetime, :people, :sonota)");

        // パラメータに値をバインド
        $stmt->bindParam(':name', $confirmation_data['name']);
        $stmt->bindParam(':huri', $confirmation_data['huri']);
        $stmt->bindParam(':zyuusyo', $confirmation_data['zyuusyo']);
        $stmt->bindParam(':denwa', $confirmation_data['denwa']);
        $stmt->bindParam(':datetime', $confirmation_data['datetime']);
        $stmt->bindParam(':people', $confirmation_data['people']);
        $stmt->bindParam(':sonota', $confirmation_data['sonota']);

        // プリペアドステートメントを実行
        $stmt->execute();

        // セッションデータをクリア
        

        header("Location: kanryou.php"); // 成功ページにリダイレクト
        exit;
    } catch (PDOException $e) {
        // エラーページにリダイレクトなどの適切なエラーハンドリング
        echo "データベースエラー：" . $e->getMessage();
        // 例外が発生した場合、このページでエラーメッセージを表示するか、ログに記録するなどの処理が必要
    }
}
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
		<h1><a href="reservation.php">Reserve</a></h1>
		<h1><a href="shop_top.php">Shop</a></h1>
	</header>
	<main style="flex: 1;">
     
        <h1 style="text-align: center;">入力内容の確認</h1>
        <form action="" method="post">
            <label for="name">氏名</label><br>
            <span style="text-align: center; display: block;"><?php echo htmlspecialchars($confirmation_data['name'], ENT_QUOTES); ?></span>
            <br>
             <label for="name">ふりがな</label><br>
            <span style="text-align: center; display: block;"><?php echo htmlspecialchars($confirmation_data['huri'], ENT_QUOTES); ?></span>
            <label for="name">連絡先</label><br>
            <div class="renraku">
                <div style="font-weight: bold;" class="zyuusyo">住所</div>
                <div  class="denwa">電話番号</div>
            </div>
            <br>
            <div class="ren">
               <span style="margin-right: 300px;"><?php echo htmlspecialchars($confirmation_data['zyuusyo'], ENT_QUOTES); ?></span>
               <span style="margin-left: 300px;"><?php echo htmlspecialchars($confirmation_data['denwa'], ENT_QUOTES); ?></span>
            </div>
            <label for="name">予約日時</label><br>
           <span style="text-align: center; display: block;"><?php echo htmlspecialchars($confirmation_data['datetime'], ENT_QUOTES); ?></span><br>
            <label for="people">人数</label>
            <span style="text-align: center; display: block;"><?php echo htmlspecialchars($confirmation_data['people'], ENT_QUOTES); ?></span>
            <br>
            <br>
            <label2 for="sonota">その他の必要事項</label2>
            <span style="text-align: center; display: block;"><?php echo htmlspecialchars($confirmation_data['sonota'], ENT_QUOTES); ?></span>
            <br>
            <div class="button-container">
             <input type="button" value="戻る" onClick="history.back()" class="custom-button">
             <input type="submit"  alt="送信" name="confirm" class="custom-button2">
              
            </div>
            
        </form>
    </main>
	<footer id="samefoot">
	<h1><a href="index.html">TOP</a></h1>
	<h1><a href="menu.html">Menu</a></h1>
	<h1><a href="reservation.php">Reserve</a></h1>
	<h1><a href="shop_top.php">Shop</a></h1>
	</footer>
</body>
</html>