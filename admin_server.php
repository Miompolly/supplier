<?php
include 'config.php';

if (isset($_POST['deleteUser'])) {
    
    $userid = $_POST['userid'];
    $sql = "DELETE FROM users WHERE id = $userid";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('User removed successfully!');
             window.location.href = 'admin_user.php';</script>";
    } else {
        echo "Error deleting user: " . $conn->error;
    }


}



if (isset($_POST['editUser'])) {
    $userid = $_POST['userid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];  
   
    $sql = "UPDATE users SET firstname = '$firstname',lastname='$lastname',email='$email',role='$role',phone='$phone' WHERE id ='$userid'";
    $result = $conn->query($sql);
    
    if ($result) {
        echo "<script>alert('User info updated successfully!');
             window.location.href = 'admin_user.php';</script>";
    } else {
        echo "Error updating user info: " . $conn->error;
    }
}

?>