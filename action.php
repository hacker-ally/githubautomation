<?php

$conn = mysqli_connect("localhost", "root", "", "log");
if(!$conn){
    die("Error" . mysqli_connect_error());
}
$user = $_POST['user'];
$email = $_POST['email'];
$password = $_POST['pass'];
$sql = "INSERT INTO `forms` (`username`, `email`, `passcode`) VALUES ('$user', '$email', '$password')";

if(empty($_POST['user']) || empty($_POST['email']) || empty($_POST['pass'])){
        echo "<script>
            alert('All Fildes are require!');
            window.location.href='http://localhost/form/index.html';
            </script>";
}

elseif (mysqli_query($conn, $sql)) {
    echo "<script>
    alert('Registration was Seccussfull');
    window.location.href='http://localhost/form/index.html';
    </script>";
}
else{
    echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
}
// if(empty($_POST['user'])){
//     echo "Username and password is requiered!";
// }

?>
