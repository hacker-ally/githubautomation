<?php

$conn = mysqli_connect("localhost", "root", "", "log");
if(!$conn){
    die("Error" . mysqli_connect_error());
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    
    $myusername = $_POST['username'];
    $mypassword = $_POST['password']; 
    
    $sql = "SELECT * FROM `forms` WHERE `email` LIKE '$myusername' AND `passcode` LIKE '$mypassword'";
    $result = mysqli_query($conn, $sql);
    // $row = mysqli_num_rows($result);
    // echo var_dump($result);
    $row = mysqli_fetch_array($result);
       
    if($row['email'] == $myusername && $row['passcode'] == $mypassword) {
        echo "<script>
        alert('Logged in Seccussfully');
        window.location.href='http://localhost/form/login.html';
        </script>";
    }
    else {
        echo "<script>
             alert('Your Login Name or Password is invalid!');
             window.location.href='http://localhost/form/login.html';
             </script>";
    }
}
// $user = $_POST['username'];
// $password = $_POST['password'];
// $sql = "INSERT INTO `login` (`username`, `password`) VALUES ('$user', '$password')";

// if(empty($_POST['username']) && empty($_POST['password'])){
//         echo "<script>
//             alert('All Fildes are require!');
//             window.location.href='http://localhost/form/login.html';
//             </script>";
// }

// elseif (mysqli_query($conn, $sql)) {
//     echo "<script>
//     alert('Logged in Seccussfull');
//     window.location.href='http://localhost/form/login.html';
//     </script>";
// }
// else{
//     echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
// }
?>