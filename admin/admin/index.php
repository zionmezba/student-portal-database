    <?php
session_start();
include("../../db.php");

include "sidenav.php";
include "topheader.php";
include "activitity.php";

?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <div class="panel-body">
		<a>
            <?php  //success message
            if(isset($_POST['success'])) {
            $success = $_POST["success"];
            echo "<div class='col-md-12 col-xs-12' id='product_msg'>
          <div class='alert alert-success'>
            <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
            <b>Product is Added..!</b>
          </div>
        </div>";
            }
            ?></a>
                </div>
                <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Active Students List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th>ID</th><th>FirstName</th><th>LastName</th><th>Email</th><th>Contact</th><th>Address</th><th>Department</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"select * from student_info WHERE Semester <=11 ORDER BY department_Id")or die ("query 1 incorrect.....");
                        while(list($user_id,$first_name,$last_name,$email,$phone,$address1,$address2)=mysqli_fetch_array($result))
                        {	
                        echo "<tr><td>$user_id</td><td>$first_name</td><td>$last_name</td><td>$email</td><td>$phone</td><td>$address1</td><td>$address2</td></tr>";
                        }
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

          <!-- department_id Data -->
          <div class="row">
            <div class="col-md-6">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Departments</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th>ID</th><th>Department</th><th>Total Students</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"select DISTINCT * from departments")or die ("query 1 incorrect.....");
                        $i=101;
                        while(list($dept_id,$dept_title)=mysqli_fetch_array($result))
                        {	
                            $sql = "SELECT COUNT(*) as count_items FROM student_info WHERE department_id = $i";
                            $query = mysqli_query($con,$sql);
                            $row = mysqli_fetch_array($query);
                            $count=$row["count_items"];
                            $i++;
                        echo "<tr><td>$dept_id</td><td>$dept_title</td><td>$count</td>
                        </tr>";
                            $count = 0;
                        }
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>

          <!-- Toppers Section -->
          <div class="col-md-6">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Toppers</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th>ID</th><th>Name</th><th>Result</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $result1=mysqli_query($con,"SELECT user_id, first_name, MAX(Result) FROM student_info GROUP BY department_Id")or die ("query 1 incorrect.....");
                        
                        while(list($user_id,$first_name,$Result)=mysqli_fetch_array($result1))
                        {	
                        echo "<tr><td>$user_id</td><td>$first_name</td><td>$Result</td>
                        </tr>";
                        }
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
      <?php
include "footer.php";
?>