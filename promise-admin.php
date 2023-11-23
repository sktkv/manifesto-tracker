<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/manifesto/promise-db.php');
?>

<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      // Checking if all fields have been filled. 
    // If all fields have been filled, data gets uploaded onto SQL
        if (isset($_POST['submit']) )

        {   $category = $_POST['category'];
            $promise = $_POST['promise'];
            $status = $_POST['status'];
            $details = $_POST['details'];
            $date = $_POST['date'];
            
        

        $sql = "INSERT INTO promises (category, promise, status, details, date) 
            VALUES (".
                "'".$category."',".
                "'".$promise."',".
                "'".$status."',".
                "'".$details."',".
                "'".$date."'".
                ")";
           

            if (mysqli_query($conn, $sql)) 
            { 
              // If query done, go back to tips-form.html
                echo "New record created successfully";
				header('Location: promise-admin.html');
            } 
            else 
            {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
                    
            mysqli_close($conn);
            // closes connection at the end once database communication is not required 
        }

    
    }

?>