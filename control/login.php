<?php

session_start();

require_once '../inc/connection.php';
if (isset($_POST['username'], $_POST['password'])) {





  $username = $_POST['username'];
  $password = $_POST['password'];
  if (preg_match('/^[a-z0-9-_. ]*$/i', $username)) {
    if (strlen($password) >= 8 && strlen($password) <= 32) {
          $stmt = $pdo->prepare('SELECT * FROM users WHERE username =:username OR email =:email ');
          $stmt->execute([
            'username' => $username, 'email' => $username]);
          if ($stmt->rowCount()) {
            $stmt = $pdo->prepare('SELECT * FROM users WHERE ( username =:username OR email =:email ) AND activated =1');
              $stmt->execute(['username' => $username, 'email' => $username]);
              if ($stmt->rowCount()) {
                foreach ($stmt->fetchAll() as $value) {

                  if (password_verify($password, $value['password'])) {
                    echo'welcome user';
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] =$value['username'];
                    $_SESSION['email'] =$value['email'];
                    $_SESSION['id'] =$value['id'];
                  }else{
                    echo "username or password incorrect !!!";
                  }
                }
              }else {
                echo "User Is Not Activated !";
              }
          }else{
            echo 'User Id Not Found !!!';
          }

    }else {
      echo 'Please Provide A Valid Password';
    }
  }else {
    echo 'Please Provide A Valid Username';
  }







}
