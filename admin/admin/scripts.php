<?php 
session_start();
?>

<script src="assets/js/sweetalert.min.js"></script>

<?php
if(isset($_SESSION['succcess']))
{   
    header('Location: manageuser.php');
?>
<script>
    Swal.fire({
    position: 'bottom-end',
    icon: 'success',
    title: 'Data has been saved',
    showConfirmButton: false,
    timer: 2500
    })
</script>
    <?php
    // unset $_SESSION['success'];
}
?>

