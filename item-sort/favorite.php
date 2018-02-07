<main>
  <div class="container">
    <table>
      <th>種類</th><th>商品名</th><th>価格</th>
      <?php
      $pdo = new PDO('mysql:host=localhost;dbname=study-sql;charset=utf8','root');
      foreach($pdo->query('SELECT * FROM favorite JOIN product ON favorite.product_id = product.id ORDER BY type ASC')as $row):?>
      <tr>
        <td><?php echo type($row['type']); ?></td>
        <td>
          <a href="detail.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a>
        </td>
        <td><?php echo $row['price']; ?></td>
        <td><a href="favorite-delete.php?id=<?php echo $row['id']; ?>">消去</a></td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
</main>
