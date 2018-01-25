<?php require 'menu.php'?>
<?php
session_start();
$name=$address=$login=$password='';
if(isset($_SESSION['customer'])){
  $name     = $_SESSION['customer']['name'];
  $address  = $_SESSION['customer']['address'];
  $login    = $_SESSION['customer']['login'];
  $password = $_SESSION['customer']['password'];
}
?>
<form action="customer-output.php" method="post">
  <table>
    <tr>
      <td>名前</td>
    <td><input type="text" name="name" value="<?php echo $name ; ?>"></td>
    </tr>
    <tr>
      <td>ご住所</td>
      <td><input type="text" name="address" value="<?php echo $address ; ?>"></td>
    </tr>
    <tr>
      <td>ログイン名</td>
      <td><input type="text" name="login" value="<?php echo $login ; ?>"></td>
    </tr>
    <tr>
      <td>パスワード</td>
      <td><input type="password" name="password" value="<?php echo $password ?>"></td>
    </tr>
  </table>
  <input type="submit" value="確定">
</form>
