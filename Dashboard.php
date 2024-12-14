<?php
session_start();
include('DBConnect.php');
if (!isset($_SESSION['ADMINID'])) {
    echo "<script>window.alert('Please Login Again')</script>";
    echo "<script>window.location='AdminLogin.php'</script>";
}
else {
    $name = $_SESSION['ADMINNAME'];
}
$showcampaign = "SELECT * FROM campaigntable";
$campaignquery = mysqli_query($dbconnect, $showcampaign);
$rowcount = mysqli_num_rows($campaignquery);

$showmedia = "SELECT * FROM socialmediatable";
$mediaquery = mysqli_query($dbconnect, $showmedia);
$rowcount1 = mysqli_num_rows($mediaquery);

$showmember = "SELECT * FROM membertable";
$memberquery = mysqli_query($dbconnect, $showmember);
$rowcount2 = mysqli_num_rows($memberquery);

$showcamtype = "SELECT * FROM campaigntypetble";
$camtypequery = mysqli_query($dbconnect, $showcamtype);
$rowcount3 = mysqli_num_rows($camtypequery);

$showtechnique = "SELECT * FROM techniquetable";
$techniquequery = mysqli_query($dbconnect, $showtechnique);
$rowcount4 = mysqli_num_rows($techniquequery);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview - Social Media Dashboard</title>
    <link rel="stylesheet" href="Styles.css?v=<?php echo time(); ?>">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="dashboard">
        <header class="dash-header">
            <h1>Social Media Dashboard</h1>
            <button id="menuToggle" class="menu-toggle">☰</button>
        </header>
        <nav id="sidebar">
            <ul>
                <li><a href="Dashboard.php" class="active">Overview</a></li>
                <li><a href="Analytics.php">Analytics</a></li>
                <li><a href="Campaigns.php">Campaigns</a></li>
                <li><a href="CampaignsType.php">Campaigns Type</a></li>
                <li><a href="Media.php">Media</a></li>
                <li><a href="Technique.php">Security Techniques</a></li>
                <li><a href="Member.php">Member</a></li>
                <li><a href="Donation.php">Donation</a></li>
            </ul>
        </nav>
        <main>
            <section>
                <h2>Overview</h2>
                <div class="card-container">
                    <div class="card">
                        <h3>Total Member</h3>
                        <p class="big-number"><?php echo $rowcount2; ?></p>
                        <p class="trend positive">↑ 2.5%</p>
                    </div>
                    <div class="card">
                        <h3>Total Media</h3>
                        <p class="big-number"><?php echo $rowcount1; ?></p>
                        <p class="trend positive">↑ 0.8%</p>
                    </div>
                    <div class="card">
                        <h3>Active Campaigns</h3>
                        <p class="big-number"><?php echo $rowcount; ?></p>
                        <p class="trend neutral">No change</p>
                    </div>
                    <div class="card">
                        <h3>Total Campaigns type</h3>
                        <p class="big-number"><?php echo $rowcount3; ?></p>
                        <p class="trend neutral">No change</p>
                    </div>
                </div>
                <div class="card-container">
                    <div class="card">
                        <h3>Total Campaigns type</h3>
                        <p class="big-number"><?php echo $rowcount3; ?></p>
                    </div>
                    <div class="card">
                        <h3>Total Technique</h3>
                        <p class="big-number"><?php echo $rowcount4; ?></p>
                    </div>
                </div>
                <div class="chart-container">
                    <canvas id="overviewChart"></canvas>
                </div>
            </section>
        </main>
    </div>
    <script src="script.js"></script>
</body>
</html>