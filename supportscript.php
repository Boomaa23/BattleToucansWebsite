<?php
function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['tt']) && isset($_POST['t_main'])) {
	//$file = rand(0000,9999); 
	$file = generateRandomString();
	$usr = "Username: ";
	$email = "Email Address: ";
	$ttype = "Ticket Type: ";
	$num = "Ticket Number: ";
	$usrn = $_POST['name'];
	
    $data = $num . $file . "\n" . $usr . $_POST['name'] . "\n" . $email . $_POST['email'] . "\n" . $ttype . $_POST['tt'] . "\n" . "\n" . $_POST['t_main'] . "\n";

    $ret = file_put_contents("support_tickets/$file.txt", $data , FILE_APPEND | LOCK_EX);
    if($ret === false) {
        die('There was an error writing this file');
    }
    else {
		$fmsg = "Thank you for submitting your ticket, $usrn! ($ret bytes written to file)" . PHP_EOL . "Your ticket number is $file. Redirecting in 10 seconds...";
		$fmsg = nl2br($fmsg);
        echo $fmsg;
    }
}
else {
   die('no post data to process');
}
header( "refresh:10;url=index.html" );
?>