<?php
if(empty($_GET['id'])){
  echo "検索失敗しました。やり直してください。";

}else{

  //パラメータ顧客ID
  $nameId = $_GET['id'];

  //顧客情報(上部)取得
  $dsn = "mysql:dbname=inf;host=localhost;charset=utf8";
  $username = "root";
  $password = "pass";
  $options = [];
  $pdo = new PDO($dsn, $username, $password, $options);
  $qry = $pdo->prepare('SELECT * FROM `customerVisitInf` WHERE name_id = :id ');
  $qry->bindValue(":id",$nameId,PDO::PARAM_STR);
  //$qry->execute();
  if($qry->execute()){
    //レコード件数取得
    $row_count=$qry->rowCount();

    while($row=$qry->fetch()){
      $rows[]=$row;
    }

  }else{
    $errors['error']="検索失敗しました。";
  }

  //初期表示の情報設定
  $name = array_column($rows, 'name');
  $tel = array_column($rows, 'tel');
  $birth = array_column($rows, 'birth');
  $memo = array_column($rows, 'memo');
  $uptime = array_column($rows, 'birth');


  //来店履歴情報(下部)取得
  //データベースへ接続
  $dsn = "mysql:dbname=inf;host=localhost;charset=utf8";
  $username = "root";
  $password = "pass";
  $options = [];
  $pdo = new PDO($dsn, $username, $password, $options);
  $qry = $pdo->prepare('SELECT * FROM `customerInf` WHERE id = :id ');
  $qry->bindValue(":id",$nameId,PDO::PARAM_STR);
  //$qry->execute();
  if($qry->execute()){
    //レコード件数取得
    $row_count=$qry->rowCount();

    while($visitList=$qry->fetch()){
      $rows[]=$visitList;
    }

  }else{
    $errors['error']="検索失敗しました。";
  }

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>顧客詳細</title>
</head>
<body style="margin: 10px;padding: 10px;">
  <table style="width:1000px;">
    <tr>
      <td style="font-size:60px;width:50px;color:#305496;">顧客詳細
      </td>
    </tr>
  </table>
  <table style="width:1000px;">
    <tr>
      <th>名前</th>
      <td>
        <?php echo array_shift($name); ?>
      </td>
    </tr>
    <tr>
      <th>電話番号</th>
      <td>
        <?php echo array_shift($tel); ?>
      </td>
    </tr>
    <tr>
      <th>誕生日</th>
      <td>
        <?php echo array_shift($birth); ?>
      </td>

    </tr>
    <tr>
      <th>メモ</th>
      <td>
        <?php echo array_shift($memo); ?>
      </td>
    </tr>
    <tr>
      <th>登録年月日</th>
      <td>
        <?php echo array_shift($uptime); ?>
      </td>
    </tr>
    <tr>
      <th>最終来店日</th>
      <td></td>
    </tr>
  </table>
  <table　style="width:1000px;">
    <tr><th>来店日</th><th>メニュー</th><th>所要時間</th><th>担当者</th><th>指名有無</th></tr>
    <!-- ここでPHPのforeachを使って結果をループさせる -->
    <?php foreach ($visitList as $row): ?>
      <!-- 来店情報一覧をループ　来店情報の詳細へのリンク -->
      <tr><td><form action="detail.php" method="POST"><?php echo $row[1]?><input type="hidden" name="id" value="<?= $row[0] ?>">
      </form></td><td><?php echo $row[2]?></td><td><?php echo $row[6]?></td></tr>
    <?php endforeach; ?>
  </table>
</body>
</html>
