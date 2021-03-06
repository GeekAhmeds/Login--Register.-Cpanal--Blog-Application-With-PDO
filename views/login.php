<?php
require_once '../inc/navbar.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  header('refresh:0; url= ../inc/navbar.php');
}


 ?>
 <head>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<form class="form-horizontal" action="../control/login.php" method="POST">
<fieldset>
<legend></legend>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">username</label>
  <div class="col-md-5">
  <input id="username" name="username" type="text" placeholder="Enter Your Username" class="form-control input-md" required="">

  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-5">
    <input id="password" name="password" type="password" placeholder="Enter Your Password" class="form-control input-md" required="">

  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-default">Login</button>
    <small><a href="password_reset.html"</a>Forget Password</small>
  </div>
</div>

</fieldset>
</form>

<?php require_once '../inc/scripts.php'; ?>
