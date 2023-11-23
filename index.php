<?php
define('__ROOT__', dirname(dirname(__FILE__)));
// next line: merges two files to avoid redundancy.
// db.php connects to the database - so the same thing can be added to different pages
require_once('promise-db.php');
?>

<html>
    <head> 
        <title> First Page </title>
    </head>

    <body>
        <div class = "header">
            <a href = "login-page.php"> Admin login </a> 
        </div>
        <div class = "data_viz"> 

        </div>

        <div class = "promises">

        <table class="table table-striped">

        <thead>
            <tr>
            <th scope="col">Serial Number</th>
            <th scope="col">Category</th>
            <th scope="col">Promise</th>
            <th scope="col">Status</th>
            <th scope="col">Date</th>
            </tr>
        </thead>

        <tbody>
         <!-- PHP Code AREA-->
         <?php 
                    // The following is a SQL query 
                    // 'SELECT' - whatever is there in your database, read it and give it back to me! 
                        $sql = "
                        SELECT 
                            sno, 
                            category, 
                            promise, 
                            status, 
                            date
                        FROM 
                            promises";

                        // $conn from db.php. connects this query to that database
                        $result = $conn->query($sql);  
                        
                        if ($result->num_rows > 0) 
                        {
                        // output data of each row
                        //'while' creates a loop
                        // what is fetch_assoc
                        while($row = $result->fetch_assoc()) 
                        {
                            $link = isset($row['sno'])? 
                            "./editpromise.php?id=".$row['sno'] 
                            : "";

                            $color = $row['status'] == "Yet to start" ? "grey" : ($row['status']=="Under progress" ? "yellow" : ($row['status']=="Stalled" ? "orange" : ($row['status']=="Broken" ? "red" : "green")));
                        
                    // Table created in HTML. Dots concatenate
                            echo '
                            <tr style="background-color:'.$color.'">
                                <td>'.$row["sno"].'</td>
                                <td>'.$row["category"].'</td>
                                <td>'.$row["promise"].'</td>
                                <td>'.$row["status"].'</td>
                                <td>'.$row["date"].'</td>
                                <td><a href= "./promisepage.php?id='.$row['sno'].'">Details</a>
                                <td><a class="btn btn-primary" href= '.$link.'role="button">View/Edit</a></td>

                            </tr> ';

                           
                        }
                        } 
                        else 
                        {
                        //echo "0 results";
                        }

                        $conn->close();
                    ?>
        </tbody>
        </table>
            
        </div>
    </body>
</html>