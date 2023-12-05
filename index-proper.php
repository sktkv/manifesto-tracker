<?php
define('__ROOT__', dirname(dirname(__FILE__)));
// next line: merges two files to avoid redundancy.
// db.php connects to the database - so the same thing can be added to different pages
require_once('promise-db.php');
?>

<?php
include 'pivot.php';
?>

<?php 
//loading database for google charts 
$query = "SELECT status, count(*) as number FROM promises GROUP BY status";
$pieresult = mysqli_query($conn, $query);
?>

<html>
<meta charset=utf-8>
    <head> 
        
        <title> bharavase </title>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Status', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($pieresult))  
                          {  
                               echo "['".$row["status"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                     var options = {    
                      //is3D:true,  
                      //pieHole: 0.4, 
                    colors: ['#e6b8af', '#d9ead3', '#ffeaab', '#cccccc','#fad2a7'],
                    pieSliceTextStyle: {color: 'black'},
                    legend: {position: 'none'},
                    backgroundColor: {fill: 'transparent'},
                    chartArea:{left:0,top:0,width:"100%",height:"100%"}



                    }; 
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  

        


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
                <a href = "#" style = "font-family: 'Verdana'; font-size: 17px">
                    about
                </a> 
            </div> 

        </div>

        <div class = "summary">
            <div class = "datasummary">
                <div class = "daycounter">
                    <p style = "text-align:center"> INC has been in office for <b><span id="show"></span></b> days.</p>
                    <script  type="text/javascript">
                    var initialDate = new Date(2023, 5, 20); // Dec 1st 2012
                    var now = Date.now();
                    var difference = now - initialDate;
                    var millisecondsPerDay = 24 * 60 * 60 * 1000;
                    var daysSince = Math.floor(difference / millisecondsPerDay);

                    document.getElementById('show').innerHTML = daysSince.toString();
                    </script>
                </div>

                <div class = "data">
                    <div class = "datatable"> 
                    <table class = "pivottable">
                        <tr style = "background-color: #d9ead3">
                            <th scope="col">Fulfilled</th>
                            <td> <?= getF($conn) ?> </td> 
                        </tr>

                        <tr style = "background-color: #fff2cc"> 
                            <th scope="col">In Progress</th>
                            <td> <?= getUP($conn) ?> </td> 
                        </tr>
                        
                        <tr style = "background-color: #fad5aeff"> 
                            <th scope="col">Yet to Start</th>
                            <td> <?= getYtS($conn) ?> </td>
                        </tr>

                        <tr style = "background-color: #e6b8af">                     
                            <th scope="col">Broken</th>
                            <td> <?= getBroken($conn) ?> </td> 

                        </tr>

                        <tr style = "background-color: #ccccccff"> 
                            <th scope="col">Stalled</th>
                            <td> <?= getStalled($conn) ?> </td> 
                        </tr>

                        
                        

                    </table>
                    </div> 

                    <div id = "piechart">                     

                    </div>
                </div>
            </div>

            <div class = "methods">
                <p style = "text-align:center; font-weight:bold" > <span style="font-family: 'Noto Sans Kannada'; font-size:18px"> ಭರವಸೆ </span> (bharavase) </p>
                <p style = "text-align:center; font-style:italic; font-size:14px"> kan. (noun): 1. firm belief; trust; reliance. 2. something wished for; a wish. </p>
                <br>
                <p class = "desc"> we voted them in because they promised us change, </p>
                <p class = "desc"> and now we hold them accountable. </p>
                <p class = "desc"> how many promises will they keep?</p>
                <br>
                <p class = "desc"> <a href = "https://data.opencity.in/dataset/karnataka-assembly-elections-2023-manifestos/resource/indian-national-congress-%28inc%29-manifesto" target="_blank"> promise source </a></p>

            </div> 
        </div>


        

        <div class = "promises">

        

        <table class = "promisetable">

        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Category</th>
            <th scope="col">Promise</th>
            <th scope="col">Status</th>
            <th scope="col">Date</th>
            <th scope="col">Details</th>
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

                            $color = $row['status'] == "Yet to start" ? "#fad5aeff

                            " : ($row['status']=="In progress" ? "#fff2cc" : ($row['status']=="Stalled" ? "#ccccccff" : ($row['status']=="Broken" ? "#e6b8af" : "#d9ead3
                            ")));
                        
                    // Table created in HTML. Dots concatenate
                            echo '
                            <tr style="background-color:'.$color.'">
                                <td style = "text-align:center">'.$row["sno"].'</td>
                                <td>'.$row["category"].'</td>
                                <td>'.$row["promise"].'</td>
                                <td>'.$row["status"].'</td>
                                <td>'.$row["date"].'</td>
                                <td><a href= "./promisepage.php?id='.$row['sno'].'">Details</a>
                                

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

        
        <div class = footer>
        <a href = "login-page.php"> admin login </a> 
        </div>
            

    </body>
</html>