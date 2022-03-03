<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "py_PHP";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_REQUEST["add"])) {

        $loanID = $_REQUEST["loanID"];
        $sql = "INSERT INTO getstatus(loanID, run_sta, link_sta, act_sta, change_sta) VALUES('".$loanID."', 'Queued', 'empty', 'empty', 0)";
        $result = mysqli_query($conn, $sql);
    }

    if (isset($_REQUEST["updateData"])) {

        $colId = $_REQUEST["updateID"];
        $updateStatus = $_REQUEST["updateStatus"];
        
        $sql = "UPDATE getstatus SET run_sta = '".$updateStatus."' WHERE id = '".$colId."'";
        $result = mysqli_query($conn, $sql);
    }

    if (isset($_REQUEST["getdata"])) {
        $loadnID;
        $run_Status;
        $link_Status;
        $act_Status;

        $sql = "SELECT * FROM getstatus WHERE run_sta <> 'Delete'";
        $result = mysqli_query($conn, $sql);
        
        while ( $row = mysqli_fetch_array($result)) {

            $colID = $row["id"];
            $loadnID = $row["loanID"];
            $run_Status = $row["run_sta"];
            $link_Status = $row["link_sta"];
            $act_Status = $row["act_sta"];
            $temp[] = array('colID' => $colID, 'loanID' => $loadnID, 'run_sta' => $run_Status, 'link_sta' => $link_Status, 'act_sta' => $act_Status);
        }
        echo json_encode($temp);
    }

    
?>