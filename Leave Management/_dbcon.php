<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'Leave';

    try {
        $conn = mysqli_connect($servername,$username,$password,$database);
    } catch (Exception $e) {
        $conn = false;
    }

    // mysqli_error($conn);
    // mysqli_query($conn, $sql);
    // mysqli_num_rows($result);
    // $row = mysqli_fetch_assoc($result);
?>
