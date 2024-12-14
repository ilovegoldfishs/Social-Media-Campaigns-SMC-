<?php
include('DBConnect.php');
session_start();
if (!isset($_SESSION['ADMINID'])) {
    echo "<script>window.alert('Please Login Again')</script>";
    echo "<script>window.location='AdminLogin.php'</script>";
} else {
    if (isset($_POST['btnSave'])) {
        $tName = $_POST['txttecname'];
        $tDescription = $_POST['txttecdesc'];
        $tFeature = $_POST['txttecfea'];
        $mID = $_POST['colMedia'];

        // Escape user input to prevent SQL injection
        $tName = mysqli_real_escape_string($dbconnect, $tName);
        $tDescription = mysqli_real_escape_string($dbconnect, $tDescription);
        $tFeature = mysqli_real_escape_string($dbconnect, $tFeature);
        $mID = mysqli_real_escape_string($dbconnect, $mID);

        $insertquery = "INSERT INTO techniquetable (TechniqueName, Description, Feature, mediaID) VALUES ('$tName','$tDescription','$tFeature','$mID')";
        $tecon = mysqli_query($dbconnect, $insertquery);

        if ($tecon) {
            echo "<script>window.alert('Technique Insert Success');</script>";
            echo "<script>window.location='Technique.php';</script>";
        } else {
            echo "<script>window.alert('Technique Insert Fail: " . mysqli_error($dbconnect) . "');</script>";
            echo "<script>window.location='Technique.php';</script>";
        }
    }
}
// Select query for Media
$selectmedia = "select * from socialmediatable";
$connectquery = mysqli_query($dbconnect, $selectmedia);
$row = mysqli_num_rows($connectquery);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Techniques Create</title>
    <link rel="stylesheet" href="Styles.css?v=<?php echo time(); ?>">
</head>

<body>
    <header class="media-header">
        <div class="media-container">
            <h1>Add New Security Technique</h1>
            <div class="breadcrumb">
                <a href="Dashboard.php">Dashboard</a> / <a href="Technique.php">Technique</a> / Create New
            </div>
        </div>
    </header>

    <main class="media-container">
        <form class="social-media-form" action="TechniqueCreate.php" method="POST">
            <div class="form-group">
                <label>Technique Name</label>
                <input type="text" name="txttecname" class="form-control" placeholder="Enter Technique name" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <input type="text" name="txttecdesc" class="form-control" placeholder="Enter Technique Description" required>
            </div>

            <div class="form-group">
                <label>Key Features (comma-separated)</label>
                <input type="text" name="txttecfea" class="form-control" placeholder="Enter Technique Features" required>
            </div>

            <div class="form-group">
                <label for="technique-features">Media Name</label>
                <select name="colMedia" class="MediaSelect">
                    <?php
                    for ($i = 0; $i < $row; $i++) {
                        $arr = mysqli_fetch_array($connectquery);
                        $mid = $arr['MediaID'];
                        $mname = $arr['MediaName'];
                        echo "<option value='$mid'>$mname</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-actions">
                <button type="reset" class="btn btn-secondary">Cancel</button>
                <button type="submit" class="btn" name="btnSave">Save</button>
            </div>
        </form>
    </main>
</body>

</html>