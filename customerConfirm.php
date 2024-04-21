
<?php
if(empty($_POST['name'])){
    echo "名前が未入力です。";
}elseif (empty($_POST['tel'])){
    echo "電話番号が未入力です。";
}else {

    //データベースへ接続
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=inf;charset=utf8','root','pass');
          // 内容をテーブルに保存
          $qry = $pdo->prepare('INSERT INTO customerInf (name, tel, birth, memo , uptime)
                               VALUES (:name , :tel  , :birthday , :memo  , cast( now() as datetime))');
          $qry->execute(array(':name' => @$_POST["name"],':tel' => @$_POST["tel"],
          ':birthday' => @$_POST["birthday"],':memo' => @$_POST["memo"]));
      echo "登録しました。";
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
