<?php
session_start();

// Database Settings
$host = "localhost";
$user = "root";
$password = "";
$database = "cle2_database";

$db = mysqli_connect($host, $user, $password, $database) 
    or die ('Error: '.mysqli_connect_error());

// User Data - Table Users
// Register
if(isset($_POST['register'])) {
    $email =  mysqli_escape_string($db, $_POST['email']);
    $password = $_POST['password'];
    $password_check = $_POST['password_check'];
    $firstname_parent =  mysqli_escape_string($db, $_POST['firstname_parent']);
    $lastname_parent =  mysqli_escape_string($db, $_POST['lastname_parent']);
    $phonenumber =  mysqli_escape_string($db, $_POST['phonenumber']);
    $firstname_child =  mysqli_escape_string($db, $_POST['firstname_child']);
    $age_day_child =  mysqli_escape_string($db, $_POST['age_day_child']);
    $age_month_child =  mysqli_escape_string($db, $_POST['age_month_child']);
    $age_year_child =  mysqli_escape_string($db, $_POST['age_year_child']);

    // Error codes for when input fields are empty or incorrect
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
    if($age_day_child == "") {
        $errors['age_day_child'] = "";
    }
    if($age_month_child == "") {
        $errors['age_month_child'] = "";
    }
    if($age_year_child == "") {
        $errors['age_year_child'] = "";
    }
    // if($age_day_child || $age_month_child || $age_year_child == "") {
    //     $errors['age'] = "Leeftijd is verplicht";
    // }

    // If there are no errors, insert data in database and redirect to index
    if(empty($errors)) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (email, password, firstname_parent, lastname_parent, phonenumber, firstname_child, age_day_child, age_month_child, age_year_child)
                VALUES ('$email', '$password', '$firstname_parent', '$lastname_parent', '$phonenumber', '$firstname_child', '$age_day_child', '$age_month_child', '$age_year_child')";
        
        $result = mysqli_query($db, $query)
        or die('Database Error: '.mysqli_error($db).' with query: '.$query);

        $_SESSION['email'] = $email;

        if ($result) {
            header('location:index.php');
            exit;
        }
    }
}

// Login

if(isset($_POST['login'])) {
    $email =  mysqli_escape_string($db, $_POST['email']);
    $password =  $_POST['password'];

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
    
    // If amount of errors is equal to 0, check inserted data and get from database
    if(empty($errors)) {
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 1) {
            
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                echo 'Password is valid!';
                $_SESSION['email'] = $email;
                header('location:index.php'); 
            } else {
                echo 'Invalid password.';
            } 
        }
    }
}

// Logout
if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header('location: index.php');
}

// Select users from database
$query = "SELECT * FROM users ORDER BY lastname_parent ASC";

$result = mysqli_query($db, $query)
    or die('Error: '.mysqli_error($db). ' with query: '.$query);

$users = [];
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

// Admin id = id of user that needs to be admin
$admin = 1;

