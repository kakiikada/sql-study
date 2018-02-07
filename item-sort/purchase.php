<?php require 'nav.php'; ?>
<?php
session_start();
?>
<main>
  <div class="container">
    <p>カート内の商品</p>
    <?php
    if(empty($_SESSION['product'])):?>
    <p>カートの商品がありません</p>
    <?php else: ?>
      <?php require 'cart.php'; ?>
      <hr>
      <p>内容をご確認いただき、購入を確定してください。</p>
      <a class = "button puchase" href="purchase-output.php">購入を確定する</a>
    <?php endif; ?>
  </div>
</main>
