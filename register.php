<?php
    ob_start();
    
        if (isset($_POST['register'])) {
            $router_id = mysqli_real_escape_string($conn, $_POST['router_id']);
            $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
            $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
            
            $select = mysqli_query($conn, "SELECT * FROM 'user_info' WHERE router_id = '$router_id'") or die('query failed');
            
            if (mysqli_num_rows($select) > 0) {
                echo 'user already exists';
                
            }
            else {
                mysqli_query($conn, "INSERT INTO 'user_info' (router_id, password) VALUES('$router_id', '$pass')") or die('query failed');
                echo 'registered successfully';
            }
        }
    ob_end_flush();
?>