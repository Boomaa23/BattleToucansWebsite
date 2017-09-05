<?php
if(isset($_POST['field1']) && isset($_POST['field2'])) {
    $data = $_POST['field1'] . '-' . $_POST['field2'] . "\n";
    $file = rand(0000,9999);
    // use double tics so that $file is inserted.
    // like this: "/messages/$file.txt"
    // alternatively, we could use: '/messages/' . $file . '.txt'
    // (for those who are married to single tics)
    $ret = file_put_contents("/support_tickets/$file.txt", $data, FILE_APPEND | LOCK_EX);
    if($ret === false) {
        die('There was an error writing this file');
    }
    else {
        echo "$ret bytes written to file";
    }
}
else {
   die('no post data to process');
}

?>