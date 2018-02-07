<?php require 'nav.php'; ?>
<?php
session_start();
$id = $_REQUEST['id'];
if(!isset($_SESSION['product'])){
  $_SESSION['product']=[];
}
$count = 0;
if(isset($_SESSION['product'][$id])){
  $count = $_SESSION['product'][$id]['count'];
}
$_SESSION['product'][$id]=[
  'name'  => $_REQUEST['name'],
  'price' => $_REQUEST['price'],
  'type'  => $_REQUEST['type'],
  'count' => $_REQUEST['count']+$count
];
?>
<main>
  <div class="container">
    <p>カートに商品を追加しました</p>
    <hr>
  </div>
</main>
<?php require 'cart.php'; ?>
