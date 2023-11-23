
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