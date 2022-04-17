<?php
session_start();
include("../../db.php");
include "sidenav.php";
include "topheader.php"; 

$user = $_POST["user"];

?>

<div class="content">
  <div class="container-fluid">
    <form action="" method="POST" type="form" name="form" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h5 class="title">Search Student</h5>
          </div>
          <div class="card-body">
            <div class="row-md-12">
              <div class="form-group">
                <label>Student ID</label>
                  </br>
                  <form action="" method="POST">
                  <input type="text" id="search_id" name="user" required class="form-control" >
                <div class="card-footer">
                    <button type="submit" id="search_btn" name="btn_save" required class="btn btn-fill btn-primary">Search Student</button>
                </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </form>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
          <h5 class="title">Info</h5>
      </div>
      <div class="card-body">
        <div class="table-responsive ps">
          <table class="table table-hover tablesorter " id="">
            <thead class=" text-primary">
              <tr><th>Image</th><th>ID</th><th>FirstName</th><th>LastName</th><th>Email</th><th>Contact</th><th>Address</th><th>Department</th><th>Result</th><th>Semester</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $min_length = 9;
                if(strlen($user) >= $min_length){
                  $result=mysqli_query($con,"SELECT * FROM student_info WHERE user_id = $user") or die ("query 1 incorrect.....");
                  if($result){
                    while(list($user_id,$first_name,$last_name,$email,$mobile,$address1,$department_Id,$Result,$Semester,$stu_image)=mysqli_fetch_array($result))
                    {
                      echo"<tr>
                        <a class='btn btn-success' href='activity.php?user_id=$user_id&first_name=$first_name&last_name=$last_name&email=$email&mobile=$mobile&address1=$address1&department_Id=$department_Id&Result=$Result&Semester=$Semester&stu_image=$stu_image'>Edit Info<div class='ripple-container'></div></a>
                        </tr>";
                      echo "<tr><td><img src='../../student_images/$stu_image' style='width:50px; height:50px; border:groove #000'></td><td>$user_id</td><td>$first_name</td><td>$last_name</td><td>$email</td><td>$mobile</td><td>$address1</td><td>$department_Id</td><td>$Result</td><td>$Semester</td></tr>";
                      
                      
                    }
                  }
                  else{
                    echo "No results";
                  }
                }
            ?>
              </tbody>
            </table>
        </div>
        
      </div>
    </div>
  </div>
</div>
<?php
include "footer.php";
?>
<script>
  <link href="../assets/css/material-dashboard.css" rel="stylesheet">
</script>