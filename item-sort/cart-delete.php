<?php require 'nav.php'?>
<?php session_start();
unset($_SESSION['product'][$_REQUEST['id']]);
?>
<main>
  <div class="container">
    <p>カートから商品を消去しました</p>
    <hr>
    <?php require 'cart.php'; ?>
  </div>
</main>
