<?php
require_once('data.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="base.css">
  <title>Document</title>

</head>
<body>
  <table>
    <tr>
      <th>商品番号</th>
      <th>商品名</th>
      <th>価格</th>
    </tr>
  <?php
  $pdo = new PDO('mysql:host=localhost;dbname=shop;charset=utf8','staff','password');
  foreach($pdo->query('select * FROM product') as $row):?>
  <tr>
    <form  action="output.php" method="post">
      <input type="hidden" name="command" value="update">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <td><?php echo $row['id']; ?></td>
      <td>
        <input type="text" name="name" value="<?php echo $row['name']; ?>">
      </td>
      <td>
        <input type="text" name="price" value="<?php echo $row['price']; ?>">
      </td>
      <td>
        <input type="submit" value="更新">
      </td>
      </form>
      <form action="output.php" method="post">
        <input type="hidden" name="command" value="delete">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <td>
          <input type="submit" value="消去">
        </td>
    </form>
  </tr>
<?php endforeach; ?>
<form  action="output.php" method="post">
  <input type="hidden" name="command" value="insert">
  <td></td>
  <td>
    <input type="text" name="name">
  </td>
  <td>
    <input type="text" name="price">
  </td>
  <td>
    <input type="submit" value="追加">
  </td>
</form>
   </table>

</body>
</html>
