<?php
//function to connect to database
function doDB(){
    global $mysqli;

    //connect to server and select database
    $mysqli = mysqli_connect("localhost", "root","","test");

    //if connection fails, stop script exectuion
    if (mysqli_connect_errno()){
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

}

//function to check email address
function emailChecker($email){
    global $mysqli, $safe_email, $check_res;

    //check that email is not already in list
    $safe_email= mysqli_real_escape_string($mysqli, $email);
    $check_sql = "SELECT id FROM SUBSRIBERS WHERE email = '".$safe_email."'";
    $check_res = mysqli_query($mysqli, $check_sql)
        or die(mysqli_error($mysqli));
}
?>
