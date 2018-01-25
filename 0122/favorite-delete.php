<?php require 'menu.php' ?>
<?php session_start(); ?>
<?php if(isset($_SESSION['customer'])): ?>
  <?php
  $pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8','staff','password');
  $sql=$pdo->prepare('delete from favorite where customer_id=? and product_id=?');
  $sql->execute([$_SESSION['customer']['id'],$_REQUEST['id']]);
  ?>
  <p>お気に入りから商品を消去しました。</p>
  <hr>
<?php else: ?>
  <p>お気に入りから商品を消去するには、ログインして下さい。</p>
<?php endif; ?>
<?php require 'favorite.php'; ?>
