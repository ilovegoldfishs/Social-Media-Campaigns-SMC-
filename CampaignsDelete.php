<?php
include('DBConnect.php');
$cID = $_GET['cid'];

$deletequery = "DELETE FROM campaigntable where CampaignID='$cID'";
$deleteResult = mysqli_query($dbconnect, $deletequery);
if ($deleteResult) {
    echo "<script>window.alert('Delete Campaigns Successfully');</script>";
    echo "<script>window.location='Campaigns.php';</script>";
} else {
    echo "<script>window.alert('Delete Campaigns Fail');</script>";
    echo "<script>window.location='Campaigns.php'';</script>";
}
