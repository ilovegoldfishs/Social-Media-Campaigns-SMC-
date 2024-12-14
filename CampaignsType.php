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
    <title>Select Campaign Type - Social Media Dashboard</title>
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
                <li><a href="CampaignsType.php" class="active">Campaigns Type</a></li>
                <li><a href="Media.php">Media</a></li>
                <li><a href="Technique.php">Security Techniques</a></li>
                <li><a href="Member.php">Member</a></li>
                <li><a href="Donation.php">Donation</a></li>
            </ul>
        </nav>
        <main>
            <section>
                <h2>Campaign Type Management</h2>
                <div class="create">
                    <div class="create-logo">
                        <div class="logo-circle">
                            <span class="plus">
                                <a href="CampaignsTypeCreate.php">+</a>
                            </span>
                        </div>
                    </div>
                    <h3>Create New CampaignsType</h3>
                </div>
                <div class="table-container">
                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th>CampaignsType ID</th>
                                <th>CampaignsType Name</th>
                                <th>CampaignsType Objective</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $showcamtype = "SELECT * FROM campaigntypetble";
                            $camtypequery = mysqli_query($dbconnect, $showcamtype);
                            $rowcount = mysqli_num_rows($camtypequery);
                            if ($rowcount > 0) {
                                for ($i = 0; $i < $rowcount; $i++) {
                                    //code
                                    $camtypearray = mysqli_fetch_array($camtypequery);
                                    $cid = $camtypearray['CamTypeID'];
                                    $cname = $camtypearray['CamTypeName'];
                                    $cobj = $camtypearray['CamTypeObj'];

                                    echo "<tr>";
                                    echo "<td><p>$cid</p></td>";
                                    echo "<td><p>$cname</p></td>";
                                    echo "<td><p>$cobj</p></td>";

                                    echo "<td>
                            <a href='CampaignsTypeUpdate.php?ctid=$cid'>Update</a>
                            <a href='CampaignsTypeDelete.php?ctid=$cid'>Delete</a>
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
                <form class="campaign-type-form">
                    <div class="form-group">
                        <label>Campaign Type</label>
                        <div class="campaign-type-options">
                            <label class="campaign-type-option">

                                <span class="option-content">
                                    <span class="option-icon">🎯</span>
                                    <span class="option-title">Brand Awareness</span>
                                    <span class="option-description">Increase visibility and recognition of your brand</span>
                                </span>
                            </label>
                            <label class="campaign-type-option">

                                <span class="option-content">
                                    <span class="option-icon">💬</span>
                                    <span class="option-title">Engagement</span>
                                    <span class="option-description">Boost interactions with your audience</span>
                                </span>
                            </label>
                            <label class="campaign-type-option">

                                <span class="option-content">
                                    <span class="option-icon">🚀</span>
                                    <span class="option-title">Website Traffic</span>
                                    <span class="option-description">Drive more visitors to your website</span>
                                </span>
                            </label>
                            <label class="campaign-type-option">

                                <span class="option-content">
                                    <span class="option-icon">💰</span>
                                    <span class="option-title">Conversion</span>
                                    <span class="option-description">Encourage specific actions like purchases or sign-ups</span>
                                </span>
                            </label>
                        </div>
                    </div>
                </form>
            </section>
        </main>
    </div>
    <script src="script.js"></script>
</body>

</html>