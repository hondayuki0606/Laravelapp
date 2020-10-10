<?php

$host = '10.207.171.16';
$db_user = 'hoge';
$db_password = 'hoge';
//$username='root';
//$password='password';
$dbname = 'mysql';
$charset = 'utf8';

// $link = mysql_connect($host, $db_user, $db_password);
// mysql_select_db($dbname);
// echo mysql_errno($link) . ": " . mysql_error($link). "\n";


//mysql用のDSN文字列
$dsn = 'mysql:dbname=' . $dbname . ';host=' . $host . ';charset=' . $charset;

try {
  $dbh = new PDO($dsn, $db_user, $db_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

  // 値の取得
  $user_id = $_POST['user_id'];
  // イメージファイル
  //$image = $_FILES['image']['tmp_name'];
  $file_name = $_FILES['image']['name'];
  //$image = $_FILES['image']['size'];
  //$image = file_get_contents($_FILES["image"]["tmp_name"]);

  // リクエストBodyからファイルのデータを取得.
  $image = file_get_contents($_FILES['image']['tmp_name']);
  // 取得したバイナリデータを画像(jpg)として保存.
  file_put_contents($file_name, $image);

  //$image = bin2hex(file_get_contents($_FILES['image']['name']));

  $img_path = 'https://ibop-asia.net/check/setagaya/5AA26541-2738-42B1-8124-CDE58E81419F.jpg'; //例として、この時一番売れてる本の画像にしておきました。
  $images = file_get_contents($img_path);
  $img_binary = bin2hex($image);
  // 取得したバイナリデータを画像(jpeg)として保存.
  //$image= $_FILES['image']['tmp_name'] 
  // $cont = file_get_contents('$image', true);
  //画像(バイナリデータ)を16進数に変換
  // $img_binary = bin2hex($image);

  $lat = $_POST['lat'];
  $lot = $_POST['lot'];
  $comment = $_POST['comment'];
  $hash_tag = $_POST['hash_tag'];
  $user_tag = $_POST['user_tag'];
  $date = date("Y/m/d H:i:sP");
  // (1)SQLを作成
  $sql = "INSERT INTO post_info(
              	user_id, latitude, longitude, image, comment, hash_tag, user_tag, created_at, updated_at
       ) VALUES (
	       '$user_id', '$lat', '$lot', '$img_binary', '$comment', '$hash_tag', '$user_tag' , '$date' , '$date'
       )";
        // $sql = "SELECT * FROM post_info";

  // (2)SQL実行（データ登録）
  $res = $dbh->query($sql);
  // $dbhにはデータベースのハンドラ(PDOインスタンス)が入っている

} catch (PDOException $e) {
  echo $e->getMessage();
  die();
}

// 接続を閉じる
$dbh = null;
