
<?php
    if(isset($_POST['submit'])) {
        //名前が送信されたら以下の処理を行う
        //この部分は変更してもいい

        //「予約フォーム」からの情報をそれぞれ変数に格納しておく↓

$name=htmlspecialchars($_POST["name"], ENT_QUOTES);
$huri=htmlspecialchars($_POST["huri"], ENT_QUOTES);
$zyuusyo=htmlspecialchars($_POST["zyuusyo"], ENT_QUOTES);
$denwa=htmlspecialchars($_POST["denwa"], ENT_QUOTES);
$datetime=htmlspecialchars($_POST["datetime"], ENT_QUOTES);
$people=htmlspecialchars($_POST["people"], ENT_QUOTES);
$sonota=htmlspecialchars($_POST["sonota"], ENT_QUOTES);




        //「予約フォーム」からの情報をそれぞれ変数に格納しておく↑


 session_start();
    $_SESSION['confirmation_data'] = [
        'name' => $name,
        'huri' => $huri,
        'zyuusyo' => $zyuusyo,
        'denwa' => $denwa,
        'datetime' => $datetime,
        'people' => $people,
        'sonota' => $sonota,
    ];

    header("Location:reservationkakunin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>カフェサイト(仮称)</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header id="same">
        <h1 class="name">Name</h1>
        <h1><a href="index.html">TOP</a></h1>
        <h1><a href="menu.html">Menu</a></h1>
        <h1><a href="http://localhost/web_developmentV-main/reservation.php">Reserve</a></h1>
        <h1><a href="http://localhost/web_developmentV-main/shop_top.php">Shop</a></h1>
    </header>
     <main>
        
        <h1 style="text-align: center;">お客様情報</h1>
        <form action="" method="POST">
        <label style="font-weight: bold;" for="name">氏名</label><br>
        <input type="text" id="name" name="name" required>
        <br>
        <label style="font-weight: bold;" for="name">ふりがな</label><br>
        <input type="text" id="huri" name="huri" required><br>
        <label style="font-weight: bold;" for="name">連絡先</label><br>
        <div class="renraku">
            <div style="font-weight: bold;" class="zyuusyo">住所</div>
            <div style="font-weight: bold;" class="denwa">電話番号</div>
        </div>
        <br>
        <div class="ren">
            <input type="text" id="zyuusyo" name="zyuusyo" required>
            <input type="text" id="denwa" name="denwa" required>
        </div>
        <label style="font-weight: bold;" for="datetime">予約日時:</label>
        <input type="datetime-local" id="datetime" name="datetime" required>

        <br>
        <label style="font-weight: bold;" for="people">人数</label>
        <select id="people" name="people" required>
            <option value="">人数を選択してくてださい</option>
            <option value="1">1人</option>
            <option value="2">2人</option>
            <option value="3">3人</option>
            <option value="4">4人</option>
            <option value="5">5人</option>
            <option value="6">6人</option>
            <option value="7">7人</option>
            <option value="8">8人</option>
            <option value="9">9人</option>
            <option value="10">10人</option>
        </select>
        <br>
        <br>
        <label2 for="sonota">その他の必要事項</label2>
        <input type="text" id="sonota" name="sonota">
            <input type="reset" value="リセット" style="font-size: 14px;">
          <br>  
            <input type="submit" value="確認画面へ" alt="確認画面へ" name="submit" class="custom-button">
            <br>
        </form>
    </main>

    <footer id="samefoot">
        <h1><a href="index.html">TOP</a></h1>
        <h1><a href="menu.html">Menu</a></h1>
        <h1><a href="http://localhost/web_developmentV-main/reservation.php">Reserve</a></h1>
        <h1><a href="http://localhost/web_developmentV-main/shop_top.php">Shop</a></h1>
    </footer>
</body>
</html>
