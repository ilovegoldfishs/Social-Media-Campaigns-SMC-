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
    <title>Media - Social Media Dashboard</title>
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
                <li><a href="Campaigns.php">Campaigns</a></li>
                <li><a href="CampaignsType.php">Campaigns Type</a></li>
                <li><a href="Media.php" class="active">Media</a></li>
                <li><a href="Technique.php">Security Techniques</a></li>
                <li><a href="Member.php">Member</a></li>
                <li><a href="Donation.php">Donation</a></li>
            </ul>
        </nav>
        <main>
            <section>
                <h2>Media Management</h2>
                <div class="create">
                    <div class="create-logo">
                        <div class="logo-circle">
                            <span class="plus">
                                <a href="MediaCreate.php">+</a>
                            </span>
                        </div>
                    </div>
                    <h3>Create New Media</h3>
                </div>
                <div class="table-container">
                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th>Media ID</th>
                                <th>Media Name</th>
                                <th>Media Link</th>
                                <th>Media Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $showsocialmedia = "SELECT * FROM socialmediatable";
                            $socialmediaquery = mysqli_query($dbconnect, $showsocialmedia);
                            $rowcount = mysqli_num_rows($socialmediaquery);
                            if ($rowcount > 0) {
                                for ($i = 0; $i < $rowcount; $i++) {
                                    //code
                                    $socailmediaarray = mysqli_fetch_array($socialmediaquery);
                                    $mid = $socailmediaarray['MediaID'];
                                    $mname = $socailmediaarray['MediaName'];
                                    $mlink = $socailmediaarray['MediaLink'];
                                    $mphoto = $socailmediaarray['MediaPhoto'];
                                    echo "<tr>";
                                    echo "<td><p>$mid</p></td>";
                                    echo "<td><p>$mname</p></td>";
                                    echo "<td><p>$mlink</p></td>";
                                    echo "<td><img src='$mphoto' alt='Media' width='70px' height='70px'></td>";
                                    echo "<td>
                            <a href='MediaUpdate.php?mid=$mid'>Update</a>
                            <a href='MediaDelete.php?mid=$mid'>Delete</a>
                                </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr>";
                                echo "<td colspan='5'><p>No data available</p></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="social-media-apps">
                    <div class="app-card">
                        <div class="app-icon facebook">
                            <span class="icon-letter">f</span>
                        </div>
                        <h3>Facebook</h3>
                        <p>Connect and share with friends</p>
                    </div>
                    <div class="app-card">
                        <div class="app-icon instagram">
                            <span class="icon-letter">Ig</span>
                        </div>
                        <h3>Instagram</h3>
                        <p>Share your moments visually</p>
                    </div>
                    <div class="app-card">
                        <div class="app-icon twitter">
                            <span class="icon-letter">X</span>
                        </div>
                        <h3>Twitter</h3>
                        <p>Express yourself in 280 characters</p>
                    </div>
                    <div class="app-card">
                        <div class="app-icon linkedin">
                            <span class="icon-letter">in</span>
                        </div>
                        <h3>LinkedIn</h3>
                        <p>Build your professional network</p>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <script src="script.js"></script>
</body>

</html>