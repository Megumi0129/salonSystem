<?php
echo $_GET['id'];
$nameId = $_GET['id'];
//顧客情報(上部)取得
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

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>来店登録</title>
	<link rel="stylesheet" href="customerReg.css">
</head>
<!-- <div id="message"></div> -->
<body>
	<table style="width:700px;">
		<tr>
			<td style="font-size:60px;width:100px;color:#305496;">来店登録
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
	<form action="detailConfirm.php" method="POST">
		<div class="registration-form">
      <input  type="hidden" id="<?= $nameId ?>" name="id" value="<?= $nameId ?>" />
			<label for="stylist_name">担当者</label>
			<input id="stylist_name" type="text" name="stylist_name">
			<label for="shimei">指名有無</label>
			<input id="shimei" type="text" name="shimei" placeholder="有or無">
			<label for="menu">メニュー(必須)</label>
			<input id="menu" type="text" name="menu">
      <label for="book_time">来店日(必須)</label>
      <input id="book_time" type="datetime-local" name="book_time">
			<label for="needed_time">所要時間</label>
			<input id="needed_time" type="text" name="needed_time">
			<label for="memo">Memo</label>
			<textarea id="memo" name="memo" rows="6"></textarea>
			<button type="submit" id="insertBtn">登録</button>
		</div>
	</form>
</body>
</html>
