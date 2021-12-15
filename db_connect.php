<?php
session_start();

//Database Settings
$host = "localhost";
$user = "root";
$password = "";
$database = "cle2_database";

$db = mysqli_connect($host, $user, $password, $database)
    or die('Error: '.mysqli_connect_error());

//User Data - Table Users
    //Register
if(isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_check = $_POST['password_check'];
    $firstname_parent = $_POST['firstname_parent'];
    $lastname_parent = $_POST['lastname_parent'];
    $phonenumber = $_POST['phonenumber'];
    $firstname_child = $_POST['firstname_child'];
    $age_day_child = $_POST['age_day_child'];
    $age_month_child = $_POST['age_month_child'];
    $age_year_child = $_POST['age_year_child'];

    //Error codes for when input fields are empty
    $errors = [];
    if($email == "") {
        $errors['email'] = "Email is verplicht";
    }
    if($password == "") {
        $errors['password'] = "Wachwoord is verplicht";
    }
    if($password != $password_check) {
        $errors['password_check'] = "Wachtwoorden komen niet overeen";
    }
    if($firstname_parent == "") {
        $errors['firstname_parent'] = "Voornaam is verplicht";
    }
    if($lastname_parent == "") {
        $errors['lastname_parent'] = "Achternaam is verplicht";
    }
    if($phonenumber == "") {
        $errors['phonenumber'] = "Telefoonnummer is verplicht";
    }
    if($firstname_child == "") {
        $errors['firstname_child'] = "Voornaam is verplicht";
    }
    // if($age_day_child || $age_month_child || $age_year_child == "") {
    //     $errors['age'] = "Leeftijd is verplicht";
    // }

    //If amount of errors is equal to 0, insert data in database
    if(count($errors) == 0) {
        //-->   Insert Password Hash    <----
        $sql = "INSERT INTO users (email, password, firstname_parent, lastname_parent, phonenumber, firstname_child, age_day_child, age_month_child, age_year_child)
                VALUES ('$email', '$password', '$firstname_parent', '$lastname_parent', '$phonenumber', '$firstname_child', '$age_day_child', '$age_month_child', '$age_year_child')";
        mysqli_query($db, $sql);  
        $_SESSION['email'] = $email;
        header('location:index.php');
    }
}

    //Login
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors = [];
    if($email == "") {
        $errors['email'] = "";
    }
    if($password == "") {
        $errors['password'] = "";
    }
    if(count($errors) > 0) {
        $errors['errorlogin'] = "Email of Wachtwoord is onjuist";
    }
    
    //If amount of errors is equal to 0, check inserted data and pick up from database
    if(count($errors) == 0) {
    //password
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['email'] = $email;
            header('location:index.php'); 
        }
    }
}

    //Select users from database
$query = "SELECT * FROM users";

$result = mysqli_query($db, $query)
    or die('Error: '.mysqli_error($db). ' with query: '.$query);

$user_data = [];

while($row = mysqli_fetch_assoc($result)) {
    $user_data[] = $row;
}

    //Logout
if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header('location: index.php');
}

//Reservation

// mysqli_close($db);