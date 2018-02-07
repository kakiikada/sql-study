<?php require 'nav.php'; ?>
<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=study-sql;charset=utf8','root');
$sql = $pdo->prepare('delete FROM favorite WHERE product_id=?');
$sql->execute([$_REQUEST['id']]);?>
<main>
  <div class="container">
    <p>お気に入りから消去しました。</p>
    <hr>
  </div>
</main>
<?php require 'favorite.php'; ?>
