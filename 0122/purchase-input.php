<?php require 'menu.php'; ?>
<?php
session_start();
if(isset($_SESSION['customer'])):?>
  <p>お名前：<?php echo $_SESSION['customer']['name']; ?><br><!--
  -->ご住所：<?php echo $_SESSION['customer']['address']?>
  </p>
  <hr>
  <?php if(!empty($_SESSION['product'])): ?>
    <?php require 'cart.php' ?>
    <hr>
    <p>内容をご確認いただき、購入を確定してください</p>
    <a href="purchase-output.php">購入を確定する</a>
  <?php else: ?>
    <p>カートに商品がありません</p>
  <?php endif; ?>
<?php else: ?>
  <p>ログインしてください</p>
<?php endif; ?>
