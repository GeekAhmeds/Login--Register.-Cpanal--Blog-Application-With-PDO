<?php
require_once '../inc/navbar.php';
?>
<div class="container">
<div class="row">


<?php
if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
  ?>
<div class="alert alert-danger">
  <center><?=$_SESSION['error'];?></center>
</div>
  <?php
  unset($_SESSION['error']);
}elseif (isset($_SESSION['successful']) && !empty($_SESSION['successful'])) {
  ?>
<div class="alert alert-success">
  <center><?=$_SESSION['successful'];?></center>
</div>
  <?php
unset($_SESSION['successful']);
}
if ( count($_SESSION['posts']) > 0  && $_SESSION['posts'] !== false ) {
  ?>
  <table class="table">
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Body</th>
      <th>Status</th>
      <th>Edit Post</th>
    </tr>
  <?php
  foreach ($_SESSION['posts'] as $value) {
?>
    <tr>
      <td><?= $value['id'] ?></td>
      <td><?= $value['title']  ?></td>
      <td><?= $value['body']  ?></td>
      <td><?= ($value['approved'] == 0) ?'Not Approved' : 'Approved' ?></td>
      <td><a class="btn btn-primary" href="../control/edit.php?id=<?= $value['id']?>">Edit Post</a></td>

    </tr>
<?php
  }
  ?>
</table>
  <?php
}else {
  echo "No Posts Here";
}
?>


</div>
</div>
<?php require_once '../inc/scripts.php'; ?>
