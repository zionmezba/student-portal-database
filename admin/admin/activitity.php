<?php 
include("../../db.php");
?>

<div class="row" style="padding-top: 10vh; padding-left:3vh;padding-right:3vh;">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">people</i>
                </div>
                <p class="card-category">Total Students</p>
                <h3 class="card-title">
                    <?php  $query = "SELECT user_id FROM student_info"; 
                                    $result = mysqli_query($con, $query); 
                                    if ($result) 
                    { 
                        // it return number of rows in the table. 
                        $row = mysqli_num_rows($result); 
                            
                        printf(" " . $row); 
                    
                        // close the result. 
                    }  ?>
                </h3>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">business</i>
                </div>
                <p class="card-category">Total Departments</p>
                <h3 class="card-title"> <?php  $query = "SELECT dept_id FROM departments"; 
                                    $result = mysqli_query($con, $query); 
                                    if ($result) 
                {
                    $row = mysqli_num_rows($result); 
                    printf(" " . $row); 
                } ?></h3>
            </div>
        </div>
    </div>
    </div>
    <div class="row" style="padding-top: 5vh; padding-left:3vh;padding-right:3vh;">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">assignment_ind</i>
                </div>
                <p class="card-category">Total Teachers</p>
                <h3 class="card-title"><?php  $query = "SELECT admin_id FROM admin_info"; 
                                    $result = mysqli_query($con, $query); 
                                    if ($result) 
                {
                    $row = mysqli_num_rows($result); 
                    printf(" " . $row); 
                } ?></h3>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
                    <i class="material-icons">school</i>
                </div>
                <p class="card-category">Total Graduated</p>
                <h3 class="card-title"><?php  $query = "SELECT Semester FROM student_info where Semester >= 12"; 
                                    $result = mysqli_query($con, $query); 
                                    if ($result) 
                    {
                        $row = mysqli_num_rows($result); 
                        printf(" " . $row); 
                    }  ?></h3>
            </div>
        </div>
    </div>
</div>