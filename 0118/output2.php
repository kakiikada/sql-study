<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="base.css">
  <title>Document</title>
</head>
<body>
  <?php
  require 'data.php';
  $pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8','staff','password');
  $sql = $pdo->prepare('delete from product where id=?');
  if($sql->execute([$_REQUEST['id']])){
    echo '消去に成功しました';
  }else{
    echo '消去に失敗しました';
  }
   ?>

</body>
</html>
