<?php 

require('connection.inc.php');
require('functions.inc.php');

if(!isset($_SESSION['USER_LOGIN'])){
        ?>
    <script>
        window.location.href='index.php';
    </script>
    <?php 
   }
$current_password = get_safe_value($con, $_POST['current_password']);
$new_password = get_safe_value($con, $_POST['new_password']);

$uid = $_SESSION['USER_ID'];

$row = mysqli_fetch_assoc(mysqli_query($con, "SELECT password FROM users WHERE id='$uid'"));

if($row['password']!= $current_password){
    echo 'Please Enter Valid Current Password';
}else{

    mysqli_query($con, "UPDATE users SET password='$new_password' WHERE id='$uid'");
    echo 'Your Password Updated';
}


?>


