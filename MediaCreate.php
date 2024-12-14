<?php
include('DBConnect.php');
session_start();
if (!isset($_SESSION['ADMINID'])) {
    echo "<script>window.alert('Please Login Again')</script>";
    echo "<script>window.location='AdminLogin.php'</script>";
} else {
    if (isset($_POST['btnSave'])) {
        $mName = $_POST['txtmedianame'];
        $mLink = $_POST['txtmedialink'];
        //Photo upload
        $img = $_FILES['txtmediaphoto']['name'];
        $Folder = "../image/";
        $path = $Folder . "_" . $img;
        $copy = copy($_FILES['txtmediaphoto']['tmp_name'], $path);
        if (!$copy) {
            echo "<p>Photo Cannot Upload</p>";
        }

        $insertMedia = "INSERT INTO socialmediatable
        (MediaName,MediaLink,MediaPhoto) values 
        ('$mName','$mLink','$path')";
        $query = mysqli_query($dbconnect, $insertMedia);


        if ($query) {
            //code
            echo "<script>window.alert('Social Media data stored Successfull')</script>";
            echo "<script>window.location='Media.php'</script>";
        } else {
            //code
            echo "<script>window.alert('Social Media data stored Fail')</script>";
            echo "<script>window.location='MediaCreate.php'</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>media Create</title>
    <link rel="stylesheet" href="Styles.css?v=<?php echo time(); ?>">
    <script src="script.js"></script>
</head>

<body>
    <header class="media-header">
        <div class="media-container">
            <h1>Create New Social Media Profile</h1>
            <div class="breadcrumb">
                <a href="Dashboard.php">Dashboard</a> / <a href="Media.php">Social Media</a> / Create New
            </div>
        </div>
    </header>

    <main class="media-container">
        <form class="social-media-form" action="MediaCreate.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="media-name">Media Name</label>
                <input type="text" name="txtmedianame" class="form-control" placeholder="Enter social media platform name" required>
            </div>

            <div class="form-group">
                <label for="media-link">Media Link</label>
                <input type="url" name="txtmedialink" class="form-control" placeholder="Enter social media profile URL" required>
            </div>

            <div class="form-group">
                <label for="media-photo">Media Photo</label>
                <div class="file-input-wrapper">
                    <input type="file" id="media-photo" name="txtmediaphoto" required>
                    <label for="media-photo" id="media-text">Upload Media</label>
                    <img src="" alt="Image preview" id="imagePreview" />
                </div>
            </div>

            <div class="form-actions">
                <button type="reset" class="btn btn-secondary">Cancel</button>
                <button type="submit" class="btn" name="btnSave">Save</button>
            </div>
        </form>
    </main>
</body>
<script type="text/javascript">
    const fileInput = document.getElementById('media-photo');
    const imagePreview = document.getElementById('imagePreview');

    fileInput.addEventListener('change', (e) => {
        const file = fileInput.files[0];
        const reader = new FileReader();

        reader.onload = (event) => {
            imagePreview.src = event.target.result;
        };

        reader.readAsDataURL(file);
    });
</script>

</html>