<?php
session_start();
include("../../db.php");
include "sidenav.php";
include "topheader.php";

if(isset($_POST['btn_save']))
{
  $user_id=$_POST['user_id'];
  $first_name=$_POST['first_name'];
  $last_name=$_POST['last_name'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $address1=$_POST['address1'];
  $result=$_POST['Result'];
  $department_Id=$_POST['department_Id'];
  // $department_Id=mysqli_query($con,"SELECT dept_id FROM departments WHERE dept_title = $department_Id1") or die ("query 1 incorrect.....");
  $Semester=$_POST['Semester'];

  //picture coding
  $picture_name=$_FILES['picture']['name'];
  $picture_type=$_FILES['picture']['type'];
  $picture_tmp_name=$_FILES['picture']['tmp_name'];
  $picture_size=$_FILES['picture']['size'];

  if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif")
  {
    if($picture_size<=50000000)
      $pic_name="diu"."_".$user_id.".png";
      move_uploaded_file($picture_tmp_name,"C:/xampp/htdocs/student-portal-diu/student_images/".$pic_name);

    mysqli_query($con,"INSERT INTO student_info(user_id,first_name,last_name,email,mobile,address1,department_Id,Result,Semester,stu_image) VALUES ('$user_id','$first_name','$last_name','$email','$mobile','$address1','$department_Id','$result','$Semester','$pic_name')") or die ("Query 1 is inncorrect........"); 
  }
  header('Location: manageuser.php');
}
?>
<script src="assets/js/sweetalert.min.js"></script>
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
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Admit Student</h4>
                  <p class="card-category">Enter Info</p>
                </div>
                <div class="card-body">
                  <form action="" method="post" name="form" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Student ID</label>
                          <input type="number" id="user_id" name="user_id" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <input type="text" name="first_name" id="first_name"  class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" name="last_name" id="last_name"  class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Mobile</label>
                          <input type="Number" id="mobile" name="mobile" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" id="address1" name="address1" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <!-- Warning -->
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Result</label>
                          <input type="text" id="result" name="Result" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Semester</label>
                          <input type="Number" min="1" max="13" name="Semester" id="city"  class="form-control" required>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Department ID</label>
                          <input type="number" name="department_Id" id="department_Id" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4" style="padding: top 20px;">
                      <div class="">
                        <label for="">Student Image</label>
                        <input type="file" name="picture" required class="btn btn-fill btn-success" id="picture" >
                      </div>
                    </div>
                    </div>
                    <button type="submit" onclick="alertm()" name="btn_save" id="btn_save" class="btn btn-primary pull-right">Add Info</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
      <?php
include "footer.php";
?>