
<?php

function setComments($conn) {
    if(isset($_POST['commentSubmit'])){
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $parentsno = $_POST['parentsno'];
        $message = $_POST['message'];

        $sql = "INSERT INTO comments (uid, date, parentsno, message) VALUES ('$uid', '$date', '$parentsno', '$message') ";
        $result = $conn -> query($sql);


    }


}

function getComments($conn){
    $sql = "SELECT * FROM comments where parentsno = ".$_GET['id']. " ORDER BY date DESC";
    $result = $conn -> query($sql);
    while ($row = $result -> fetch_assoc()){
        echo "<div class = 'comment-box'>";
            echo $row['uid']."<br>";
            echo $row['date']."<br>";
            echo $row['message'];
            
        echo "</div>";
    }

    }
    


