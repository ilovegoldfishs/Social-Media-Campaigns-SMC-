<?php
include('DBConnect.php');
session_start();
// For Technique UPDATE DATA

if (isset($_POST['btnUpdate'])) {
    $tID = $_POST['txttecid'];
    $tName = $_POST['txttecname'];
    $tDescription = $_POST['txttecdesc'];
    $tFeature = $_POST['txttecfea'];
    $mID = $_POST['colMedia'];

    $updateSQL = "UPDATE techniquetable 
        SET TechniqueName=?, 
            Description=?, 
            Feature=?, 
            MediaID=? 
        WHERE TechniqueID=?";
    $stmt = $dbconnect->prepare($updateSQL);
    $stmt->bind_param("sssii", $tName, $tDescription, $tFeature, $mID, $tID);

    if ($stmt->execute()) {
        echo "<script>window.alert('Update Technique Success');</script>";
        echo "<script>window.location='Technique.php';</script>";
    } else {
        echo "Error: " . $stmt->error;  // Error handling for debugging
        echo "<script>window.alert('Update Technique Fail');</script>";
        echo "<script>window.location='TechniqueUpdate.php';</script>";
    }
    $stmt->close();
}
// Get Technique ID from GET request
$Tid = $_GET['tid'];
$selectTechnique = "SELECT * FROM techniquetable WHERE TechniqueID=?";
$stmt = $dbconnect->prepare($selectTechnique);
$stmt->bind_param("i", $Tid);
$stmt->execute();
$result = $stmt->get_result();
$Tecarr = $result->fetch_assoc();

$Showid = $Tecarr['TechniqueID'];
$Showname = $Tecarr['TechniqueName'];
$Showdec = $Tecarr['Description'];
$Showfea = $Tecarr['Feature'];
$Showmed = $Tecarr['mediaID'];

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
    <title>Security Techniques Update</title>
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
        <form class="social-media-form" action="TechniqueUpdate.php" method="POST">
            <div class="form-group">
                <label>Technique Name</label>
                <input type="text" name="txttecname" class="form-control" value="<?php echo htmlspecialchars($Showname); ?>">
            </div>

            <div class="form-group">
                <label>Description</label>
                <input type="text" name="txttecdesc" class="form-control" value="<?php echo htmlspecialchars($Showdec); ?>">
            </div>

            <div class="form-group">
                <label>Key Features (comma-separated)</label>
                <input type="text" name="txttecfea" class="form-control" value="<?php echo htmlspecialchars($Showfea); ?>">
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
            <input type="hidden" name="txttecid" value="<?php echo $Showid; ?>">
            <div class="form-actions">
                <!-- <button type="button" class="btn btn-secondary">Cancel</button> -->
                <button type="submit" class="btn" name="btnUpdate">Save</button>
            </div>
        </form>
    </main>
</body>

</html>