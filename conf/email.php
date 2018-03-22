<?php
// define variables and set to empty values
$emailErr = "";
$email = "";
$data = "";
$output = shell_exec('bash /home/ubuntu/.mail/emQRLminingList.sh {$data}');
function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

  $email = test_input($_POST['email']);
	// set var to pass email to script, You have to change the directory
	error_log("Sent to ${data}", 0);
	// Fire the script
	$output;
	header("Location: /index.html");
	exit;

?>