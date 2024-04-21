<?php

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>問い合わせ</title>
</head>
<body>
    <form action="confirm.php" method="POST">

  <label class="label" for="name">名前</label>
  <input id="name" type="text" name="name">

  <label class="label" for="contents">本文</label>
  <textarea name="contents" rows="5" maxlength="140"></textarea>
  <button>送信する</button>
</form>
</body>
</html>
