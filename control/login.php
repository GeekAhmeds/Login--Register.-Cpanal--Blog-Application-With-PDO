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
                  if ($valu['active'] === 1) {
                    if (password_verify($password, $value['password'])) {
                      $_SESSION['loggedin'] = true;
                      $_SESSION['username'] =$value['username'];
                      $_SESSION['email'] =$value['email'];
                      $_SESSION['id'] =$value['id'];
                      $_SESSION['nickname'] = ($value['nickname'] === NULL) ? $_SESSION['username'] : $value['nickname'];
                      $_SESSION['privil']   = $value['privil'];
                      $stmt = $pdo->prepare('UPDATE users SET last_login =:last_login WHERE username =:username');
                      $stmt->execute([
                        'last_login' => date('Y-m-d H:i'),
                        'username'   => $_SESSION['username']
                      ]);
                      header('refresh:.1; url=../control/index.php');
                    }else{
                      echo "username or password incorrect !!!";
                    }
                  }else {
                  if ($value['ban_time'] >= date('Y-m-d H:i:s')) {
                    $_SESSION['error'] = 'Sorry You Are Still Banned';
                  header('refresh:0; url=login.php');
                }else {
                  $stmt = $pdo->prepare('UPDATE users SET active =:active,ban_duration =:ban_duration,ban_time=:ban_time WHERE id =:id');
                  $stmt->execute([
                    ':active' => 1,
                    ':ban_duration' => NULL,
                    ':ban_time'  => NULL,
                    ':id' => $value['id']
                  ]);
                  if($stmt->rowCount()){
                    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username AND activated = :activated');
                    $stmt->execute([
                      ':username'  => $_POST['username'],
                      ':activated' => 1
                    ]);
                    if ($stmt->rowCount()) {
                      if (password_verify($password, $value['password'])) {
                        $_SESSION['loggedin'] = true;
                        $_SESSION['username'] =$value['username'];
                        $_SESSION['email'] =$value['email'];
                        $_SESSION['id'] =$value['id'];
                        $_SESSION['nickname'] = ($value['nickname'] === NULL) ? $_SESSION['username'] : $value['nickname'];
                        $_SESSION['privil']   = $value['privil'];
                        $stmt = $pdo->prepare('UPDATE users SET last_login =:last_login WHERE username =:username');
                        $stmt->execute([
                          'last_login' => date('Y-m-d H:i'),
                          'username'   => $_SESSION['username']
                        ]);
                        header('refresh:.1; url=../control/index.php');
                      }else{
                        echo "username or password incorrect !!!";
                      }
                    }
                  }

                }
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
