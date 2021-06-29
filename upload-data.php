<?php
include('db_connection.php');
include('google-sign-in.php');
if(isset($_POST['upload_btn'])){
        var_dump($_POST['upload_btn']);
        $full_addr=$_POST['f_address'];
        $city=$_POST['city'];
        $Room_type=$_POST['l_type'];
        $for_which=$_POST['for_which'];
        $rent=$_POST['rent'];
        $mob=$_POST['mob_no'];
        $desc=$_POST['disc'];
        $email=$_SESSION['user_email_address'];
        $full_name= $_SESSION['user_first_name']." ".$_SESSION['user_last_name'];
        $dt= date("D-M-Y")."_".date("h:i:sa");
        //print_r($_FILES['img_file']);*/
        $insert = "INSERT INTO user_data (name, mob, email, f_address, city , room_type, For_which, rent, photo, description) VALUES ('$full_name', '$mob', '$email','$full_addr','$city','$Room_type','$for_which','$rent', '$dt','$desc')";
        $conn->query($insert);
        $id="select id from user_data where photo='$dt'";
        $fetched_data=$conn->query($id);
        $rows=$fetched_data->fetch_assoc();
    //File handling
    if(!empty(array_filter($_FILES['img_file']['name']))){
        // Loop through each file in files[] array
        foreach ($_FILES['img_file']['tmp_name'] as $key => $value){
            $file_tmpname = $_FILES['img_file']['tmp_name'][$key];
            $file_name = $_FILES['img_file']['name'][$key];
            $file_size = $_FILES['img_file']['size'][$key];
            $file_type = $_FILES['img_file']['type'][$key];
            
            // Set upload file path
            //echo $file_type;
            $upload_dir='uploaded-images/';
            $filepath = $upload_dir.$rows['id']."_".$key.str_replace('image/','.',$file_type);
            //echo $filepath;
            move_uploaded_file($file_tmpname, $filepath);
        }
    }
    header('location:index.php');
}
?>