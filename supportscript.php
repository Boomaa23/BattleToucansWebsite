<?php
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['tt']) && isset($_POST['t_main'])) {
	$file = rand(0000,9999);
	$usr = "Username: ";
	$email = "Email Address: ";
	$ttype = "Ticket Type: ";
	$num = "Ticket Number: ";
    $data = $num . $file . "\n" . $usr . $_POST['name'] . "\n" . $email . $_POST['email'] . "\n" . $ttype . $_POST['tt'] . "\n" . "\n" . $_POST['t_main'] . "\n";
    
    // use double tics so that $file is inserted.
    // like this: "/messages/$file.txt"
    // alternatively, we could use: '/messages/' . $file . '.txt'
    // (for those who are married to single tics)
    $ret = file_put_contents("support_tickets/$file.txt", $data , FILE_APPEND | LOCK_EX);
    if($ret === false) {
        die('There was an error writing this file');
    }
    else {
        echo "Thank you for submitting your ticket! ($ret bytes written to file)";
    }
}
else {
   die('no post data to process');
}

?>