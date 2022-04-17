<?php
session_start();
include("../../db.php");
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$user_id=$_GET['user_id'];

/*this is delet quer*/
mysqli_query($con,"delete from student_info where user_id='$user_id'")or die("query is incorrect...");
}

include "sidenav.php";
include "topheader.php";
?>

<div class="content">
  <div class="container-fluid">
    <div class="col-md-14">
      <div class="card ">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Manage Students</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive ps">
            <table class="table tablesorter table-hover" id="">
              <thead class=" text-primary">
                <tr><th>Image</th>
                <th>Student ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Semester</th>
                <th></th>
                <th><a href="addstudents.php" class="btn btn-success">Add New</a></th>
                </tr></thead>
                <tbody>
                <?php 
                  $result=mysqli_query($con,"SELECT * from student_info")or die ("query 2 incorrect.......");
                  // $result=mysqli_query($con,"SELECT * from student_info")or die ("query 2 incorrect.......");
                  while(list($user_id,$first_name,$last_name,$email,$mobile,$address1,$department_Id,$Result,$Semester,$stu_image)=
                  mysqli_fetch_array($result))
                  {
                  echo "<tr>
                  <td><img src='../../student_images/$stu_image' style='width:50px; height:50px; border:groove #000'></td>
                  <td>$user_id</td>
                    <td>$first_name</td>
                    <td>$last_name</td>
                      <td>$email</td>
                    <td>$department_Id</td>
                    <td>$Semester</td>";
                    echo"<td>
                  <a class='btn btn-success' href='activity.php?user_id=$user_id&first_name=$first_name&last_name=$last_name&email=$email&mobile=$mobile&address1=$address1&department_Id=$department_Id&Result=$Result&Semester=$Semester&stu_image=$stu_image'>Edit<div class='ripple-container'></div></a>
                  </td>";
                  echo"<td>
                  <a class='btn btn-danger' href='manageuser.php?user_id=$user_id&action=delete'>Delete<div class='ripple-container'></div></a>
                  </td></tr>";
                  }
                  mysqli_close($con);
                  ?>
                  </tbody>
                </table>
              <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
                </div>
                </div>
                  <div class="ps__rail-y" style="top: 0px; right: 0px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;">
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>

<?php
include "footer.php";
?>
</div>

