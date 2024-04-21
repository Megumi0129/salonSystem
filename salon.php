<?php

if(empty($_GET['s'])){
  //検索されていない場合
  //データベースへ接続
  $dsn = "mysql:dbname=inf;host=localhost;charset=utf8";
  $username = "root";
  $password = "pass";
  $options = [];
  $pdo = new PDO($dsn, $username, $password, $options);
        $stmt = $pdo->query("SELECT * FROM customerInf ");

}else {
    //検索されていた場合
    //データベースへ接続
    $dsn = "mysql:dbname=inf;host=localhost;charset=utf8";
    $username = "root";
    $password = "pass";
    $options = [];
    $pdo = new PDO($dsn, $username, $password, $options);
    $qry = $pdo->prepare('SELECT * FROM `customerInf` WHERE name LIKE :thing OR tel LIKE :thing ');

    $qry->bindValue(":thing","%".@$_GET['s']."%",PDO::PARAM_STR);
    $qry->execute();
    $stmt = $qry->fetchAll();
      // print_r($stmt);
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>サロン管理システム</title>
</head>
<body style="margin: 10px;padding: 10px;">
	<table style="width:1500px;">
		<tr>
			<td style="font-size:60px;width:100px;color:#305496;">サロン管理システム
			</td>
		</tr>
	</table>

	<table style=" border:none;border-collapse:collapse;">
		<tr>
			<td>
				<table style="width:1400px;">
					<tr>
						<td style="width:200px;">
						<a href="customerReg.php">顧客登録</a>
						</td>
						<td style="width:150px;">
						<form id="form1" action="salon.php" method="get">
						<input id="sbox1" id="s" name="s" type="text" placeholder="名前または番号" />
						<input id="sbtn1" type="submit" value="検索" /></form>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		</table>
    <table>
    <tr><th>名前</th><th>電話番号</th><th>メモ</th><th>最終来店日</th></tr>
    <!-- ここでPHPのforeachを使って結果をループさせる -->
    <?php foreach ($stmt as $row): ?>
        <tr><td><form action="detail.php" method="GET">
          <!-- <input id="sbox1" id="<?= $row[0] ?>" name="id" /> -->
          <input  type="hidden" id="<?= $row[0] ?>" name="id" type="submit" value="<?= $row[0] ?>" />
          <input id="sbtn1" type="submit" value="<?php echo $row[1]?>" /></form>
          <!-- <input type="submit" name="<?= $row[0] ?>" value="<?= $row[0] ?>">
          <input type="hidden" name="key" id="<?= $row['id'] ?>" value="<?= $row['id'] ?>"></form> -->
        </td><td><?php echo $row[2]?></td>
        <td><?php echo $row[4]?></td>
        <td><?php echo $row[6]?></td>
        <td><form action="adddetail.php" method="GET">
          <input  type="hidden"  id="<?= $row[0] ?>" name="id" value="<?= $row[0] ?>" />
          <input id="sbtn1" type="submit" value="来店情報登録する" /></form></td></tr>
    <?php endforeach; ?>
</table>
</body>
</html>
