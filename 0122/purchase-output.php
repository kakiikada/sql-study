<?php require 'menu.php' ?>
<?php session_start(): ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'staff', 'password');
$purchase_id=1;
?>
<!--履歴登録-->

<!--カートを空にする-->
<?php unset($_SESSION['product']); ?>
<p>購入手続きが完了しました。ありがとうございます。</p>
