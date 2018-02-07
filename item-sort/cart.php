<?php if(!empty($_SESSION['product'])): ?>
  <main>
    <div class="container">
      <table>
        <th>種類</th><th>商品名</th><th>個数</th><th>価格</th>
        <?php $types = ['1food','2desert','3spice','4drink']; ?>
        <?php $total = 0; ?>

        <?php foreach($_SESSION['product'] as $id=>$product): ?>
          <tr>
            <td><?php echo type($product['type']); ?></td>
            <td>
              <a href="detail.php?id=<?php echo $id; ?>"><?php echo $product['name']; ?></a>
            </td>
            <td><?php echo $product['count']; ?></td>
            <td><?php echo $product['price']; ?>円</td>
            <td><a href="cart-delete.php?id=<?php echo $id; ?>">消去</a></td>
          </tr>
          <?php $total += $product['price'] * $product['count']; ?>
        <?php endforeach; ?>
        <tr>
          <td>合計</td><td></td><td></td><td><?php  echo $total; ?>円</td>
        </tr>
      </table>
    </div>
  </main>
<?php else: ?>
  <p>カートに商品がありません</p>
<?php endif; ?>
