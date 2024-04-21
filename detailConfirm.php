
<?php

if(empty($_POST['menu'])){
    echo "メニューが未入力です。";
}elseif (empty($_POST['book_time'])){
    echo "来店日が未入力です。";
}else {

    //データベースへ接続
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=inf;charset=utf8','root','pass');
          // 内容をテーブルに保存
          $qry = $pdo->prepare('INSERT INTO customerVisitInf (name_id, stylist_name , shimei , menu  ,needed_time , memo , book_time  , update_time)
                               VALUES (:name_id , :stylist_name  , :shimei , :menu  ,:needed_time , :memo , :book_time  , cast( now() as datetime))');
          $qry->execute(array(':name_id' => @$_POST["id"],':stylist_name' => @$_POST["stylist_name"],
          ':shimei' => @$_POST["shimei"],':menu' => @$_POST["menu"] ,
          ':needed_time' => @$_POST["needed_time"],':book_time' => @$_POST["book_time"],
          ':memo' => @$_POST["memo"]));
      echo "来店登録しました。";
      }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title></title>
  <a href="salon.php">戻る</a>
</head>
<body>
</form>
</body>
</html>
