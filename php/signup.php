<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $class = mysqli_real_escape_string($conn, $_POST['class']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$email - This email already exist!";
            }else{
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
    
                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                                $ran_id = rand(time(), 100000000);
                                $status = "Wykazuje aktywność!";
                                $encrypt_pass = md5($password);
                                //dopsiac tutaj czy nauczyciel czy uczen i jak uczen to jaka kl
                                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}')");
                                $user_id_="SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1;";
                if($wynik=$conn->query($user_id_))
                    while($row=$wynik->fetch_array())
                        $id=$row["user_id"];
                       
                $class_id_="SELECT class_id FROM class where class_name='{$class}';";
                if($wynik1=$conn->query($class_id_)){
                    while($row1=$wynik1->fetch_array())
                        $class_id_k=$row1["class_id"];}
                $subject_id_="SELECT subject_id FROM 'subject' where subject_name='{$subject}';";
                if($wynik22=$conn->query($subject_id_)){
                    while($row22=$wynik22->fetch_array())
                        $subject_k=$row22["subject_id"];
                        echo $subject_k;}
                        
if($type=='student'){
     $insert_query_stu = mysqli_query($conn, "INSERT INTO students(user_id, unique_id, class_id)
                                 VALUES ('{$id}','{$ran_id}','{$class_id_k}')");
                                
}
//zmien na subject_id
else if($type=='teacher') {
     $insert_query_te = mysqli_query($conn, "INSERT INTO teachers(user_id, unique_id, subject)
                                 VALUES ('{$id}','{$ran_id}','{$subject_k}')");
}
                                
                                if($insert_query){
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];
                                        echo "success";
                                    }else{
                                        echo "This email address not Exist!";
                                    }
                                }else{
                                    echo "Something went wrong. Please try again!";
                                }
                            }
                        }else{
                            echo "Please upload an image file - jpeg, png, jpg";
                        }
                    }else{
                        echo "Please upload an image file - jpeg, png, jpg";
                    }
                }
            }
        }else{
            echo "$email is not a valid email!";
        }
    }else{
        echo "All input fields are required!";
    }
?>