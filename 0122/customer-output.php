<?php require 'menu.php';
session_start();
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8',
             'staff','password');
if(isset($_SESSION['customer'])){
  $id=$_SESSION['customer']['id'];
  $sql=$pdo->prepare('select * FROM customer where id!=? and login=?');
  $sql->execute([$id,$_REQUEST['login']]);
}else{
  $sql=$pdo->prepare('select * FROM customer where login=?');
}
if(empty($sql->fetchAll())){
  if(isset($_SESSION['customer'])){
    $sql=$pdo->prepare('update customer set name=?, address=?,',
                        'login=?, password=?, where id=?');
    $sql->execute([
      $_REQUEST['name'],
      $_REQUEST['address'],
      $_REQUEST['login'],
      $_REQUEST['password'],
      $id
    ]);
    $_SESSION['costomer']=[
      'id'      =>$id,
      'name'    =>$_REQUEST['name'],
      'address' =>$_REQUEST['address'],
      'login'   =>$_REQUEST['login'],
      'password'=>$_REQUEST['password']
    ];
    echo 'お客様情報を更新しました';
  }else{
    $sql=$pdo->prepare('insert into customer values(null,?,?,?,?)');
    $sql->execute([
      $_REQUEST['name'],
      $_REQUEST['address'],
      $_REQUEST['login'],
      $_REQUEST['password']
    ]);
    echo 'お客様情報を更新しました';
  }
}else{
  echo 'ログイン名がすでに使用されていますので、変更してください';
}
?>
