<?php
// Global Functions
function redirect($location){
header("Location:". $location);
exit;
}

function escape($string){
global $connection;
return mysqli_real_escape_string($connection,trim($string));
}

function confirmQuery($result){
global $connection;
if(!$result){
    die("Failed".mysqli_error($connection));
}
}

function ifMethodSet($method = null){
if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){

    return true;
}

return false;

}

// Login Functions
function login($username, $password){
    global $connection;

    $stmt = mysqli_prepare($connection, "SELECT username, firstname, lastname, password, user_role FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $db_username, $db_user_firstname, $db_user_lastname, $db_user_password, $db_user_role);
    mysqli_stmt_fetch($stmt);
    confirmQuery($stmt);
    mysqli_stmt_close($stmt);

        if(password_verify($password, $db_user_password)){
            $_SESSION['username'] = $db_username;
            $_SESSION['firstname'] = $db_user_firstname;
            $_SESSION['lastname'] = $db_user_lastname;
            $_SESSION['user_role'] = $db_user_role;

            redirect("/Activity/admin");
        }else{
            redirect("login");
        }
}

function ifLoggedInRedirect(){
    if(isLoggedIn()){
        redirect("/Activity/admin");
    }
}

function isLoggedIn(){
    if(isset($_SESSION['user_role'])){
        return true;
    }else{
        return false;
    }
}

function isAdmin(){
    if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'Admin'){
        return true;
    }else{
        return false;
    }
}

function isAdvertiser(){
    if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'Advertiser'){
        return true;
    }else{
        return false;
    }
}

function isVerified(){
    global $connection;
    $query = "SELECT verify FROM users WHERE username = '{$_SESSION['username']}'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    if($row['verify'] !== 'Yes'){
        redirect("/Activity/verify");
    }
}

function register_user($firstname, $lastname, $username, $email, $password, $user_role, $company_name, $token, $verify){
    global $connection;
     $hashed_password = password_hash($password, PASSWORD_DEFAULT, array('cost' => 12)); // Hash Password

        $stmt = mysqli_prepare($connection, "INSERT INTO users (firstname, lastname, username, email, password, user_role, company_name, token, verify) VALUES (?,?,?,?,?,?,?,?,?)");
        mysqli_stmt_bind_param($stmt, "sssssssss", $firstname, $lastname, $username, $email, $hashed_password, $user_role, $company_name, $token, $verify);
        mysqli_stmt_execute($stmt);
        confirmQuery($stmt);
        mysqli_stmt_close($stmt);
}

function username_exist($username){
    global $connection;
    $stmt = mysqli_prepare($connection, "SELECT username FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $username_result);
    mysqli_stmt_store_result($stmt);


    if(mysqli_stmt_num_rows($stmt)>0){
        return true;
    }else{
        return false;
    }
    mysqli_stmt_close($stmt);
}

function email_exist($email){
    global $connection;
    $stmt = mysqli_prepare($connection, "SELECT email FROM users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $email_result);
    mysqli_stmt_store_result($stmt);

    if(mysqli_stmt_num_rows($stmt)>0){
        return true;
    }else{
        return false;
    }
    mysqli_stmt_close($stmt);
}

function confirmPassword($password, $confirm_password)
{
if ($password === $confirm_password) {
  return true;
} else {
  return false;
}
}

function validateRegister($firstname, $lastname, $username, $email, $password, $confirm_password, $user_role, $company_name, $token, $verify){
    global $connection;
    echo $firstname;

    $error = [] ;

            // Validate Username
    if(strlen($username)<6){
        $error['username'] = "Username is to short";     // If Username to short (less than 6 charachter)
    }
    if(empty($username)){
        $error['username'] = "Username cannot be empty"; // If Username empty
    }if(username_exist($username)){
        $error['username'] = "Username exists already, choose another one";  // If Username exist already
    }
        // Validate Email
    if(empty($email)){
        $error['email'] = "Email cannot be empty";       // If Email is empty
    }if(email_exist($email)){
        $error['email'] = "Email exist already"; // If Email exists already
    }
        // Validate ¨Password
    if(empty($password)){
        $error['password'] = "Password cannot be empty"; // If Password is empty
    }
    if(strlen($password) < 6){
        $error['password'] = "Password should be longer then 6 Chatachters"; // If Password is to short
    }
    if (!confirmPassword($password, $confirm_password)) {
      $error['password'] = "The two Passwords are not identical";
    }
        // If Validation OK Register User
    if(empty($error)){
       register_user($firstname, $lastname, $username, $email, $password, $user_role, $company_name, $token, $verify);
    }else{
        return $error;
    }
}
// Dashboard functions
function countChart($select){
    global $connection;

    $query = "SELECT * FROM ".$select;
    $result = mysqli_query($connection,$query);
    return mysqli_num_rows($result);
}

function countChartWhere($from, $where){
    global $connection;

    $query = "SELECT * FROM ".$from." WHERE ".$where ;
    $result = mysqli_query($connection,$query);
    confirmQuery($result);
    return mysqli_num_rows($result);

}


function onlineUsers(){
    global $connection;
    if(!$connection){
    session_start();
    include("../../include/db.php");
    }
            $session = session_id();
            $time = time();
            $time_out = $time-05;


            $result = mysqli_query($connection, "SELECT * FROM online_users WHERE session = '{$session}'");
            confirmQuery($result);
            $session_count = mysqli_num_rows($result);
            if($session_count == NULL){
                $query = "INSERT INTO online_users(session, time) VALUES('$session','$time')";
                $result = mysqli_query($connection, $query);
                confirmQuery($result);
            }else{
                $result = mysqli_query($connection, "UPDATE online_users SET time = $time WHERE session = '{$session}'");
                confirmQuery($result);
            }

            $result = mysqli_query($connection, "SELECT * FROM online_users WHERE time >$time_out");
            confirmQuery($result);
            echo mysqli_num_rows($result);
}
if(isset($_GET['onlineusers'])){
onlineUsers();
}

 ?>
