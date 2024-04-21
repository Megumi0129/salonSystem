<?php

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>顧客登録</title>
<!-- <link rel="stylesheet" href="../app/1.12.1/jquery-ui.min.css">
<script src="../app/jquery-3.7.1"></script>
<script src="../app/1.12.1/jquery-ui.min.js"></script>
<script src="customerReg.js?8"></script> -->
<link rel="stylesheet" href="customerReg.css">
</head>
<div id="message"></div>
<body>
  <table style="width:700px;">
		<tr>
			<td style="font-size:60px;width:100px;color:#305496;">顧客登録
			</td>
		</tr>
	</table>
  <form action="customerConfirm.php" method="POST">
<div class="registration-form">
    <label for="name">Name(必須)</label>
    <input id="name" type="text" name="name" placeholder="aaa">
    <label for="tel">Phone number(必須)</label>
    <input id="tel" type="tel" name="tel" placeholder="00000000">
    <label for="birthday">Date of birth</label>
    <input id="birthday" type="date" name="birthday">
    <label for="memo">Memo</label>
    <textarea id="memo" name="memo" rows="6"></textarea>
    <button type="submit" id="insertBtn">登録</button>
 <!--  </form>-->
</div>
</form>
</body>
</html>
