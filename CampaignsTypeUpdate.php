<?php
session_start();
include('DBConnect.php');

// Get CampaignsType ID from GET request
$Cid = $_GET['ctid'];
$selectCampaignsType = "SELECT * FROM campaigntypetble WHERE CamTypeID=?";
$stmt = $dbconnect->prepare($selectCampaignsType);
$stmt->bind_param("i", $Cid);
$stmt->execute();
$result = $stmt->get_result();
$Camaarr = $result->fetch_assoc();

$Showid = $Camaarr['CamTypeID'];
$Showname = $Camaarr['CamTypeName'];
$Showobj = $Camaarr['CamTypeObj'];

// For Campaigns Type UPDATE DATA
if (!isset($_SESSION['ADMINID'])) {
    echo "<script>window.alert('Please Login Again')</script>";
    echo "<script>window.location='AdminLogin.php'</script>";
    exit();
}

if (isset($_POST['btnupdate'])) {
    $camtypid = $_POST['txtcamtypid'];
    $camtypname = $_POST['txtcamtypname'];
    $camtypobj = $_POST['txtcamtyobj'];

    // Prepare and execute update statement
    $updateSQL = "UPDATE campaigntypetble SET CamTypeName=?, CamTypeObj=? WHERE CamTypeID=?";
    $stmt = $dbconnect->prepare($updateSQL);
    $stmt->bind_param("ssi", $camtypname, $camtypobj, $camtypid);

    if ($stmt->execute()) {
        echo "<script>window.alert('Update CampaignsType Success');</script>";
        echo "<script>window.location='CampaignsType.php';</script>";
    } else {
        echo "Error: " . $stmt->error;  // Error handling for debugging
        echo "<script>window.alert('Update CampaignsType Fail');</script>";
        echo "<script>window.location='CampaignsTypeUpdate.php';</script>";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Update</title>
    <link rel="stylesheet" href="Styles.css?v=<?php echo time(); ?>">
</head>

<body>
    <header class="media-header">
        <div class="media-container">
            <h1>Update Social Media Profile</h1>
            <div class="breadcrumb">
                <a href="Dashboard.php">Dashboard</a> / <a href="Media.php">Social Media</a> / Create New
            </div>
        </div>
    </header>

    <main class="media-container">
        <form class="social-media-form" action="CampaignsTypeUpdate.php?cid=<?php echo $Cid; ?>" method="POST">
            <!-- Form for changing the CampaignsType name -->
            <div class="form-group">
                <label for="media-name">CampaignsType Name</label>
                <input type="text" name="txtcamtypname" class="form-control" value="<?php echo htmlspecialchars($Showname); ?>">
            </div>
            <!-- Form for changing the CampaignsType Objective -->
            <div class="form-group">
                <label for="media-link">CampaignsType Objective</label>

                <textarea id="campaign-objective" name="txtcamtyobj" rows="3"><?php echo htmlspecialchars($Showobj); ?></textarea>
            </div>
            <input type="hidden" name="txtcamtypid" value="<?php echo $Showid; ?>">

            <div class="form-actions">
                <input type="submit" name="btnupdate" class="btn" value="Update">
            </div>
        </form>
    </main>
</body>

</html>