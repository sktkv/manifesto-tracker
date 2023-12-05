<?php
define('__ROOT__', dirname(dirname(__FILE__)));
// next line: merges two files to avoid redundancy.
// db.php connects to the database - so the same thing can be added to different pages
require_once('promise-db.php');
?>



<!doctype html>
<html lang="en">
    <head>
        <title> Edit </title>
        <link rel="stylesheet" href="stylesheet.css?v=<?php echo time(); ?>">
        <style> 
            @import url(http://fonts.googleapis.com/earlyaccess/notosanskannada.css);

            a {
            text-decoration: none;
            color:inherit;
            background-color: transparent;
            }

        </style>
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
                <a href = "index.php" style = "font-family: 'Verdana'; font-size: 17px">
                    table
                </a> 
            </div> 

        </div>

        <!-- PHP Code AREA-->
            <?php 

            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                if (
                        isset($_POST['sno'])
                    && isset($_POST['promise'])
                    && isset($_POST['status'])
                    && isset($_POST['details'])
                    && isset($_POST['date'])
                    && isset($_POST['category']) 
                )

                {
                    $sno  = $_POST['sno'];
                    $category     = $_POST['category'];
                    $promise      = $_POST['promise'];
                    $status    = $_POST['status'];
                    $details   = $_POST['details'];
                    $date  = $_POST['date'];
                    
                    
                    $sql =  " UPDATE promises SET ". 
                            " category = '".$category."',".
                            " promise  = '".$promise."',".
                            " status     = '".$status."',".
                            " details    = '".$details."',".
                            " date  = '".$date."'".
                            " WHERE sno = '".$sno."'";

                    
                            
                            
                    if (mysqli_query($conn, $sql)) 
                    {
                        echo "<p style = 'text-align:center'> Record updated successfully. </p>";
                    } 
                    else 
                    {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                            
                    //mysqli_close($conn);
                }
                else
                {
                    echo "Please fill the complete form";  
                }
            }
            ?>


            <?php 
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

      
            <h3 style = "text-align: center"> Edit Promise</h3>

            <div class= "adminform">

                <form id = "addform" method="post" action="<?php echo (isset($_GET['id']))? './editpromise.php?id='.$_GET["id"] : "./editpromise.php"; ?>" >
                    
                    <label for="sno">Serial No.</label>
                    <input type="number" name="sno" value = "<?php echo (isset($editpromise["sno"]))? $editpromise["sno"] : ""; ?>" readonly />
                    <br>
                    <br>

                    <label for="category">Category</label>
                    <input type="text" name="category" placeholder="Category" value = "<?php echo (isset($editpromise["category"]))? $editpromise["category"] : ""; ?>">
                    <br>

                    <label for="promise">Promise</label>
                    <br>

                    <input type="text" name="promise" placeholder="Promise" value = "<?php echo (isset($editpromise["promise"]))? $editpromise["promise"] : ""; ?>">
                    <br>

                    <label for="status">Status</label>
                    <select name="status" id="status">
                            <option value = "<?php echo (isset($editpromise["status"]))? $editpromise["status"] : "Choose...."; ?>" "<?php echo (isset($editpromise["status"]))? 'selected="selected"' : ''; ?>" > <?php echo (isset($editpromise["status"]))? $editpromise["status"] : "Choose...."; ?></option>
                            <option value="Fulfilled">Fulfilled</option>
                            <option value="In progress">In progress</option>
                            <option value="Yet to start"> Yet to start</option>
                            <option value="Stalled"> Stalled </option>
                            <option value="Broken"> Broken</option>
                    </select>
                    
                    <label for="details">Details</label>
                    <br>
                    <!-- <input type="text" name="details" placeholder="details" value = "<?php echo (isset($editpromise["details"]))? $editpromise["details"] : ""; ?>"> -->
                    <textarea id="details" name="details" placeholder="Add details"  rows="10" cols="50"> <?php echo (isset($editpromise["details"]))? $editpromise["details"] : ""; ?>"> </textarea>

                    <label for="date">Date</label>
                    <input type="date" name="date" value = "<?php echo (isset($editpromise["date"]))? $editpromise["date"] : ""; ?>">

                    <input type="submit" name="submit">
                    </p>

                </form>
            </div>
        

    <div class = footer>
            <a href = "index.php"> back to edit page </a> 
    </div>


    </body>
</html>

