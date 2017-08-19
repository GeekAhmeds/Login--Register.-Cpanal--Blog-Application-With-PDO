<?php
require_once '../inc/navbar.php';
if (!isset($_SESSION['loggedin'])) {
  header('refresh:0; url=login.php');
}
if (isset($_SESSION['post']) && count($_SESSION['post']) > 0) {
?>

<form class="form-horizontal" action="../control/edit.php" method="POST">
<fieldset>
<legend></legend>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="title">Title</label>
  <div class="col-md-5">
  <input id="title" name="title" type="text" placeholder="Edit Your Title" value="<?= $_SESSION['post']['title']; ?>" class="form-control input-md" required="">

  </div>
</div>
<!-- Body input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="body">Body</label>
  <div class="col-md-5">
  <textarea id="body" name="body" placeholder="Edit Your Body" class="form-control input-md" required=""><?= $_SESSION['post']['title']; ?></textarea>
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-5">
    <input id="password" name="password" type="password" autocomplete="off" placeholder="Enter Your Password" class="form-control input-md" required="">

  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-12">
  		<input type="hidden" name="id" value="<?= $_SESSION['post']['id'] ?>">
    <button id="submit" name="submit" class="btn btn-primary center-block">Update</button>
  </div>
</div>

</fieldset>
</form>



<?php
unset($_SESSION['post']);
}else {

  $_SESSION['error'] = 'You Aren\'t Authourized To Be Here !!!';
  header('refresh:0; url=../views/index.php');

}

require_once '../inc/scripts.php'; ?>
