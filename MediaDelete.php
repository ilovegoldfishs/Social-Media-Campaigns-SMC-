<?php
include('DBConnect.php');
$mID = $_GET['mid'];

$deletequery = "DELETE FROM socialmediatable where MediaID='$mID'";
$deleteResult = mysqli_query($dbconnect, $deletequery);
if ($deleteResult) {
    echo "<script>window.alert('Delete Media Successfully');</script>";
    echo "<script>window.location='Media.php';</script>";
} else {
    echo "<script>window.alert('Delete Media Fail');</script>";
    echo "<script>window.location='Media.php'';</script>";
}
