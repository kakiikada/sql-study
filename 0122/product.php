<?php require 'menu.php' ?>
<form action="product.php" method="post">
  商品検索
  <input type="text" name="keyword">
  <input type="submit" value="検索">
</form>
<hr>
<table>
  <th>商品番号</th>
  <th>商品名</th>
  <th>価格</th>
  <?php
  $pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8','staff','password');
  if(isset($_POST['keyword'])){
    $sql=$pdo->prepare('select * FROM product where name like ?');
    $sql->execute(['%',$_POST['leyword'],'%']);
  }else{
    $sql=$pdo->prepare('select * FROM product');
    $sql->execute([]);
  }
  ?>
  <?php foreach($sql->fetchAll() as $row): ?>
  <?php $id = $row['id']; ?>
  <tr>
    <td>id</td>
    <td>
      <a href="detail.php?id=<?php echo $id ; ?>"><?php echo $row['name']; ?></a>
    </td>
    <td><?php echo $row['price']; ?></td>
  </tr>
<?php endforeach; ?>
</table>
