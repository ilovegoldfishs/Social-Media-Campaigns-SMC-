<?php
include('DBConnect.php');
$tID = $_GET['ctid'];

$deletequery = "DELETE FROM campaigntypetble where CamTypeID='$tID'";
$deleteResult = mysqli_query($dbconnect, $deletequery);
if ($deleteResult) {
    echo "<script>window.alert('Delete CampaignsType Successfully');</script>";
    echo "<script>window.location='CampaignsType.php';</script>";
} else {
    echo "<script>window.alert('Delete CampaignsType Fail');</script>";
    echo "<script>window.location='CampaignsType.php'';</script>";
}
