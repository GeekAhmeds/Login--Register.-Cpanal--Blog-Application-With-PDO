<?php
require_once 'navbar.php';

if ( count($_SESSION['posts']) > 0  && $_SESSION['posts'] !== false ) {
  ?>
  <table class="table">
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Body</th>
      <th>Status</th>
    </tr>
  <?php
  foreach ($_SESSION['posts'] as $value) {
?>
    <tr>
      <td><?= $value['id'] ?></td>
      <td><?= $value['title']  ?></td>
      <td><?= $value['body']  ?></td>
      <td><?= $value['approved']  ?></td>
    </tr>
<?php
  }
  ?>
</table>
  <?php
}else {
  echo "No Posts Here";
}
