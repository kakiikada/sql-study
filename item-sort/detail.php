<?php require 'nav.php'; ?>
<?php
  $pdo = new PDO('mysql:host=localhost;dbname=study-sql;charset=utf8','root');
  $sql = $pdo->prepare('SELECT * FROM product WHERE id=?');
  $sql->execute([$_REQUEST['id']]);
?>
<?php foreach($sql->fetchAll() as $row): ?>
  <main>
    <div class="container">
      <form action="cart-insert.php" method="post">
        <p><?php echo type($row['type']); ?></p>
        <h1><?php echo $row['name']; ?></h1>
        <p><?php echo $row['price'] ?>円</p>
        <p><?php echo $row['text'] ?></p>
        <select class="" name="count">
          <?php for($i = 1; $i <= 20; $i++): ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?> 個</option>
          <?php endfor; ?>
        </select>
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <input type="hidden" name="name" value="<?php echo $row['name'] ?>">
        <input type="hidden" name="price" value="<?php echo $row['price'] ?>">
        <input type="hidden" name="type" value="<?php echo $row['type'] ?>">
        <input class = "button" type="submit" value="カートに追加">
      </form>
      <p>
        <a href="favorite-insert.php?id=<?php echo $row['id']; ?>">お気に入りに追加</a>
      </p>
    <?php endforeach; ?>
  </div>
</main>
