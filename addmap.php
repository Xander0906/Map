<?php
include 'config.php';

if (isset($_POST['addmap'])) {
    $stall_name = $_POST['stall_name'];
    $map_id = $_POST['map_id'];
    $vendor_id = $_POST['vendor_id'];
    $market_admin_id = $_POST['market_admin_id'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    $sql = "INSERT INTO stall(map_ID, market_admin_ID, vendor_ID, stall_name, latitude, longitude) VALUES('$map_id','$market_admin_id', '$vendor_id', '$stall_name', '$latitude','$longitude')";
    $insert = mysqli_query($conn, $sql);
    if ($insert) {
        header("location: index.php");
    } else {
        header("location: index.php?failed=Failed");
    }
}
