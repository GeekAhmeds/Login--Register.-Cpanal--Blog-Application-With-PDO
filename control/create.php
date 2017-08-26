<?php
require_once '../inc/connection.php';
session_start();
if (isset($_POST['submit'], $_POST['body'], $_POST['title']) && !empty($_POST['body']) && !empty($_POST['submit']) && !empty($_POST['title'])){
  if (ctype_alpha($_POST['title'])) {
    if (preg_match('/^[a-z0-9-_. ,]*$/i', $_POST['body'])) {
    $stmt = $pdo->prepare('INSERT INTO posts (`user_id`,`username`,`title`,`body`) VALUES (:user_id,:username,:title,:body)');
    $stmt->execute([
      'user_id'   =>  $_SESSION['id'],
      'username'  =>  $_SESSION['username'],
      'title'     =>  $_POST['title'],
      'body'      =>  $_POST['body']
    ]);

      if ($stmt->rowCount()) {
        $_SESSION['successful'] = 'Your Post Has Been Add';
        header('refresh:.1; url= ../views/index.php');
        }
      }else {
        $_SESSION['error'] = 'Error Please Check Your Body Field';
        header('refresh:.1; url= ../views/create.php');
     }
  }else {
    $_SESSION['error'] = 'Error Please Check Your Title Field';
    header('refresh:.1; url= ../views/create.php');
    }
}else{
    $_SESSION['error'] = 'Please Fill The Body And Title';
    header('refresh:.1; url= ../views/create.php');
}
