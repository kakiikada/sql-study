<?php
require 'nav.php';
?>
<div class="sub-title">
  <div class="container">
    <form action="menu.php" method="post" >
      <input class = "input-text" type="text" name="keyword" placeholder="商品名を入力してください">
      <input class = "button" type="submit" value="検索">
    </form>
  </div>
</div>
<hr>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=study-sql;charset=utf8','root');
?>
<div class="container">
  <table>
    <th>種類</th><th>商品名</th><th>価格</th>
    <?php
    if(isset($_POST['keyword'])) {
      $sql = $pdo->prepare('SELECT * FROM product WHERE name like ? ORDER BY type ASC' );
      $sql->execute(['%'.$_POST['keyword'].'%']);
    }else{
      $sql = $pdo->prepare('SELECT * FROM product ORDER BY type ASC');
      $sql->execute([]);
    }
    ?>
    <?php foreach($sql->fetchAll() as $row): ?>

      <?php $id = $row['id']; ?>
      <tr>
        <td><?php echo type($row['type']) ?></td>
        <td><a href="detail.php?id=<?php  echo $id; ?>"><?php echo $row['name'] ?></a></td>
        <td><?php echo $row['price'] ?>円</td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
<?php require 'footer.php' ?>
