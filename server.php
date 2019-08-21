<?php session_start();

//initialising variable
$username = "";
$eamil = "";
$phone ="";
$errors = array();
//connect to db

$db= mysqli_connect('localhost','root','','traveltech') or die ("could not connected");
// registering username
$username = mysqli_real_escape_string($db,$_POST['username']);
$email = mysqli_real_escape_string($db,$_POST['email']);
$mobile = mysqli_real_escape_string($db,$_POST['mobile']);
$password = mysqli_real_escape_string($db,$_POST['password']);
//form validation
if (empty($username)) {array_push($error,"username is required");
}

if (empty($email)) {array_push($error,"email is required");
}

if (empty($mobile)) {array_push($error,"mobile is required");
}
if (empty($password)) {array_push($error,"password is required");
}

// validation already exist user check debug
$user_check_query = "SELECT * FROM user WHERE email ='$email' or mobile ='$mobile'  LIMIT 1";
$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);
if ($user) {
  if (($user['eamil'] === $email)) {
  array_push($errors, "eamil already registered");
  if (($user['mobile'] === $mobile)) {
  array_push($errors, "mobile number already registered");
  }
}
//register user if no error
 if (count($errors) == 0) {
 $password = md5($password);//this wil encrypt password
 $query = "INSERT INTO user (username,email,mobile,password) VALUES ('$username','$email','$mobile','$password')";
 mysqli_query($db,$query);
$_SESSION['username'] = $username;
 $_SESSION['sucess'] = "you are loged in ";
 header("location : index.php");
 }
}
//login user
 ?>