// Check of user is logged in
if (isset($_SESSION['email'])) {

    // Select user data from database
    $query = "SELECT * FROM users WHERE email = '".$_SESSION['email']."'";
    $result = mysqli_query($db, $query) or die ('Error: ' . $query);

    $user = mysqli_fetch_assoc($result);

    // Delete user(s) from table
    if (isset($_POST['delete_user'])) {
        $userId = mysqli_escape_string($db, $_POST['id']);
        $query = "SELECT * FROM users WHERE id = '$userId'";

        $query = "DELETE FROM users WHERE id = '$userId'";
        mysqli_query($db, $query) or die ('Error: ' . mysqli_error($db));

        // Redirect to users.php to stay on users.php
        header("Location: users.php");
        exit;

    } else if (isset($user['id']) || $user['id'] != '') {
        $userId = mysqli_escape_string($db, $user['id']);

        $query = "SELECT * FROM users WHERE id = '$userId'";
        $result = mysqli_query($db, $query) or die ('Error: ' . $query);

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
        } 
        else {
            // Redirect when db returns no result
            header('location: index.php');
            exit;
        }
    } else {
        // Id was not present in the url OR the form was not submitted, Redirect to index
        header('location: index.php');
        exit;
    }


    // Delete logged in user account from database and return to index
    if (isset($_POST['delete_account'])) {
        $query = "DELETE FROM users WHERE email = '".$_SESSION['email']."'";
        $result = mysqli_query($db, $query)
        or die('Database Error: '.mysqli_error($db).' with query: '.$query);
            session_destroy();
            unset($_SESSION['email']);
            header('location: index.php');
            exit;
    }


    // Edit account data of logged in user
    $query = "SELECT * FROM users WHERE id = '$userId'";
    $result = mysqli_query($db, $query) or die ('Error: ' . $query);
    
    $user = mysqli_fetch_assoc($result);

    // Edit Email
    if(isset($_POST['edit_email'])) {
        $email = mysqli_escape_string($db, $_POST['email']);
        $edit = mysqli_query($db,"UPDATE users SET email='$email' WHERE id='$userId'");  
        if($edit) {
            header("location: account.php");
            exit;
        } else {
            echo mysqli_error();
        }    	
    }
    // Edit Password
    if (isset($_POST['edit_password'])) {
        $result = mysqli_query($db, "SELECT * FROM users WHERE email='" . $_SESSION["email"] . "'");
        $user = mysqli_fetch_assoc($result);
        if (password_verify($_POST["password_current"], $user['password']) == $user["password"]) {
            mysqli_query($db, "UPDATE users SET password='". password_hash($_POST["password_new"], PASSWORD_DEFAULT)."' WHERE email='" . $_SESSION["email"] . "'");
                $message = "Password Changed";
            } else
                $message = "Current Password is not correct";
        }


    
    // Edit Phonenumber
    if(isset($_POST['edit_phonenumber'])) {
        $phonenumber = mysqli_escape_string($db, $_POST['phonenumber']);    
        $edit = mysqli_query($db,"UPDATE users SET phonenumber='$phonenumber' WHERE id='$userId'");
        if($edit) {
            header("location: account.php");
            exit;
        } else {
            echo mysqli_error();
        }    	
    }
    // Edit Firstname Parent
    if(isset($_POST['edit_firstname_parent'])) {
        $firstname_parent = mysqli_escape_string($db, $_POST['firstname_parent']);    
        $edit = mysqli_query($db,"UPDATE users SET firstname_parent='$firstname_parent' WHERE id='$userId'");
        if($edit) {
            header("location: account.php");
            exit;
        } else {
            echo mysqli_error();
        }    	
    }
    // Edit Lastname Parent
    if(isset($_POST['edit_lastname_parent'])) {
        $lastname_parent = mysqli_escape_string($db, $_POST['lastname_parent']);
        $edit = mysqli_query($db,"UPDATE users SET lastname_parent='$lastname_parent' WHERE id='$userId'");
        if($edit) {
            header("location: account.php");
            exit;
        } else {
            echo mysqli_error();
        }    	
    }
    // Edit Firstname Child
    if(isset($_POST['edit_firstname_child'])) {
        $firstname_child = mysqli_escape_string($db, $_POST['firstname_child']);
        $edit = mysqli_query($db,"UPDATE users SET firstname_child='$firstname_child' WHERE id='$userId'");
        if($edit) {
            header("location: account.php");
            exit;
        } else {
            echo mysqli_error();
        }    	
    }
    // Edit Age Day Child
    // if(isset($_POST['edit_age_child'])) {
    //     $age_day_child = mysqli_escape_string($db, $_POST['age_day_child']);
    //     $age_month_child = mysqli_escape_string($db, $_POST['age_month_child']);
    //     $age_year_child = mysqli_escape_string($db, $_POST['age_year_child']);
    //     $edit = mysqli_query($db,"UPDATE users SET age_day_child='$age_day_child' WHERE id='$userId'");
    //     if($edit) {
    //         header("location: account.php");
    //         exit;
    //     } else {
    //         echo mysqli_error();
    //     }    	
    // }
}

//Reservation


//Close connection
mysqli_close($db);