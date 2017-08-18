<?php
require_once 'navbar.php';
if (!isset($_SESSION['loggedin']) && empty($_SESSION['loggedin']) ){
    header('refresh:.5; url login.php ');

}
?>
      <div class="container">
        <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
          ?>
          <div class="alert alert-danger">
            <?=  $_SESSION['error'] ?>
          </div>

          <?php
          unset($_SESSION['error']);
        }elseif (isset($_SESSION['successful']) && !empty($_SESSION['successful'])) {
          ?>
          <div class="alert alert-success">
            <?= $_SESSION['successful'] ?>
          </div>
          <?php
          unset($_SESSION['successful']);
        }
        ?>
          <form action="../control/create.php" method="POST">
              <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" placeholder='Enter A Title' class='form-control' >

              </div>
                  <div class="form-group">
                      <label for="body">Post Body : </label>
                      <textarea name="body" id="body" class='form-control' placeholder="Write The New Post" cols="30" rows="10"></textarea>
                  </div>
              <div class='form-group'>
                  <center>
                       <input type="submit" name='submit' value='Post' class="btn btn-info">
                  </center>
              </div>
          </form>

      </div>
