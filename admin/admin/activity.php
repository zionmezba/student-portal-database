<script src="assets/js/sweetalert.min.js"></script>
<?php
session_start();
include("../../db.php");
error_reporting(0);

$user_id=$_GET['user_id'];
$first_name=$_GET['first_name'];
$last_name=$_GET['last_name'];
$email=$_GET['email'];
$mobile=$_GET['mobile'];
$address1=$_GET['address1'];
$Result=$_GET['Result'];
$department_Id=$_GET['department_Id'];
$Semester=$_GET['Semester'];

if(isset($_POST['btn_save']))
{
  $first_name=$_POST['first_name'];
  $last_name=$_POST['last_name'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $address1=$_POST['address1'];
  $result=$_POST['Result'];
  $department_Id=$_POST['department_Id'];
  $Semester=$_POST['Semester'];

  //picture coding
  $picture_name=$_FILES['picture']['name'];
  $picture_type=$_FILES['picture']['type'];
  $picture_tmp_name=$_FILES['picture']['tmp_name'];
  $picture_size=$_FILES['picture']['size'];

  if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif")
  {
    if($picture_size <= 50000000)
      $pic_name="diu"."_".$user_id.".png";
      move_uploaded_file($picture_tmp_name,"C:/xampp/htdocs/student-portal-diu/student_images/".$pic_name);
    mysqli_query($con,"UPDATE student_info SET user_id = '$user_id', first_name = '$first_name', last_name = '$last_name',email = '$email',mobile = '$mobile',address1 = '$address1',department_Id = '$department_Id',Result = '$result', Semester = '$Semester',stu_image = '$pic_name' WHERE user_id = '$user_id'") or die ("Query 1 is inncorrect........"); 
    
  }
  mysqli_close($con);
  header('Location: manageuser.php');
}



if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$order_id=$_GET['order_id'];

/*this is delet query*/
mysqli_query($con,"delete from orders where order_id='$order_id'")or die("delete query is incorrect...");
} 

///pagination
$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
}
include "sidenav.php";
include "topheader.php";
?>

<script>
  function alertm(){
  Swal.fire({
  position: 'bottom-end',
  icon: 'success',
  title: 'Data has been saved',
  showConfirmButton: false,
  timer: 2500
  })
}
</script>


<style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
  
        input[type=number] {
            -moz-appearance: textfield;
        }
</style>
      
<div class="content">
  <div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Edit/Update Student Info</h4>
            <p class="card-category">Update Info</p>
          </div>
          <div class="card-body">
            <form action="" method="post" name="form" enctype="multipart/form-data">
              <div class="row">
              <table class="table tablesorter " id="page1">
              <thead class=" text-primary">
              <tbody>
                <?php 
                  $result= mysqli_query($con,"SELECT stu_image FROM student_info where user_id='$user_id'")or die ("query 1 incorrect.....");
                  while(list($stu_image)=mysqli_fetch_array($result))
                  {
                  echo "<tr><td><img src='../../student_images/$stu_image' style='width:100px; height:100px; border:groove #000'></td>
                  </tr>";
                  }
                  ?>
                  <tr><td>
                  <input type="file" name="picture" required class="btn btn-fill btn-link" id="picture"></td></tr>
              </tbody>
            </table>
            </div>
              
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Student ID</label>
                    <input type="number" value='<?php echo "$user_id"?>' name="user_id" id = "user_id" disabled ="true" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">First Name</label>
                    <input type="text" value='<?php echo "$first_name"?>' name="first_name" id="first_name"  class="form-control" required>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Last Name</label>
                    <input type="text" value='<?php echo "$last_name"?>' name="last_name" id="last_name"  class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Email</label>
                    <input type="email" value='<?php echo "$email"?>' name="email" id="email" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Mobile</label>
                    <input type="Number" value='<?php echo "$mobile"?>' id="mobile" name="mobile" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Address</label>
                    <input type="text" value='<?php echo "$address1"?>' id="address1" name="address1" class="form-control" required>
                  </div>
                </div>
              </div>
              <!-- Warning -->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Result</label>
                    <input type="text" value='<?php echo "$Result"?>' id="result" name="Result" class="form-control" required>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Semester</label>
                    <input type="Number" value='<?php echo "$Semester"?>' min="1" max="13" name="Semester" id="city"  class="form-control" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Department ID</label>
                    <input type="number" value='<?php echo "$department_Id"?>' name="department_Id" id="department_Id" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-md-4" style="padding: top 20px;">
                <div class="">
                </div>
              </div>
              </div>
              <button type="submit" onclick="alertm()" name="btn_save" id="btn_save" class="btn btn-primary pull-right">Update Data</button>
            </form>
          </div>
        </div>
      </div>
  </div>
</div>
<?php

include "footer.php";
include("scripts.php");
?>