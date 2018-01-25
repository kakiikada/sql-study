<?php require 'menu.php' ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8',
             'staff','password');
$sql=$pdo->prepare('select * FROM product where id=?');
$sql->execute([$_REQUEST['id']]);//ここはリクエストでないとダメ
foreach($sql->fetchAll() as $row): ?>
  <p>
    <img src="image/<?php echo $row['id']; ?>.jpg" alt="画像">
  </p>
  <form action="cart-insert.php" method="post">
    <p>商品番号：<?php echo $row['id']; ?></p>
    <p>商品名：<?php echo $row['name']; ?></p>
    <p>価格：<?php echo $row['price'];?></p>
    <p>個数<select name="count">
      <?php for($i=1; $i < 10; $i++): ?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
      <?php endfor; ?>
    </select>
    </p>
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
    <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
    <p>
      <input type="submit" value="カートに追加">
    </p>
  </form>
  <p>
    <a href="favorite-insert.php?id=<?php echo $row['id'];?>">お気に入りに追加</a>
  </p>
<?php endforeach; ?>
