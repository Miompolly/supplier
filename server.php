<?php
    session_start(); 

    $conn = mysqli_connect('localhost','root','','supplierchainmanagement');

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        

        if (isset($_POST['register'])) {  
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $gender = $_POST["gender"];
            $province = $_POST["province"];
            $district = $_POST["district"];
            $sector = $_POST["sector"];
            $cell = $_POST["cell"];
            $phone = $_POST["number"];
            $password = md5($_POST["password"]);
            $cpassword = md5($_POST["cpassword"]);
        
            
            if (empty($firstname) || empty($lastname) || empty($email) || empty($gender) || empty($province) || empty($district) || empty($sector) || empty($cell) || empty($phone) || empty($password) || empty($cpassword)) {
                $_SESSION['error'] = "All fields are required !.";   
                header("Location: signup.php"); 
                exit();
                            
            } elseif ($password !== $cpassword) {
                $_SESSION['error'] = "Password did not match !";
                header("Location: signup.php");
                exit();
            }else{       

                $query = "SELECT * FROM users WHERE email='$email'";
                $result = mysqli_query($conn, $query);
            
                if (mysqli_num_rows($result) > 0) {
                    $_SESSION['error'] = "Email already exists. Please use a different email.";
                    header("Location: signup.php");
                    exit();
                }else{
            

                
                $sql = "INSERT INTO users (firstname, lastname, email, gender, province, district, sector, cell, phone, password_hash)VALUES('$firstname', '$lastname', '$email', '$gender', '$province', '$district', '$sector', '$cell', '$phone', '$password')";

               $result = mysqli_query($conn,$sql);
               if ($result) {
                $_SESSION['success'] = "Registration successful!";
                header("Location: signin.php");
                exit();
            } else {
                $_SESSION['error'] = "Error: " . mysqli_error($conn);
                header("Location: signup.php");
                exit();
            }


            }
        }

        }


        if (isset($_POST['login'])) {             
            $email = $_POST["email"];           
            $password = md5($_POST["password"]);

            $query = "SELECT * FROM users WHERE email='$email' AND password_hash='$password'";
            $result = mysqli_query($conn, $query);
        
            if (mysqli_num_rows($result) > 0) {

                $user = mysqli_fetch_assoc($result);
                $_SESSION['user'] = $user;
                $_SESSION['success'] =$user['firstname'];
                header("Location:admin.php");
                exit();
            }else{
                $_SESSION['error'] = "Incorrect Email or Password";
                header("Location:signin.php");
                exit();
            }





        }
        
        
    }
    

?>
