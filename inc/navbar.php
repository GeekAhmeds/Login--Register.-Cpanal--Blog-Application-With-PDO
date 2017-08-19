<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Navbar search add on BS 3 - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">

    </style>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


        </form>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <?php
          session_start();
          if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        if (isset($_SESSION['nickname']) && !empty($_SESSION['nickname'])) {
          echo "Hello " . $_SESSION['nickname'] ;
        }

          }else {
          echo "Hello Guest";
        }

          ?>
          <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <?php
          if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
              switch ($_SESSION['privil']) {
                case ($_SESSION['privil'] === 0):
                ?>
                <li><a href="create.php">Create A Post</a></li>
                <?php
                break;

                case ($_SESSION['privil'] === 1):

                ?>
                <li><a href="../control/index.php">List Newest Posts</a></li>
                <li><a href="create.php">Create A Post</a></li>

                <?php
                break;
              }
              ?>
                            <li class="divider"></li>
                            <li><a href="change_password.php">Change Password</a></li>
                            <li><a href="change_email.php">Change Email</a></li>
                            <li><a href="nickname.php">Set Nickname</a></li>
                            <li><a href="logout.php">LogOut</a></li>
<?php
          }else {

            ?>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="register.php">Create An Account</a></li>

            <?php

          }
            ?>


        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
<script type="text/javascript">

</script>
