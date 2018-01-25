<?php if(isset($_SESSION['customer'])): ?>
  <table>
    <th>商品番号</th>
    <th>商品名</th>
    <th>価格</th>
    <?php
    $pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8',
  		'staff', 'password');
  	$sql=$pdo->prepare(
  		'select * from favorite, product '.
  		'where customer_id=? and product_id=id');
  	$sql->execute([$_SESSION['customer']['id']]);
    ?>
    <?php foreach($sql->fetchAll() as $row): ?>
      <?php $id=$row['id']; ?>
      <tr>
        <td><?php echo $id; ?></td>
        <td>
          <a href="detail.php?id=<?php echo $id; ?>"><?php echo $row['name']; ?></a>
        </td>
        <td><?php echo $row['price'] ?></td>
        <td>
          <a href="favorite-delete.php?id=<?php echo $id; ?>">消去</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
<?php else: ?>
  <p>お気に入りを表示するには、ログインして下さい。</p>
<?php endif; ?>
