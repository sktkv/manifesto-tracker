<?php

function trial($conn){
    $sql = "SELECT status, COUNT(*) AS occurrences
    FROM promises
    WHERE status = 'In Progress'";
    // /$sql = "SELECT status, COUNT(*) AS occurrences
    //  FROM promises
    // // WHERE status = 'Yet to Start'
    // // GROUP BY status";

    $result = $conn -> query($sql);
    // $totalRows = $mysqli_num_rows($result);
    // return $result;
    $totalcount = mysqli_num_rows($result);
    return $totalcount;
   

}

function getUP($conn){

    // $var = "happy";
    // return $var;

    $sql = "SELECT COUNT(*) FROM promises WHERE status = 'In Progress' ";
    // $result = $conn -> query($sql);
    $result = $conn -> query($sql);
    $row = mysqli_fetch_array($result);
    echo $row['COUNT(*)'];

    // return $row;

    // if ($result->num_rows() > 0)
    //     {
    //     $row = $result->row_array(); 
    //     echo $row['COUNT(*)'];
    //     }


}

function getF($conn){

    $sql = "SELECT COUNT(*) FROM promises WHERE status = 'Fulfilled' ";
    // $result = $conn -> query($sql);
    $result = $conn -> query($sql);
    $row = mysqli_fetch_array($result);
    echo $row['COUNT(*)'];


}

function getYtS($conn){

    $sql = "SELECT COUNT(*) FROM promises WHERE status = 'Yet to Start' ";
    // $result = $conn -> query($sql);
    $result = $conn -> query($sql);
    $row = mysqli_fetch_array($result);
    echo $row['COUNT(*)'];

}

function getStalled($conn){

    $sql = "SELECT COUNT(*) FROM promises WHERE status = 'Stalled' ";
    // $result = $conn -> query($sql);
    $result = $conn -> query($sql);
    $row = mysqli_fetch_array($result);
    echo $row['COUNT(*)'];


}

function getBroken($conn){

    $sql = "SELECT COUNT(*) FROM promises WHERE status = 'Broken' ";
    // $result = $conn -> query($sql);
    $result = $conn -> query($sql);
    $row = mysqli_fetch_array($result);
    echo $row['COUNT(*)'];


}

?>