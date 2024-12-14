<?php
session_start();
include('DBConnect.php');
// Get Campaigns ID from GET request
$Cid = $_GET['cid'];
$selectcampaign = "SELECT * FROM campaigntable WHERE CampaignID=?";
$stmt = $dbconnect->prepare($selectcampaign);
$stmt->bind_param("i", $Cid);
$stmt->execute();
$result = $stmt->get_result();
$Carr = $result->fetch_assoc();
$Showid = $Carr['CampaignID'];
$Showname = $Carr['CampaignName'];
$Showdec = $Carr['CampaignDescription'];
$Showloc = $Carr['CampaignLocation'];
$Showaim = $Carr['CampaignAim'];
$Showvis = $Carr['CampaignVision'];
$Showstdate = date("Y-m-d H:i:s", strtotime($Carr['StartDate']));
$Showendate = date("Y-m-d H:i:s", strtotime($Carr['EndDate']));
$Showstat = $Carr['Status'];
$Showbud = $Carr['Budget'];
$Showcre = $Carr['CreatedAt'];
$Showupd = $Carr['UpdatedAt'];
$Showpho1 = $Carr['CampaginPhoto1'];
$Showpho2 = $Carr['CampaginPhoto2'];
$Showpho3 = $Carr['CampaginPhoto3'];
$Showpho4 = $Carr['CampaginPhoto4'];
$Showweek1 = $Carr['Week1'];
$Showweek2 = $Carr['Week2'];
$Showweek3 = $Carr['Week3'];
$Showweek4 = $Carr['Week4'];
$Showweek5 = $Carr['Week5'];
$Showrew1 = $Carr['Reward1'];
$Showrew2 = $Carr['Reward2'];
$Showrew3 = $Carr['Reward3'];
$Showrew4 = $Carr['Reward4'];
$Showrew5 = $Carr['Reward5'];

// Select query for Media
$selectmedia = "select * from socialmediatable";
$connectquery = mysqli_query($dbconnect, $selectmedia);
$row = mysqli_num_rows($connectquery);

// Select query for CampaignType
$selectcamp = "select * from campaigntypetble";
$connectquery1 = mysqli_query($dbconnect, $selectcamp);
$row = mysqli_num_rows($connectquery1);

