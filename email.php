<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  if (empty($_POST["email"])) {
    $emailErr = "Duh You need an Email";

// exit the script back home
    header("Location: fuck.com");
	exit;
  } else {

    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
      header("Location: http://google.com");
	exit;
    }
  
	//send email with users email address
	$output = shell_exec('./emQRLminingList.sh $email');
  }


}


	header("Location: index.html");
	exit;
?>