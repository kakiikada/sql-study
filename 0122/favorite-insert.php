<?php require 'menu.php' ?>
<?php
session_start();
if(isset($_SESSION['customer'])){
  $pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8','staff','password');
  $sql=$pdo->prepare('insert into favorite values(?,?)');
  $sql->execute([$_SESSION['customer']['id'],$_REQUEST['id']]);
  echo '<p>お気に入りに追加しました</p>';
  echo '<hr>';
  require 'favorite.php';
}else{
  echo '<p>お気に入り商品を追加するには、ログインして下さい。</p>';
}
?>
