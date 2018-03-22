<?php
// define variables and set to empty values
$emailErr = "";
$email = "";
function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set the email var 
    if(!empty($_POST['email'])) {
    $email = test_input($_POST['email']);
    error_log("_POST is set to: ${email}", 0);
// set var to pass email to script, You have to change the directory
$output = shell_exec("bash /home/ubuntu/.mail/emQRLminingList.sh '".$email."'");
// Fire the script
$output;



}

echo "<div data-closable class='alert-box callout success'><i class='fa fi-check'></i> Success! '".$email."' has been added to the list. <button class='close-button' aria-label='Dismiss alert' type='button' data-close><span aria-hidden='true'>&CircleTimes;</span></button></div> ";
header("Location: /index.html");
exit;
}
?>