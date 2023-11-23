<?php
define('__ROOT__', dirname(dirname(__FILE__)));
// next line: merges two files to avoid redundancy.
// db.php connects to the database - so the same thing can be added to different pages
require_once('promise-db.php');
?>

<?php
date_default_timezone_set('Asia/Kolkata');
include 'comments.php';

$editpromise = array();
    if (isset($_GET['id'])){	
		$sql = "
		SELECT 
			sno,
            category, 
			promise, 
			status, 
			details, 
			date 
		FROM 
			promises 
		WHERE sno = '".$_GET['id']."'";

		$result = $conn->query($sql);  
		 
		if ($result->num_rows > 0) 
		{
		  // output data of each row
		  while($row = $result->fetch_assoc()) 
		  {
			  $editpromise["sno"] = $row["sno"];
			  $editpromise["category"] = $row["category"];
			  $editpromise["promise"] = $row["promise"];
			  $editpromise["status"] = $row["status"];
			  $editpromise["details"] = $row["details"];
			  $editpromise["date"] = $row["date"];
		  }
		} 
		else 
		{
		  //echo "0 results";
		}

    //$conn->close();
	}
?>

<!doctype html>
<html>
    <head> <title> Details </title> </head> 
    <link rel="stylesheet" href="stylesheet.css">
<body> 

    <div id = "promise-category">
    <h3> <?php echo (isset($editpromise["category"]))? $editpromise["category"] : ""; ?></h3>
    </div>

    <div id = "promise-name">
    <h1> <?php echo (isset($editpromise["promise"]))? $editpromise["promise"] : ""; ?> </h1>
    </div>

    <div id = "promise-status">
    <h3> <?php echo (isset($editpromise["status"]))? $editpromise["status"] : ""; ?></h3>
    </div>

    <div id = "date-update">
    <h3> <?php echo (isset($editpromise["date"]))? $editpromise["date"] : ""; ?> </h3>
    </div>

    <div id = "details">
    <h4> <?php echo (isset($editpromise["details"]))? $editpromise["details"] : ""; ?> </h4>
    </div>

    <div id = "commenttext">
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
            <br>

        </form>";

        getComments($conn)

        ?>

    </div>
</body>
</html>