if (isset($_POST['btnUpdate'])) {
    $campaignid = $_POST['txttecid'];
    $cname = $_POST['txtname'];
    $cdesc = $_POST['txtdec'];
    $cloc = $_POST['txtloc'];
    $caim = $_POST['txtaim'];
    $cvis = $_POST['txtvis'];
    $cstdate = $_POST['txtstdate'];
    $ceddate = $_POST['txtendate'];
    $cstatus = $_POST['txtstat'];
    $cmedia = $_POST['colMedia'];
    $ccamtype = $_POST['colCamapign'];
    $cweek1 = $_POST['txtwe1'];
    $cweek2 = $_POST['txtwe2'];
    $cweek3 = $_POST['txtwe3'];
    $cweek4 = $_POST['txtwe4'];
    $cweek5 = $_POST['txtwe5'];
    $creward1 = $_POST['txtrew1'];
    $creward2 = $_POST['txtrew2'];
    $creward3 = $_POST['txtrew3'];
    $creward4 = $_POST['txtrew4'];
    $creward5 = $_POST['txtrew5'];
    $cbudget = $_POST['txtbudget'];

    $path1 = $Showpho1;
    $path2 = $Showpho2;
    $path3 = $Showpho3;
    $path4 = $Showpho4;

    if (isset($_FILES['txtcamphoto1']) && $_FILES['txtcamphoto1']['size'] > 0) {
        $upphoto1 = uniqid() . "_" . $_FILES['txtcamphoto1']['name'];
        $folder1 = '../image/';
        $path1 = $folder1 . $upphoto1;

        if (!move_uploaded_file($_FILES['txtcamphoto1']['tmp_name'], $path1)) {
            echo "<p>Image 1 Cannot Upload</p>";
            exit();
        }
    }
    

    if (isset($_FILES['txtcamphoto2']) && $_FILES['txtcamphoto2']['size'] > 0) {
        $upphoto2 = uniqid() . "_" . $_FILES['txtcamphoto2']['name'];
        $folder2 = '../image/';
        $path2 = $folder2 . $upphoto2;

        if (!move_uploaded_file($_FILES['txtcamphoto2']['tmp_name'], $path2)) {
            echo "<p>Image 2 Cannot Upload</p>";
            exit();
        }
    }
    

    if (isset($_FILES['txtcamphoto3']) && $_FILES['txtcamphoto3']['size'] > 0) {
        $upphoto3 = uniqid() . "_" . $_FILES['txtcamphoto3']['name'];
        $folder3 = '../image/';
        $path3 = $folder3 . $upphoto3;

        if (!move_uploaded_file($_FILES['txtcamphoto3']['tmp_name'], $path3)) {
            echo "<p>Image 3 Cannot Upload</p>";
            exit();
        }
    }

    if (isset($_FILES['txtcamphoto4']) && $_FILES['txtcamphoto4']['size'] > 0) {
        $upphoto4 = uniqid() . "_" . $_FILES['txtcamphoto4']['name'];
        $folder4 = '../image/';
        $path4 = $folder4 . $upphoto4;

        if (!move_uploaded_file($_FILES['txtcamphoto4']['tmp_name'], $path4)) {
            echo "<p>Image 4 Cannot Upload</p>";
            exit();
        }
    }
    

    $currentDateTime = date("Y-m-d H:i:s");
    $updateSQL = "UPDATE campaigntable SET 
    MediaID = ?, 
    CamTypeID = ?, 
    CampaignName = ?, 
    CampaignDescription = ?, 
    CampaignLocation = ?, 
    CampaignAim = ?, 
    CampaignVision = ?, 
    StartDate = ?, 
    EndDate = ?, 
    Status = ?, 
    Budget = ?, 
    UpdatedAt = ?, 
    Week1 = ?, 
    Week2 = ?, 
    Week3 = ?, 
    Week4 = ?, 
    Week5 = ?, 
    Reward1 = ?, 
    Reward2 = ?, 
    Reward3 = ?, 
    Reward4 = ?, 
    Reward5 = ?, 
    CampaginPhoto1 = ?, 
    CampaginPhoto2 = ?, 
    CampaginPhoto3 = ?, 
    CampaginPhoto4 = ? 
    WHERE CampaignID = ?";

    $stmt = $dbconnect->prepare($updateSQL);
    $stmt->bind_param(
        "iissssssssssssssssssssssssi",
        $cmedia,
        $ccamtype,
        $cname,
        $cdesc,
        $cloc,
        $caim,
        $cvis,
        $cstdate,
        $ceddate,
        $cstatus,
        $cbudget,
        $currentDateTime,
        $cweek1,
        $cweek2,
        $cweek3,
        $cweek4,
        $cweek5,
        $creward1,
        $creward2,
        $creward3,
        $creward4,
        $creward5,
        $path1,
        $path2,
        $path3,
        $path4,
        $campaignid
    );

    if ($stmt->execute()) {
        echo "<script>window.alert('Update Campaign Success');</script>";
        echo "<script>window.location='Campaigns.php';</script>";
    } else {
        echo "Error: " . $stmt->error;  // Error handling for debugging
        echo "<script>window.alert('Update Campaign Fail');</script>";
        echo "<script>window.location='CampaignUpdate.php';</script>";
    }
    $stmt->close();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campaigns Update Form</title>
    <link rel="stylesheet" href="Styles.css?v=<?php echo time(); ?>">
    <script src="script.js"></script>
</head>

<body>
    <header class="media-header">
        <div class="media-container">
            <h1>Update New Camapigns</h1>
            <div class="breadcrumb">
                <a href="Dashboard.php">Dashboard</a> / <a href="Campaigns.php">Campaigns</a> / Create New
            </div>
        </div>
    </header>

    <main class="media-container">
        <form class="social-media-form" action="CampaignsUpdate.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            <input type="hidden" name="txttecid" value="<?php echo $Showid; ?>">
            <div class="form-group">
                <label>Campaign Name</label>
                <input type="text" name="txtname" class="form-control" value="<?php echo htmlspecialchars($Showname); ?>">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="txtdec"><?php echo htmlspecialchars($Showdec); ?></textarea>
            </div>

            <div class="form-group">
                <label>location</label>
                <textarea name="txtloc"><?php echo htmlspecialchars($Showloc); ?></textarea>
            </div>

            <div class="form-group">
                <label>CampaignAim</label>
                <input type="text" name="txtaim" class="form-control" value="<?php echo htmlspecialchars($Showaim); ?>">
            </div>

            <div class="form-group">
                <label>CampaignVision</label>
                <input type="text" name="txtvis" class="form-control" value="<?php echo htmlspecialchars($Showvis); ?>">
            </div>

            <div class="form-group">
                <label>StartDate</label>
                <input type="datetime-local" name="txtstdate" class="form-control" value="<?php echo htmlspecialchars($Showstdate); ?>">
            </div>

            <div class="form-group">
                <label>EndDate</label>
                <input type="datetime-local" name="txtendate" class="form-control" value="<?php echo htmlspecialchars($Showendate); ?>">
            </div>

            <div class="form-group">
                <label>Status</label>
                <input type="text" name="txtstat" class="form-control" value="<?php echo htmlspecialchars($Showstat); ?>">
            </div>

            <div class="form-group">
                <label>Media Name</label>
                <select name="colMedia">
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

            <div class="form-group">
                <label>CampaignType Name</label>
                <select name="colCamapign">
                    <?php
                    for ($i = 0; $i < $row; $i++) {
                        $arr = mysqli_fetch_array($connectquery1);
                        $camid = $arr['CamTypeID'];
                        $cname = $arr['CamTypeName'];
                        echo "<option value='$camid'>$cname</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>week1</label>
                <input type="text" name="txtwe1" value="<?php echo htmlspecialchars($Showweek1); ?>">
            </div>

            <div class="form-group">
                <label>week2</label>
                <input type="text" name="txtwe2" value="<?php echo htmlspecialchars($Showweek2); ?>">
            </div>

            <div class="form-group">
                <label>week3</label>
                <input type="text" name="txtwe3" value="<?php echo htmlspecialchars($Showweek3); ?>">
            </div>

            <div class="form-group">
                <label>week4</label>
                <input type="text" name="txtwe4" value="<?php echo htmlspecialchars($Showweek4); ?>">
            </div>

            <div class="form-group">
                <label>week5</label>
                <input type="text" name="txtwe5" value="<?php echo htmlspecialchars($Showweek5); ?>">
            </div>

            <div class="form-group">
                <label>Reward1</label>
                <input type="text" name="txtrew1" value="<?php echo htmlspecialchars($Showrew1); ?>">
            </div>

            <div class="form-group">
                <label>Reward2</label>
                <input type="text" name="txtrew2" value="<?php echo htmlspecialchars($Showrew2); ?>">
            </div>

            <div class="form-group">
                <label>Reward3</label>
                <input type="text" name="txtrew3" value="<?php echo htmlspecialchars($Showrew3); ?>">
            </div>

            <div class="form-group">
                <label>Reward4</label>
                <input type="text" name="txtrew4" value="<?php echo htmlspecialchars($Showrew4); ?>">
            </div>

            <div class="form-group">
                <label>Reward5</label>
                <input type="text" name="txtrew5" value="<?php echo htmlspecialchars($Showrew5); ?>">
            </div>

            <div class="form-group">
                <label>Budget</label>
                <input type="number" name="txtbudget" min="0" step="0.01" value="<?php echo htmlspecialchars($Showbud); ?>">
            </div>


            <div class="form-group">
                <label>Campaign Photos (Upload up to 4)</label>
                <div class="photo-upload-container">
                    <div class="photo-upload">
                        <input type="file" id="fileInput1" name="txtcamphoto1" onchange="localFile(event, 'imagePreview1')">
                        <img src="<?php echo htmlspecialchars($Showpho1); ?>" accept="image/* alt="Image preview" id="imagePreview1" />
                        <label for="fileInput1">Upload Photo 1</label>
                    </div>
                    <div class="photo-upload">
                        <input type="file" id="fileInput2" name="txtcamphoto2" onchange="localFile(event, 'imagePreview2')">
                        <img src="<?php echo htmlspecialchars($Showpho2); ?>" accept="image/* alt="Image preview" id="imagePreview2" />
                        <label for="fileInput2">Upload Photo 2</label>
                    </div>
                    <div class="photo-upload">
                        <input type="file" id="fileInput3" name="txtcamphoto3" onchange="localFile(event, 'imagePreview3')">
                        <img src="<?php echo htmlspecialchars($Showpho3); ?>" accept="image/* alt="Image preview" id="imagePreview3" />
                        <label for="fileInput3">Upload Photo 3</label>
                    </div>
                    <div class="photo-upload">
                        <input type="file" id="fileInput4" name="txtcamphoto4" onchange="localFile(event, 'imagePreview4')">
                        <img src="<?php echo htmlspecialchars($Showpho4); ?>" accept="image/* alt="Image preview" id="imagePreview4" />
                        <label for="fileInput4">Upload Photo 4</label>
                    </div>
                </div>
                <div id="error-message" style="display: none;">Please upload Four image</div>
            </div>
            <div class="form-actions">
                <!-- <button type="button" class="btn btn-secondary">Cancel</button> -->
                <button type="submit" class="btn" name="btnUpdate">Save</button>
            </div>


            <script type="text/javascript">
                function localFile(event, imageId) {
                    var img = document.getElementById(imageId);
                    img.src = URL.createObjectURL(event.target.files[0]);
                };

                function validateForm() {
                    var fileInput1 = document.getElementById('fileInput1');
                    var fileInput2 = document.getElementById('fileInput2');
                    var fileInput3 = document.getElementById('fileInput3');
                    var fileInput4 = document.getElementById('fileInput4');
                    var errorMessage = document.getElementById('error-message');

                    if (fileInput1.files.length === 0 && fileInput2.files.length === 0 && fileInput3.files.length === 0 && fileInput4.files.length === 0) {
                        errorMessage.style.display = 'block';
                        return false;
                    } else {
                        errorMessage.style.display = 'none';
                        return true;
                    }
                }
            </script>

        </form>
    </main>
</body>

</html>