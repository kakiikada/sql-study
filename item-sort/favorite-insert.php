<?php require 'nav.php'; ?>
<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=study-sql;charset=utf8','root');
$sql = $pdo->prepare('insert into favorite values(?)');
$sql->execute([$_REQUEST['id']]);
?>
<main>
  <div class="container">
    <p>お気に入りに追加しました。</p>
    <hr>
  </div>
</main>
<?php require 'favorite.php' ?>
