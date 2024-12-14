<?php
session_start();
include('DBConnect.php');
if (!isset($_SESSION['ADMINID'])) {
    echo "<script>window.alert('Please Login Again')</script>";
    echo "<script>window.location='AdminLogin.php'</script>";
} else {
    $name = $_SESSION['ADMINNAME'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campaigns - Social Media Dashboard</title>
    <link rel="stylesheet" href="Styles.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="dashboard">
        <header class="dash-header">
            <h1>Social Media Dashboard</h1>
            <button id="menuToggle" class="menu-toggle">☰</button>
        </header>
        <nav id="sidebar">
            <ul>
                <li><a href="Dashboard.php">Overview</a></li>
                <li><a href="Analytics.php">Analytics</a></li>
                <li><a href="Campaigns.php" class="active">Campaigns</a></li>
                <li><a href="CampaignsType.php">Campaigns Type</a></li>
                <li><a href="Media.php">Media</a></li>
                <li><a href="Technique.php">Security Techniques</a></li>
                <li><a href="Member.php">Member</a></li>
                <li><a href="Donation.php">Donation</a></li>
            </ul>
        </nav>
        <main>
            <section id="campaigns">
                <h2>Campaigns Management</h2>
                <div class="create">
                    <div class="create-logo">
                        <div class="logo-circle">
                            <span class="plus">
                                <a href="CampaignsCreate.php">+</a>
                            </span>
                        </div>
                    </div>
                    <h3>Create Camapigns</h3>
                </div>

                <div class="table-container">
                    <table class="responsive-table">
                        <tbody>
                            <?php
                            $showcampaign = "SELECT * FROM campaigntable";
                            $campaignquery = mysqli_query($dbconnect, $showcampaign);
                            $rowcount = mysqli_num_rows($campaignquery);
                            if ($rowcount > 0) {
                                for ($i = 0; $i < $rowcount; $i++) {
                                    //code
                                    $campaignarray = mysqli_fetch_array($campaignquery);
                                    $cid = $campaignarray['CampaignID'];
                                    $cname = $campaignarray['CampaignName'];
                                    $cdesc = $campaignarray['CampaignDescription'];
                                    $cloc = $campaignarray['CampaignLocation'];
                                    $caim = $campaignarray['CampaignAim'];
                                    $cvis = $campaignarray['CampaignVision'];
                                    $cstdate = $campaignarray['StartDate'];
                                    $ceddate = $campaignarray['EndDate'];
                                    $cstatus = $campaignarray['Status'];
                                    //Get Media Name
                                    $cmedia = $campaignarray['MediaID'];
                                    $media = "select * from socialmediatable where MediaID=$cmedia";
                                    $mediacon = mysqli_query($dbconnect, $media);
                                    $mediaarr = mysqli_fetch_array($mediacon);
                                    $medianame = $mediaarr['MediaName'];
                                    //Get CamapignsType Name
                                    $ccamtype = $campaignarray['CamTypeID'];
                                    $camtype = "select * from campaigntypetble where CamTypeID=$ccamtype";
                                    $camtypecon = mysqli_query($dbconnect, $camtype);
                                    $camtypearr = mysqli_fetch_array($camtypecon);
                                    $camtypename = $camtypearr['CamTypeName'];
                                    $cbudget = $campaignarray['Budget'];
                                    $ccreatedat = $campaignarray['CreatedAt'];
                                    $cupdatedat = $campaignarray['UpdatedAt'];
                                    $cphoto1 = $campaignarray['CampaginPhoto1'];
                                    $cphoto2 = $campaignarray['CampaginPhoto2'];
                                    $cphoto3 = $campaignarray['CampaginPhoto3'];
                                    $cphoto4 = $campaignarray['CampaginPhoto4'];

                                    echo "<div class='campaign-card'>";
                                    echo "<h2>Campaign ID: $cid</h2>";
                                    echo "<p><b>Campaign Name:</b> $cname</p>";
                                    echo "<p><b>Campaign Description:</b> $cdesc</p>";
                                    echo "<p><b>Campaign Location:</b><br> $cloc</p>";
                                    echo "<p><b>Campaign Aim:</b> $caim</p>";
                                    echo "<p><b>Campaign Vision:</b> $cvis</p>";
                                    echo "<p><b>Start Date:</b> $cstdate</p>";
                                    echo "<p><b>End Date:</b> $ceddate</p>";
                                    echo "<p><b>Status:</b> $cstatus</p>";
                                    echo "<p><b>Media:</b> $medianame</p>";
                                    echo "<p><b>Campaigns Type:</b> $camtypename</p>";
                                    echo "<p><b>Budget:</b> $cbudget</p>";
                                    echo "<p><b>Created At:</b> $ccreatedat</p>";
                                    echo "<p><b>Updated At:</b> $cupdatedat</p>";
                                    echo "<div class='campaign-photos'>";
                                    echo "<img src='$cphoto1' alt='Photo' >";
                                    echo "<img src='$cphoto2' alt='Photo' >";
                                    echo "<img src='$cphoto3' alt='Photo' >";
                                    echo "<img src='$cphoto4' alt='Photo' >";
                                    echo "</div>";
                                    echo "<div class='campaign-actions'>";
                                    echo "<a href='CampaignsUpdate.php?cid=" . $cid . "'>Update</a>";
                                    echo "<a href='CampaignsDelete.php?cid=" . $cid . "'>Delete</a>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                            } else {
                                echo "<p>No data available</p>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
    <script src="script.js"></script>
</body>

</html>