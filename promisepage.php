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
        $color = $row['status'] == "Yet to start" ? "#fad5aeff" : ($row['status']=="In progress" ? "#fff2cc" : ($row['status']=="Stalled" ? "#ccccccff" : ($row['status']=="Broken" ? "#e6b8af" : "#d9ead3")));
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
    <head> 
      <title> Details </title> 
      <link rel="stylesheet" href="stylesheet.css?v=<?php echo time(); ?>">

        <style> 
            @import url(http://fonts.googleapis.com/earlyaccess/notosanskannada.css);

            a {
            text-decoration: none;
            color:inherit;
            background-color: transparent;
            }

        </style>

        <script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>
    </head> 

<body> 
          <div class = "header">
            <div class = "leftside">
                <a href = "index-proper.php">
                    <span style="font-family: 'Noto Sans Kannada'; font-size: 20px"> ಭರವಸೆ</span>
                    <span style="font-family: 'Verdana'; font-size: 17px">bharavase</span>
                </a>
            </div>
            <div class = "rightside">
                <a href = "#" style = "font-family: 'Verdana'; font-size: 17px">
                    about
                </a> 
            </div> 

        </div>

    

      <div id = "promise-category">
      <?php echo (isset($editpromise["category"]))? $editpromise["category"] : ""; ?>
      </div>

      <div id = "promise-name">
      <?php echo "<p id = 'promise-title' style='background-color: ".$color."'>" . (isset($editpromise["promise"]) ? $editpromise["promise"] : "") . "</h2>"; ?>
      </div>
    
    <div id = "promise-facts"> 

      <div id = "promise-status">
      <p> Status: <span class = "promise-echo"> <?php echo (isset($editpromise["status"]))? $editpromise["status"] : ""; ?> </span></p>
      </div>

      <div id = "date-update">
      <p> Last update: <span class = "promise-echo"> <?php echo (isset($editpromise["date"]))? $editpromise["date"] : ""; ?> </span> </p>
      </div>

      <div id = "details">
      <p> Details: <br><br> 
      <span class = "promise-echo">
        <?php echo (isset($editpromise["details"]))? $editpromise["details"] : ""; ?> 
      </span>
      </p>
      </div>
    
    </div>
    <hr>

    <div id = "commenttext">

    <p style = "font-size:20px"> Leave a Comment </p>


        <?php
        echo 
        "<form method = 'POST' action = '".setComments($conn)."'>
            <input type = 'hidden' name = 'date' value = ' ".date('Y-m-d H:i:s')." '> 
            <input type = 'hidden' name = 'parentsno' value = ' ".$_GET['id']." '> 
          
            

            <textarea name = 'message'></textarea><bt>
             
            <br>

            <label for = 'username'> Username </label> 
            <input type = 'text' name = 'uid'> <button type = 'submit' name = 'commentSubmit'> Comment </button>
            <br>


        </form>";

        getComments($conn)

        ?>

    </div>
    
    <div class = footer>
        <a href = "login-page.php"> admin login </a> 
    </div>
</body>
</html>

