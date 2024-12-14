<?php
include('DBConnect.php');
session_start();
if (!isset($_SESSION['ADMINID'])) {
    echo "<script>window.alert('Please Login Again')</script>";
    echo "<script>window.location='AdminLogin.php'</script>";
} else {
    if (isset($_POST['btnSave'])) {
        $cName = $_POST['txtcamtyname'];
        $cObj = $_POST['txtcamtyobj'];

        $insertcamtype = "INSERT INTO campaigntypetble
        (CamTypeName,CamTypeObj) values 
        ('$cName','$cObj')";
        $query = mysqli_query($dbconnect, $insertcamtype);


        if ($query) {
            //code
            echo "<script>window.alert('CampaignsType data stored Successfull')</script>";
            echo "<script>window.location='CampaignsType.php'</script>";
        } else {
            //code
            echo "<script>window.alert('CampaignsType data stored Fail')</script>";
            echo "<script>window.location='CampaignsTypeCreate.php'</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampaignsType Create</title>
    <link rel="stylesheet" href="Styles.css?v=<?php echo time(); ?>">
</head>

<body>
    <header class="media-header">
        <div class="media-container">
            <h1>Create New CampaignsType Profile</h1>
            <div class="breadcrumb">
                <a href="Dashboard.php">Dashboard</a> / <a href="CampaignsType.php">CampaignsType</a> / Create New
            </div>
        </div>
    </header>

    <main class="media-container">
        <form class="social-media-form" action="CampaignsTypeCreate.php" method="POST">
            <div class="form-group">
                <label>CampaignsType Name</label>
                <input type="text" name="txtcamtyname" class="form-control" placeholder="Enter Campaigns Type name" required>
            </div>

            <div class="form-group">
                <label>Campaign Objective</label>
                <textarea id="campaign-objective" name="txtcamtyobj" rows="3" required></textarea>
            </div>

            <div class="form-actions">
                <button type="reset" class="btn btn-secondary">Cancel</button>
                <button type="submit" class="btn" name="btnSave">Save</button>
            </div>
        </form>
    </main>
</body>

</html>