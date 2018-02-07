<?php require 'nav.php'; ?>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=study-sql;charset=utf8','root');
$sql = $pdo->query('SELECT * FROM product');
?>
<main>
  <div class="container">
    <table>
      <tr>
        <td>種類</td><td>商品名</td><td>商品の説明</td> <td>価格</td><td>編集ボタン</td><td></td>
      </tr>
    <?php foreach ($sql as $row): ?>
      <tr>
        <form action="edit-output.php" method="post">
          <input type="hidden" name="command" value = "update" >
          <input type="hidden" name="id" value = "<?php echo $row['id'];?> ">
        <td>
          <p style = "display:inline;"><?php echo type($row['type']);?></p>
          <select name="type">
            <option value="0" select>変更なし</option>
            <option value="1food">食べ物</option>
            <option value="2desert">デザート</option>
            <option value="3spice">ジャム、スパイスなど</option>
            <option value="4drink">飲み物</option>
          </select>
        </td>
        <td><input type="text" name = "name" value = "<?php echo $row['name']; ?>" ></td>
        <td><input type="text" name = "text" value = "<?php echo $row['text']; ?>"></td>
        <td><input type="text" name = "price" value = "<?php echo $row['price']; ?>" ></td>
        <td><input type="submit" value = "更新"></td>
      </form>
        <td>
        <form action="edit-output.php" method="post">
          <input type="hidden" name="command" value="delete">
          <input type="hidden" name = "id" value = "<?php echo $row['id']; ?>">
          <input type="submit" value="消去">
        </form>
        </td>
      </tr>
    <?php endforeach; ?>
    <tr>
      <form action="edit-output.php" method="post">
        <input type="hidden" name="command" value="insert">
        <td>
          <select name="type">
            <option value="0" select>選択してください</option>
            <option value="1food">食べ物</option>
            <option value="2desert">デザート</option>
            <option value="3spice">ジャム、スパイスなど</option>
            <option value="4drink">飲み物</option>
          </select>
        </td>
        <td><input type="text" name = "name" placeholder="商品名"></td>
        <td><input type="text" name = "text"  placeholder="商品の説明"></td>
        <td><input type="text" name = "price" placeholder="価格"></td>
        <td><input type="submit" value = "登録"></td>
      </form>
    </tr>
    </table>
  </div>
</main>
