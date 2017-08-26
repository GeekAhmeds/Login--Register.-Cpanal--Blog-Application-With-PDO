<?php
session_start();
require_once '../inc/connection.php';
if (isset($_POST['delete'], $_POST['id']) && !empty($_POST['delete']) && !empty($_POST['id'])) {
  if (preg_match('/^[0-9]*$/', $_POST['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM posts WHERE id=:id');
    $stmt->execute([
      'id' => $_POST['id']
    ]);
      if ($stmt->rowCount()) {
        foreach ($stmt->fetchAll() as $value) {
          if ($value['user_id'] === $_SESSION['id']) {
            $stmt = $pdo->prepare('DELETE  FROM posts WHERE id =:id');
            $stmt->execute([
            'id' => $_POST['id']
            ]);
            if ($stmt->rowCount()) {
              $_SESSION['successful'] = 'Post Has Been Delete';
              header('refresh:0; url=index.php');
            }
          }else {
               $_SESSION['error'] = 'You Are Not Authourized To Delete This Post';
               header('refresh:0; url=../views/index.php');

          }
        }
      }else {
              $_SESSION['error'] = 'Post Does Not Exist';
              header('refresh:0; url=../views/index.php');

        }

    }else {
                $_SESSION['error'] = 'Id Not Integer !!!';
                header('refresh:0; url=../views/index.php');
    }
  }
