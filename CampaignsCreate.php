<?php
include('DBConnect.php');
session_start();
if (!isset($_SESSION['ADMINID'])) {
    echo "<script>window.alert('Please Login Again')</script>";
    echo "<script>window.location='AdminLogin.php'</script>";
} else {
    if (isset($_POST['btnsave'])) {
        $cname = $_POST['txtcamname'];
        $cdesc = $_POST['txtcamdesc'];
        $cloc = $_POST['txtcamloc'];
        $caim = $_POST['txtcamaim'];
        $cvis = $_POST['txtcamvis'];
        $cstdate = $_POST['txtcamstartdate'];
        $ceddate = $_POST['txtcamenddate'];
        $cstatus = $_POST['txtstatus'];
        $cmedia = $_POST['colMedia'];
        $ccamtype = $_POST['colCamtype'];
        $cweek1 = $_POST['txtweek1'];
        $cweek2 = $_POST['txtweek2'];
        $cweek3 = $_POST['txtweek3'];
        $cweek4 = $_POST['txtweek4'];
        $cweek5 = $_POST['txtweek5'];
        $creward1 = $_POST['txtreward1'];
        $creward2 = $_POST['txtreward2'];
        $creward3 = $_POST['txtreward3'];
        $creward4 = $_POST['txtreward4'];
        $creward5 = $_POST['txtreward5'];
        $cbudget = $_POST['txtbudget'];


        if (isset($_FILES['txtcamphoto1'])) {
            $img1 = $_FILES['txtcamphoto1']['name'];
            $Folder1 = "../image/";
            $path1 = $Folder1 . "_" . $img1;
            $copy1 = copy($_FILES['txtcamphoto1']['tmp_name'], $path1);
            if (!$copy1) {
                echo "<p>Photo1 Cannot Upload</p>";
            }
        } else {
            echo "<p>No file uploaded for Photo1</p>";
            $path1 = '';
        }


        if (isset($_FILES['txtcamphoto2'])) {
            $img2 = $_FILES['txtcamphoto2']['name'];
            $Folder2 = "../image/";
            $path2 = $Folder2 . "_" . $img2;
            $copy2 = copy($_FILES['txtcamphoto2']['tmp_name'], $path2);
            if (!$copy2) {
                echo "<p>Photo2 Cannot Upload</p>";
            }
        } else {
            echo "<p>No file uploaded for Photo2</p>";
            $path2 = '';
        }


        if (isset($_FILES['txtcamphoto3'])) {
            $img3 = $_FILES['txtcamphoto3']['name'];
            $Folder3 = "../image/";
            $path3 = $Folder3 . "_" . $img3;
            $copy3 = copy($_FILES['txtcamphoto3']['tmp_name'], $path3);
            if (!$copy3) {
                echo "<p>Photo3 Cannot Upload</p>";
            }
        } else {
            echo "<p>No file uploaded for Photo3</p>";
            $path3 = '';
        }


        if (isset($_FILES['txtcamphoto4'])) {
            $img4 = $_FILES['txtcamphoto4']['name'];
            $Folder4 = "../image/";
            $path4 = $Folder4 . "_" . $img4;
            $copy4 = copy($_FILES['txtcamphoto4']['tmp_name'], $path4);
            if (!$copy4) {
                echo "<p>Photo4 Cannot Upload</p>";
            }
        } else {
            echo "<p>No file uploaded for Photo4</p>";
            $path4 = '';
        }
        $currentDateTime = date("Y-m-d H:i:s");
        // Insert data into database
        // $Camsave = "INSERT INTO campaigntable(MediaID ,CamTypeID ,CampaignName ,CampaignDescription ,
        // CampaignLocation ,CampaignAim ,CampaignVision ,StartDate ,EndDate ,Status ,Budget ,CreatedAt ,UpdatedAt ,CampaginPhoto1 , CampaginPhoto2 ,
        // CampaginPhoto3 ,CampaginPhoto4,Week1,Week2,Week3,Week4,Week5,Reward1,Reward2,Reward3,Reward4,Reward5) 
        // values('$cmedia','$ccamtype','$cname','$cdesc','$cloc','$caim','$cvis','$cstdate','$ceddate','$cstatus',
        // '$cbudget','$currentDateTime',NULL,'$path1','$path2','$path3','$path4','$cweek1','$cweek2','$cweek3','$cweek4','$cweek5',
        // '$creward1','$creward2','$creward3','$creward4','$creward5')";

        // $result = mysqli_query($dbconnect, $Camsave);
        // if ($result) {
           
        //     echo "<script>window.alert('Campaigns data stored Successfully')</script>";
        //     echo "<script>window.location='Campaigns.php'</script>";
        // } else {
           
        //     echo "<script>window.alert('Campaigns data stored Fail')</script>";
        //     echo "<script>window.location='CampaignsCreate.php'</script>";
        // }
        $stmt = mysqli_prepare($dbconnect, "INSERT INTO campaigntable (MediaID, CamTypeID, CampaignName, CampaignDescription, CampaignLocation, 
            CampaignAim, CampaignVision, StartDate, EndDate, Status, Budget, CreatedAt, CampaginPhoto1, CampaginPhoto2, CampaginPhoto3, CampaginPhoto4, 
            Week1, Week2, Week3, Week4, Week5, Reward1, Reward2, Reward3, Reward4, Reward5) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
            ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        // Bind the parameters
        $stmt->bind_param("ssssssssssssssssssssssssss", $cmedia, $ccamtype, $cname, $cdesc, $cloc, $caim, $cvis, $cstdate, $ceddate, $cstatus, 
            $cbudget, $currentDateTime, $path1, $path2, $path3, $path4, $cweek1, $cweek2, $cweek3, $cweek4, $cweek5, $creward1, $creward2, 
            $creward3, $creward4, $creward5);
        
        // Execute the prepared statement
        $stmt->execute();
        
        // Check if the query was successful
        if ($stmt->affected_rows > 0) {
            echo "<script>window.alert('Campaigns data stored Successfully')</script>";
            echo "<script>window.location='Campaigns.php'</script>";
        } else {
            echo "<script>window.alert('Campaigns data stored Fail')</script>";
            echo "<script>window.location='CampaignsCreate.php'</script>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campaign Created - Social Media Dashboard</title>
    <link rel="stylesheet" href="Styles.css?v=<?php echo time(); ?>">
    <script src="script.js"></script>
</head>

<body>
    <header class="media-header">
        <div class="media-container">
            <h1>Create New Social Media Profile</h1>
            <div class="breadcrumb">
                <a href="Dashboard.php">Dashboard</a> / <a href="Campaigns.php">Campaigns</a> / Create New
            </div>
        </div>
    </header>
    <main class="media-container">
        <h2>Create New Campaign</h2>
        <form class="campaign-form" action="CampaignsCreate.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="campaign-name">Campaign Name</label>
                <input type="text" name="txtcamname" required>
            </div>
            <div class="form-group">
                <label for="campaign-description">Description</label>
                <textarea id="campaign-description" rows="3" name="txtcamdesc" required></textarea>
            </div>
            <div class="form-group">
                <label for="campaign-location">Location</label>
                <textarea name="txtcamloc" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="campaign-aim">Campaign Aim</label>
                <textarea name="txtcamaim" required></textarea>
            </div>
            <div class="form-group">
                <label for="campaign-vision">Campaign Vision</label>
                <textarea name="txtcamvis" required></textarea>
            </div>
            <div class="form-group">
                <label for="start-date">Start Date</label>
                <input type="date" name="txtcamstartdate" required>
            </div>
            <div class="form-group">
                <label for="end-date">End Date</label>
                <input type="date" name="txtcamenddate" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="txtstatus" required>
                    <option value="active">Active</option>
                    <option value="paused">Paused</option>
                    <option value="draft">Draft</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            <div class="form-group">
                <label>Choose Media</label>
                <?php
                $showmedia = "SELECT * from socialmediatable";
                $mediaquery = mysqli_query($dbconnect, $showmedia);
                $mediarow = mysqli_num_rows($mediaquery);
                ?>
                <select name="colMedia">
                    <?php
                    for ($i = 0; $i < $mediarow; $i++) {
                        $mediaarr = mysqli_fetch_array($mediaquery);
                        $mID = $mediaarr['MediaID'];
                        $mname = $mediaarr['MediaName'];
                        echo "<option value='$mID'>$mname </option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Choose CampaignType</label>
                <?php
                $showcamtype = "SELECT * from campaigntypetble";
                $camtypequery = mysqli_query($dbconnect, $showcamtype);
                $cantyperow = mysqli_num_rows($camtypequery);
                ?>
                <select name="colCamtype">
                    <?php
                    for ($i = 0; $i < $cantyperow; $i++) {
                        $camtypearr = mysqli_fetch_array($camtypequery);
                        $cID = $camtypearr['CamTypeID'];
                        $cname = $camtypearr['CamTypeName'];
                        $cobj = $camtypearr['CamTypeObj'];
                        echo "<option value='$cID'>$cname </option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <h4>Weekly Challenges</h4>
                <label for="week1">Week1</label>
                <input type="text" name="txtweek1" required>
                <label for="week2">week2</label>
                <input type="text" name="txtweek2" required>
                <label for="week3">week3</label>
                <input type="text" name="txtweek3" required>
                <label for="week4">week4</label>
                <input type="text" name="txtweek4" required>
                <label for="week5">week5</label>
                <input type="text" name="txtweek5" required>
            </div>
            <div class="form-group">
                <h4>Campaign Rewards</h4>
                <label for="reward1">Reward1</label>
                <input type="text" name="txtreward1" required>
                <label for="reward2">Reward2</label>
                <input type="text" name="txtreward2" required>
                <label for="reward3">Reward3</label>
                <input type="text" name="txtreward3" required>
                <label for="reward4">Reward4</label>
                <input type="text" name="txtreward4" required>
                <label for="reward5">Reward5</label>
                <input type="text" name="txtreward5" required>
            </div>

            <div class="form-group">
                <label for="budget">Budget</label>
                <input type="number" name="txtbudget" min="0" step="0.01" required>
            </div>
            <div class="form-group">
                <label>Campaign Photos (Upload up to 4)</label>
                <div class="photo-upload-container">
                    <div class="photo-upload">
                        <input type="file" id="fileInput1" name="txtcamphoto1" required>
                        <img src="" alt="Image preview" id="imagePreview" />
                        <label for="fileInput1">Upload Photo 1</label>
                    </div>
                    <div class="photo-upload">
                        <input type="file" id="fileInput2" name="txtcamphoto2" required>
                        <img src="" alt="Image preview" id="imagePreview" />
                        <label for="fileInput2">Upload Photo 2</label>
                    </div>
                    <div class="photo-upload">
                        <input type="file" id="fileInput3" name="txtcamphoto3" required>
                        <img src="" alt="Image preview" id="imagePreview" />
                        <label for="fileInput3" name="txtcamphoto3">Upload Photo 3</label>
                    </div>
                    <div class="photo-upload">
                        <input type="file" id="fileInput4" name="txtcamphoto4" required>
                        <img src="" alt="Image preview" id="imagePreview" />
                        <label for="fileInput4" name="txtcamphoto4">Upload Photo 4</label>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <button type="reset" class="btn btn-secondary">Cancel</button>
                <button type="submit" name="btnsave" class="btn">Save</button>
            </div>
        </form>
    </main>

    <script type="text/javascript">
        const fileInputs = document.querySelectorAll('input[type="file"]');
        const imagePreviews = document.querySelectorAll('img[id^="imagePreview"]');

        fileInputs.forEach((fileInput, index) => {
            fileInput.addEventListener('change', (e) => {
                const file = fileInput.files[0];
                const reader = new FileReader();

                reader.onload = (event) => {
                    imagePreviews[index].src = event.target.result;
                };

                reader.readAsDataURL(file);
            });
        });
    </script>
</body>

</html>