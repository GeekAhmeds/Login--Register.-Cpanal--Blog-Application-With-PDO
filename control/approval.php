<?php
session_start();
require_once '../inc/connection.php';
$action = ['approved' , 'unapproved'];
if (isset($_GET['action'], $_GET['id']) && !empty($_GET['id']) && !empty($_GET['action'])) {
    if (in_array($_GET['action'], $action)) {
       if (preg_match('/^[0-9]*$/', $_GET['id'])) {
           $stmt = $pdo->prepare('SELECT * FROM posts WHERE id=:id');
           $stmt->execute([
                'id' => $_GET['id']
           ]);
           if ($stmt->rowCount()) {
               foreach ($stmt->fetchAll() as $value) {
                   if ($_SESSION['id'] === $value['user_id']) {
                       switch ($_GET['action']) {
                           case ($_GET['action'] === 'approved') :
                                $stmt = $pdo->prepare('UPDATE posts  SET user_id =:user_id , approved =:approved WHERE id=:id');
                                $stmt->execute([
                                ':user_id'  => $_SESSION['id'],
                                ':approved' => 1,
                                ':id'       => $_GET['id']
                                ]);
                                if ($stmt->rowCount()) {
                                   $_SESSION['successful'] = 'Your Post Has Approved';
                                   header('refresh:0; url= ../control/index.php');
                                }
                               break;
                           
                           case ($_GET['action'] === 'unapproved') :
                                $stmt = $pdo->prepare('UPDATE posts  SET user_id =:user_id , approved =:approved WHERE id=:id');
                                $stmt->execute([
                                ':user_id'  => $_SESSION['id'],
                                ':approved' => 0,
                                ':id'       => $_GET['id']
                                ]);
                                if ($stmt->rowCount()) {
                                   $_SESSION['successful'] = 'Your Post Has UnApproved';
                                   header('refresh:0; url= ../control/index.php');
                                }
                               break;
                       }
                   }else {
                       $_SESSION['error'] = 'You Are Not Authourized To Approved This Post';
                       header('refresh:0; url= ../control/index.php');
                   }
               }
           }
       }         
    }

}

