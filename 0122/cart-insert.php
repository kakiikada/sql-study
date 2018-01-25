<?php require 'menu.php'?>
<?php
session_start();
$id=$_REQUEST['id'];
if(!isset($_SESSION['product'])){
  $_SESSION['product'] = [];
}
$count = 0;
if(isset($_SESSION['product'][$id])){
  $count = $_SESSION['product'][$id]['count'];
}
$_SESSION['product'][$id]=[
  'name'=>$_REQUEST['name'],
  'price'=>$_REQUEST['price'],
  'count'=>$count + $_REQUEST['count']
];
?>
<p>カートに商品を追加しました</p>
<?php require 'cart.php'; ?>
<hr>
