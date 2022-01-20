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
    // Email
    // Check for unique email
    $email_unique = "SELECT email FROM users WHERE email='$email'";
    $email_unique_check = mysqli_query($db, $email_unique);

    if($email == "") {                                              // Check if empty
        $errors['email'] = "Email is verplicht";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {        // Check if email is valid
        $errors['email'] = "Voer geldig Email in";
    } else if (mysqli_num_rows($email_unique_check) > 0) {          // Check if email is unique
        $errors['email'] = "Email word al gebruikt";
    }
    // Password
    if($password == "") {                                           // Check if empty
        $errors['password'] = "Wachwoord is verplicht";
    } 
    if ($password != $password_check) {                             // Check if input is the same
        $errors['password_check'] = "Wachtwoorden komen niet overeen";
    }
    // Firstname, Lastname Parent
    if($firstname_parent == "") {                                   // Check if empty
        $errors['firstname_parent'] = "Voornaam is verplicht";
    } else if (!preg_match("/^[a-zA-Z]+$/", $firstname_parent)) {   // Check if input has alphabetic letters
        $errors['firstname_parent'] = "Voer geldige voornaam in";
    }
    if($lastname_parent == "") {                                    // Check if empty
        $errors['lastname_parent'] = "Achternaam is verplicht";
    } else if (!preg_match("/^[a-zA-Z]+$/", $lastname_parent)) {   // Check if input has alphabetic letters
        $errors['lastname_parent'] = "Voer geldige achternaam in";
    }
    // Phonenumber
    if($phonenumber == "") {                                        // Check if empty
        $errors['phonenumber'] = "Telefoonnummer is verplicht";
    } else if (!preg_match("/^[0-9]+$/", $phonenumber)) {           // Check if input has numbers
        $errors['phonenumber'] = "Telefoonummer moet geldig zijn";
    }
    // Firtsname Child
    if($firstname_child == "") {                                    // Check if empty
        $errors['firstname_child'] = "Voornaam is verplicht";
    } else if (!preg_match("/^[a-zA-Z]+$/", $firstname_child)) {    // Check if input has alphabetic letters
        $errors['firstname_child'] = "Voornaam moet geldig zijn";
    }
    // Age Child
    if($age_day_child == "") {                                      // Check if empty
        $errors['age_day_child'] = "";
        $errors['age'] = "Leeftijd is verplicht";
    } else if (!preg_match("/^[0-9]+$/", $age_day_child)) {         // Check if input has numbers
        $errors['age_day_child'] = "";
        $errors['age'] = "Voer geldige leeftijd in";
    }
    if($age_month_child == "") {
        $errors['age_month_child'] = "";
    }
    if ($age_year_child == "") {                                    // Check if empty
        $errors['age_year_child'] = "";
        $errors['age'] = "Leeftijd is verplicht";
    } else if (!preg_match("/^[0-9]+$/", $age_year_child)) {        // Check if input has numbers
        $errors['age_year_child'] = "";
        $errors['age'] = "Voer geldige leeftijd in";
    }

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

    // Error codes for when input fields are empty or incorrect
    $errors = [];
    if($email == "") {                                                      // Check if empty
        $errors['email'] = "";
    }
    if($password == "") {                                                   // Check if empty
        $errors['password'] = "";
    }
    if(count($errors) > 0) {                                                // Check if there are no errors
        $errors['errorlogin'] = "Email of Wachtwoord is onjuist";
    }
    
    // If there are no errors, insert data in database and redirect to index
    if(empty($errors)) {
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 1) {      
            $user = mysqli_fetch_assoc($result);
             // Check if password is correct redirect to index, else give error
            if (password_verify($password, $user['password'])) {
                $_SESSION['email'] = $email;
                header('location:index.php'); 
            } else {
                $errors['password'] = "";
                $errors['errorlogin'] = "Email of Wachtwoord is onjuist";
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


// Admin id = id of user that needs to be admin
$admin = 1;

// Select users from database if user is admin
if (isset($admin) == true) {
    $query = "SELECT * FROM users ORDER BY lastname_parent ASC";

    $result = mysqli_query($db, $query)
        or die('Error: '.mysqli_error($db). ' with query: '.$query);

    $users = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

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

        header("Location: users.php");
        exit;
    } else if (isset($user['id']) || $user['id'] != '') {
        $userId = mysqli_escape_string($db, $user['id']);

        $query = "SELECT * FROM users WHERE id = '$userId'";
        $result = mysqli_query($db, $query) or die ('Error: ' . $query);

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
        } else {
            // Redirect when db returns no result
            header('location: index.php');
            exit;
        }
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
        // Check for unique email
        $email_unique = "SELECT email FROM users WHERE email='$email'";
        $email_unique_check = mysqli_query($db, $email_unique);

        if($email == "") {                                                      // Check if empty
            $errors['email'] = "Email kan niet leeg zijn";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {                // Check if email is valid
            $errors['email'] = "Voer geldig Email in";
        } else if (mysqli_num_rows($email_unique_check) > 0) {                  // Check if email is unique
            $errors['email'] = "Email word al gebruikt";
        }
        if(empty($errors)){
        $edit = mysqli_query($db,"UPDATE users SET email='$email' WHERE id='$userId'");
        $result = mysqli_query($db, $query) or die('Database Error: '.mysqli_error($db).' with query: '.$query);
            if($result) {
                header("location: account.php");
                exit;
            }
        } 	
    }
    // Edit Password
    if (isset($_POST['edit_password'])) {
        $result = mysqli_query($db, "SELECT * FROM users WHERE email='" . $_SESSION["email"] . "'");
        $user = mysqli_fetch_assoc($result);
        $password_new = $_POST['password_new'];
        $password_check = $_POST['password_check'];
        // Error codes for when input fields are empty or incorrect        
       if($_POST['password_current'] == "") {                                       // Check if empty
            $errors['password'] = "Voer huidig wachtwoord in";
            $errors['password_current'] = "";   
        } else if (password_verify($_POST["password_current"], $user['password']) != $user["password"]) {
            $errors['password'] = "Wachtwoord komt niet overeen met huidig wachtwoord";
            $errors['password_current'] = "";
        }
        if (password_verify($_POST["password_current"], $user['password']) == $user["password"]) {
            if ($password_new == "") {                                              // Check if empty
                $errors['password'] = "Wachtwoord kan niet leeg zijn";
                $errors['password_new'] = "";
            } else if ($_POST['password_current'] == $password_new) {               // Check if new password is not the same as old password
                $errors['password'] = "Wachtwoord kan niet hetzelfde zijn als huidige wachtwoord";
                $errors['password_new'] = "";
            } else { 
                if ($_POST['password_new'] != $_POST['password_check']) {           // Check if input is the same
                    $errors['password'] = "Wachtwoorden komen niet overeen";
                    $errors['password_new'] = "";
                    $errors['password_check'] = "";
                } else {
                    mysqli_query($db, "UPDATE users SET password='". password_hash($_POST["password_new"], PASSWORD_DEFAULT)."' WHERE email='" . $_SESSION["email"] . "'");
                    header("location: account.php");
                    exit;
                }
            } 
        }
    }
    // Edit Phonenumber
    if(isset($_POST['edit_phonenumber'])) {
        $phonenumber = mysqli_escape_string($db, $_POST['phonenumber']);
        // Error codes for when input fields are empty or incorrect
        if($phonenumber == "") {                                                    // Check if empty
            $errors['phonenumber'] = "Telefoonnummer kan niet leeg zijn";
        } else if (!preg_match("/^[0-9]+$/", $phonenumber)) {                       // Check if input has numbers
            $errors['phonenumber'] = "Telefoonummer moet geldig zijn";
        }
        if(empty($errors)) {
        $edit = mysqli_query($db,"UPDATE users SET phonenumber='$phonenumber' WHERE id='$userId'");
        $result = mysqli_query($db, $query) or die('Database Error: '.mysqli_error($db).' with query: '.$query);
            if($result) {
                header("location: account.php");
                exit;
            }
        } 
    }
    // Edit Firstname Parent
    if(isset($_POST['edit_firstname_parent'])) {
        $firstname_parent = mysqli_escape_string($db, $_POST['firstname_parent']);  
        // Error codes for when input fields are empty or incorrect
        if($firstname_parent == "") {                                               // Check if empty
            $errors['firstname_parent'] = "Voornaam kan niet leeg zijn";
        } else if (!preg_match("/^[a-zA-Z]+$/", $firstname_parent)) {               // Check if input has alphabetic letters
            $errors['firstname_parent'] = "Voer geldige voornaam in";
        }    
        if(empty($errors)) {  
            $edit = mysqli_query($db,"UPDATE users SET firstname_parent='$firstname_parent' WHERE id='$userId'");
            $result = mysqli_query($db, $query) or die('Database Error: '.mysqli_error($db).' with query: '.$query);
            if($result) {
                header("location: account.php");
                exit;
            } 
        }  	
    }
    // Edit Lastname Parent
    if(isset($_POST['edit_lastname_parent'])) {
        $lastname_parent = mysqli_escape_string($db, $_POST['lastname_parent']);
        // Error codes for when input fields are empty or incorrect
        if($lastname_parent == "") {                                               // Check if empty
            $errors['lastname_parent'] = "Achternaam kan niet leeg zijn";
        } else if (!preg_match("/^[a-zA-Z]+$/", $lastname_parent)) {               // Check if input has alphabetic letters
            $errors['lastname_parent'] = "Voer geldige achternaam in";
        }
        if(empty($errors)) {
            $edit = mysqli_query($db,"UPDATE users SET lastname_parent='$lastname_parent' WHERE id='$userId'");
            $result = mysqli_query($db, $query) or die('Database Error: '.mysqli_error($db).' with query: '.$query);
            if($result) {
                header("location: account.php");
                exit;
            }
        }
    }
    // Edit Firstname Child
    if(isset($_POST['edit_firstname_child'])) {
        $firstname_child = mysqli_escape_string($db, $_POST['firstname_child']);
        // Error codes for when input fields are empty or incorrect
        if($firstname_child == "") {                                               // Check if empty
            $errors['firstname_child'] = "Voornaam kan niet leeg zijn";
        } else if (!preg_match("/^[a-zA-Z]+$/", $firstname_child)) {                // Check if input has alphabetic letters
            $errors['firstname_child'] = "Voer geldige voornaam in";
        }
        if(empty($errors)) {
            $edit = mysqli_query($db,"UPDATE users SET firstname_child='$firstname_child' WHERE id='$userId'");
            $result = mysqli_query($db, $query) or die('Database Error: '.mysqli_error($db).' with query: '.$query);
            if($result) {
                header("location: account.php");
                exit;
            }
        } 	
    }
    // Edit Age Day Child
    // if(isset($_POST['edit_age_child'])) {
    //     $age_day_child = mysqli_escape_string($db, $_POST['age_day_child']);
    //     $age_month_child = mysqli_escape_string($db, $_POST['age_month_child']);
    //     $age_year_child = mysqli_escape_string($db, $_POST['age_year_child']);
    //     // Error codes for when input fields are empty or incorrect

    //     if(empty($errors)) {
    //         $edit = mysqli_query($db,"UPDATE users SET age_day_child='$age_day_child' WHERE id='$userId'");
    //         $result = mysqli_query($db, $query) or die('Database Error: '.mysqli_error($db).' with query: '.$query);
    //         if($result) {
    //             header("location: account.php");
    //             exit;
    //         }   
    //     }	
    // }
}

//Reservation
if(isset($_POST['plan_date'])) {
    $user_id = $_POST['user_id'];
    $date = $_POST['date'];

    $errors = [];
    if($user_id == "") {
        $errors['user_id'] = "Niet Ingelogd";
    }
    if($date == "") {
        $errors['date'] = "Voer datum in om een afspraak te maken";
    }

    if(empty($errors)) {
        $query = "INSERT INTO reservations (user_id, date)
                    VALUES ('$user_id', '$date')";

        $result = mysqli_query($db, $query)
        or die('Database Error: '.mysqli_error($db).' with query: '.$query);

        if($result) {
            header("location:inplannen.php");
            exit;
        }
    }
}

$query = "SELECT * FROM reservations";
$result = mysqli_query($db, $query) or die ('Error: ' . $query );

//Loop through the result to create a custom array
$reservations = [];
while ($row = mysqli_fetch_assoc($result)) {
    $reservations[] = $row;
}


if(isset($_SESSION['email'])) {
    $query = "SELECT * FROM reservations WHERE user_id = '".$user['id']."'";
    $result = mysqli_query($db, $query) or die ('Error: ' . $query);

    $reservation = mysqli_fetch_assoc($result);

}


// $reservationId = mysqli_escape_string($db, $_POST['id']);

// $query = "SELECT * FROM reservations WHERE id = '$reservationId'";
// $result = mysqli_query($db, $query) or die ('Error: ' . $query);

// $reservation = mysqli_fetch_assoc($result);



if(isset($_POST['edit_date'])) {
    $date = $_POST['date'];
    // Error codes for when input fields are empty or incorrect
    if($date == "") {                                               // Check if empty
        $errors['date'] = "Datum kan niet leeg zijn";
    }

    if(empty($errors)) {
        $edit = mysqli_query($db,"UPDATE reservations SET date='$date'");
        $result = mysqli_query($db, $query) or die('Database Error: '.mysqli_error($db).' with query: '.$query);
        if($result) {
            header("location: inplannen.php");
            exit;
        }
    } 
}

//Close connection
mysqli_close($db);