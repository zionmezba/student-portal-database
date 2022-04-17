<?php
session_start();
include("./includes/db.php");
if (isset($_POST['re_password']))
{
  $email=$_SESSION['admin_email'];
  $old_pass = $_POST['old_pass'];
  $op = ($old_pass);
  $new_pass = $_POST['new_pass'];
  $re_pass = $_POST['re_pass'];
  $password_query = mysqli_query($con,"select * from admin_info where admin_email='$email'");
  $password_row = mysqli_fetch_array($password_query);
  $database_password = $password_row['admin_password'];
  if ($database_password == $op)
    {
    if ($new_pass == $re_pass)
      {
        $pass = ($re_pass);
      $update_pwd = mysqli_query($con,"UPDATE admin_info set admin_password='$pass' where admin_id='6'");
      echo "<script>alert('Update Sucessfully'); </script>";
      }
      else
      {
      echo "<script>alert('Your new and Retype Password is not match'); </script>";
      }
    }
    else
    {
    echo "<script>alert('Your old password is wrong'); </script>";
    }
  }
 
include "sidenav.php";
include "topheader.php";

?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Change Password</h4>
            <p class="card-category">Don't forget your Password</p>
          </div>
          <div class="card-body">
            <form method="post" action="profile.php">
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">
                      <?php  if (isset($_SESSION['admin_name'])) : ?><?php echo $_SESSION['admin_name']; ?>
        <?php endif ?>
                    
                  </label>
                    <input type="text" class="form-control" disabled="">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">enter old password</label>
                    <input type="text" class="form-control" name="old_pass" id="npwd">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">New Password</label>
                    <input type="text" class="form-control" name="new_pass" id="npwd">
                  </div>
                </div>
                
                <div class="col-md-4">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Confirm New Password</label>
                    <input type="text" class="form-control" name="re_pass" id="npwd">
                  </div>
                </div>
          
              <button class="btn btn-primary pull-right" type="submit" name="re_password">Update Profile</button>
              
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    
    </div>
  </div>
</div>
<?php
include "footer.php";
?>