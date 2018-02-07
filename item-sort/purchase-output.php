<?php require 'nav.php'; ?>
<?php session_start(); ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=study-sql;charset=utf8','root');
$purchase_id=1;
foreach ($pdo->query('select max(purchase_id) from purchase') as $row){
	$purchase_id=$row['max(purchase_id)']+1;
}
$sql=$pdo->prepare('insert into purchase values(?)');
if ($sql->execute([$purchase_id])) {
  foreach($_SESSION['product'] as $product_id => $product){
    $sql = $pdo->prepare('insert into purchase_detail values(?,?,?,?)' );
    $sql->execute([null,$purchase_id,$product_id,$product['count']]);
  }
  unset($_SESSION['product']);
}
?>
<main>
  <div class="container">
		<p>購入手続きが完了しました。ありがとうございます。</p>
	</div>
</main>
