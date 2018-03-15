<?php
// define variables and set to empty values
$emailErr = "";
$email = "";
$home=$_SERVER['HOME']
function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set the email var 
  if (isset($_POST['email'])) {
    $email = test_input($_POST['email']);
  }
// set var to pass email to script, You have to change the directory
$output = shell_exec('bash {$home}/.mail/emQRLminingList.sh {$email}');
// Fire the script
$output;
}
header("Location: /index.html");
exit;
?>