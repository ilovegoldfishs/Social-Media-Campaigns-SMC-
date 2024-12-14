<?php
include('DBConnect.php');
$tID = $_GET['tid'];

$deletequery = "DELETE FROM techniquetable where TechniqueID='$tID'";
$deleteResult = mysqli_query($dbconnect, $deletequery);
if ($deleteResult) {
    echo "<script>window.alert('Delete Technique Successfully');</script>";
    echo "<script>window.location='Technique.php';</script>";
} else {
    echo "<script>window.alert('Delete Technique Fail');</script>";
    echo "<script>window.location='Technique.php'';</script>";
}
