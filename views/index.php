<?php
require_once '../inc/navbar.php';
if (!isset($_SESSION['loggedin']) && empty($_SESSION['loggedin']) ){
    header('refresh:.0; url=login.php');

}

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
      <th>Delete Post</th>
    </tr>
  <?php
  foreach ($_SESSION['posts'] as $value) {
?>
    <tr>
      <td><?= $value['id'] ?></td>
      <td><?= $value['title']  ?></td>
      <td><?= $value['body']  ?></td>
      <td>
      <?php
            if ($value['approved'] === 1) {
              ?>
                <a href="../control/approval.php?action=unapproved&id=<?=$value['id'];?>" class='btn btn-danger'>Approved</a>

              <?php
            }elseif ($value['approved'] === 0) {
              ?>
          <a href="../control/approval.php?action=approved&id=<?=$value['id'];?>" class='btn btn-primary'>Un Approved</a>

              <?php
            }
                ?>
      
      </td>
      <td><a class="btn btn-primary" href="../control/edit.php?id=<?= $value['id']?>">Edit Post</a></td>
      <td><form action="../control/delete.php" method="POST">
        <input type="hidden" name="id" value="<?= $value['id']; ?>">
        <input type="submit" name="delete" value="Delete Post" class="btn btn-danger">
      </form></td>
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
