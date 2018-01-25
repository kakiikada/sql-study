<?php require 'menu.php' ?>
<?php
session_start();
unset($_SESSION['product'][$_REQUEST['id']]);
?>
<p>カートから商品を消去しました。</p>
<hr>
<?php require 'cart.php'; ?>
