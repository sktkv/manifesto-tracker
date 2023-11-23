<?php
define('__ROOT__', dirname(dirname(__FILE__)));
// next line: merges two files to avoid redundancy.
// db.php connects to the database - so the same thing can be added to different pages
require_once('promise-db.php');
?>

<?php
date_default_timezone_set('Asia/Kolkata');
include 'comments.php';


?>

<!doctype html>
<html>
    <head> <title> Details </title> </head> 
<body> 
    <div id = "details">
    <h1> Add details here </h1>
    </div>

    <div id = "comments">
        <?php
        echo 
        "<form method = 'POST' action = '".setComments($conn)."'>
            <input type = 'hidden' name = 'date' value = ' ".date('Y-m-d H:i:s')." '> 
            <input type = 'hidden' name = 'parentsno' value = ' ".$_GET['id']." '> 
            
            <label for = 'username'> Username </label> 
            <input type = 'text' name = 'uid'>
            <br>

            <textarea name = 'message'></textarea><bt>
            <button type = 'submit' name = 'commentSubmit'> Comment </button> 

        </form>";

        ?>

    </div>
</body>
</html>

