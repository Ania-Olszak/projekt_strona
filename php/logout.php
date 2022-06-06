<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Zdala od PasteZSTI";
 $logout_data = date("m.d.y"); 
                $logout_time = date("H:i:s"); 
            $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");
            //$sql3 = mysqli_query($conn, "UPDATE user_time SET login_data = '{$login_data}' WHERE unique_id = {$row['unique_id']}");
                //$sql4 = mysqli_query($conn, "UPDATE user_time SET login_time = '{$login_time}' WHERE unique_id = {$row['unique_id']}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../login.php");
            }
        }else{
            header("location: ../users.php");
        }
    }else{  
        header("location: ../login.php");
    }
?>