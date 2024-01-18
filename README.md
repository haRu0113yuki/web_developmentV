【TOPページ】  
index.html  
【MENUページ】  
menu.html  
【予約ページ】  
resservation.html  
【SHOPページ】  
shop_top.php  
shop_cart.php  
shop_input.php  
shop_confirm.php    
shop_finish.html  
delete_cart.php  
delete_input.php  
【CSS】  
style.css  
【フォルダ】  
images（画像）  
memo（メモ）  
design（デザイン画像）  
    
《SHOPページについて》  
データベースを使用  
dbname:webcafe  
username:webcafe  
password:webcafe  
table:cart,paysum,privateinfomation  

cart:"session_id"(var255),"product"(var255),"price"(int255),"quaantity"(int255),"path"(var255)
paysum:"session_id"(var255),"paysum"(int255)
privateinfomation:"session_id"(var255),"fullName"(var255),"postTop"(int3),"postBottom"(int4),"address1"(var255),"address2"(var255),"mail"(var255),"phone"(var13),"date"(date),"time"(var11),"ps"(var255),"paysum"(int11)  


《予約ページについて》  
データベースを使用  
データベース名　yoyaku  
ユーザー名　'root'  
パスワード　''  
  
テーブル名　kyakuzyouhou  
  
テーブル構造  
		名前	タイプ	        照合順序	属性	Null	デフォルト値	  
	1	ban	int(11)                                 はい	null	  	
	2	name	varchar(11)	utf8_general_ci		いいえ	なし	   			
	3	huri	varchar(11)	utf8_general_ci		いいえ	なし	  			
	4	zyuusyo	varchar(40)	utf8_general_ci		いいえ	なし	  			
	5	denwa	varchar(12)	utf8_general_ci		いいえ	なし	     
	6	datetime　datetime				いいえ　なし  
	7	people	int(11)			                いいえ	なし                			
	8	sonota	varchar(255)	utf8_general_ci		いいえ	なし	  	
