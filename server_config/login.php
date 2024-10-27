<?php
  ob_start();

    if (isset($_POST['login'])) {
        $router_id = mysqli_real_escape_string($conn, $_POST['router_id']);
        $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

        $select = mysqli_query($conn, "SELECT * FROM `user_info` WHERE router_id = '$router_id' AND password = '$pass'") or die('query failed');

        if (mysqli_num_rows($select) > 0) {
            $row = mysqli_fetch_assoc($select);
            $_SESSION['user_id'] = $row['user_id'];
        //   header('location: ./');
            exit();
        } else {
            echo 'incorrect password or router_id!';
        }
    }
  ob_end_flush();
?>