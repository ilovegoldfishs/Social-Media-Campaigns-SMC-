<?php
session_start();
include('DBConnect.php');

// Get Media ID from GET request
$Mid = $_GET['mid'];
$selectMedia = "SELECT * FROM socialmediatable WHERE MediaID=?";
$stmt = $dbconnect->prepare($selectMedia);
$stmt->bind_param("i", $Mid);
$stmt->execute();
$result = $stmt->get_result();
$Mediaarr = $result->fetch_assoc();

$Showid = $Mediaarr['MediaID'];
$Showname = $Mediaarr['MediaName'];
$Showlink = $Mediaarr['MediaLink'];
$Showphoto = $Mediaarr['MediaPhoto'];

// For Social MEDIA UPDATE DATA
if (!isset($_SESSION['ADMINID'])) {
    echo "<script>window.alert('Please Login Again')</script>";
    echo "<script>window.location='AdminLogin.php'</script>";
    exit();
}

else if (isset($_POST['btnupdate'])) {
    $mediaid = $_POST['txtmediaid'];
    $medianame = $_POST['txtmedianame'];
    $medialink = $_POST['txtmedialink'];

    // Image upload handling
    if ($_FILES['txtmediaphoto']['size'] > 0) {
        $upphoto = uniqid() . "_" . $_FILES['txtmediaphoto']['name'];  // Ensure unique filename
        $folder = '../image/';
        $path = $folder . $upphoto;

        if (!move_uploaded_file($_FILES['txtmediaphoto']['tmp_name'], $path)) {
            echo "<p>Image Cannot Upload</p>";
            exit();
        }
    } else {
        // If no new image is uploaded, use the existing image path
        $path = $Showphoto;
    }

    // Prepare and execute update statement
    $updateSQL = "UPDATE socialmediatable SET MediaName=?, MediaLink=?, MediaPhoto=? WHERE MediaID=?";
    $stmt = $dbconnect->prepare($updateSQL);
    $stmt->bind_param("sssi", $medianame, $medialink, $path, $mediaid);

    if ($stmt->execute()) {
        echo "<script>window.alert('Update Social Media Success');</script>";
        echo "<script>window.location='Media.php';</script>";
    } else {
        echo "Error: " . $stmt->error;  // Error handling for debugging
        echo "<script>window.alert('Update Social Media Fail');</script>";
        echo "<script>window.location='MediaUpdate.php';</script>";
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
        <form class="social-media-form" action="MediaUpdate.php?mid=<?php echo $Mid; ?>" method="POST" enctype="multipart/form-data">
            <!-- Form for changing the social media name -->
            <div class="form-group">
                <label for="media-name">Media Name</label>
                <input type="text" name="txtmedianame" class="form-control" value="<?php echo htmlspecialchars($Showname); ?>">
            </div>
            <!-- Form for changing the social media link -->
            <div class="form-group">
                <label for="media-link">Media Link</label>
                <input type="url" name="txtmedialink" class="form-control" value="<?php echo htmlspecialchars($Showlink); ?>" >
            </div>
            <!-- Form for updating a new social media profile -->
            <div class="form-group">
                <label for="media-photo">Media Photo</label>
                <div class="file-input-wrapper">
                    <input type="file" id="media-photo" name="txtmediaphoto" accept="image/*" onchange="localFile(event)" >
                    <label for="media-photo" id="media-text">Upload Media</label>
                </div>
                <p><img src="<?php echo htmlspecialchars($Showphoto); ?>" id="output"></p>

                <script type="text/javascript">
                    var localFile = function(event) {
                        var img = document.getElementById('output');
                        img.src = URL.createObjectURL(event.target.files[0]);
                    };
                </script>
                <br><br>
                <input type="hidden" name="txtmediaid" value="<?php echo $Showid; ?>">
            </div>

            <div class="form-actions">
                <input type="submit" name="btnupdate" class="btn" value="Update">
            </div>
        </form>
    </main>
</body>

</html>