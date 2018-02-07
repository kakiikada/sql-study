<?php require 'nav.php'; ?>
<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=study-sql;charset=utf8','root');
$sql_purchase = $pdo->query('SELECT * FROM purchase');?>
<main>
  <div class="container">
    <table>
      <?php foreach($sql_purchase->fetchAll() as $row_purchase):?>
          <tr>
            <th>種類</th>
            <th>商品名</th>
            <th>個数</th>
            <th>価格</th>
          </tr>
          <?php $sql_product = $pdo->prepare('SELECT * FROM'.
           ' purchase_detail,product WHERE purchase_id=? AND product_id=id');
          $sql_product->execute([$row_purchase['purchase_id']]);//上のIDをわりあてる
          $total = 0;
          foreach($sql_product->fetchAll() as $row_product):?>
            <tr>
              <td ><?php echo type($row_product['type']); ?></td>
              <td><a href="detail.php?id=<?php echo $row_product['id'] ?>"><?php echo $row_product['name']; ?></a></td>
              <td><?php echo $row_product['count']; ?>個</td>
              <td><?php echo $row_product['price']; ?>円</td>
            </tr>
            <?php $total += $row_product['price']; ?>
          <?php endforeach; ?>
          <tr class = "histry-under-space">
            <td>合計</td>
            <td></td><td></td>
            <td><?php echo $total; ?>円</td>
          </tr>
      <?php endforeach; ?>
    </table>
  </div>
</main>
