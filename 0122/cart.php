<?php if (!empty($_SESSION['product'])): ?>
  <table>
    <th>商品番号</th>
    <th>商品名</th>
    <th>価格</th>
    <th>個数</th>
    <th>小計</th>
    <?php $total=0; ?>
    <?php foreach($_SESSION['product'] as $id=>$product): ?>
      <tr>
        <td><?php echo $id; ?></td>
        <td>
          <a href="detail.php?id=<?php echo $id; ?>"><?php echo $product['name']; ?></a>
        </td>
        <td><?php echo $product['price']; ?></td>
        <td><?php echo $product['count']; ?></td>
        <?php
        $subtotal = $product['price'] * $product['count'];
        $total += $subtotal;
        ?>
        <td><?php echo $subtotal; ?></td>
        <td>
          <a href="cart-delete.php?id=<?php echo $id; ?>">消去</a>
        </td>
      </tr>
    <?php endforeach; ?>
    <tr>
      <td>合計</td>
      <td></td>
      <td></td>
      <td></td>
      <td><?php echo $total; ?></td>
      <td></td>
    </tr>
  </table>
<?php else: ?>
  <p>カートに商品がありません。</p>
<?php endif; ?>
