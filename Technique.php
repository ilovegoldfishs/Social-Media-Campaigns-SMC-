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
    <title>Security Techniques - Social Media Dashboard</title>
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
                <li><a href="Media.php">Media</a></li>
                <li><a href="Technique.php" class="active">Security Techniques</a></li>
                <li><a href="Member.php">Member</a></li>
                <li><a href="Donation.php">Donation</a></li>
            </ul>
        </nav>
        <main>
            <section>
                <h2>Security Techniques</h2>
                <div class="create">
                    <div class="create-logo">
                        <div class="logo-circle">
                            <span class="plus">
                                <a href="TechniqueCreate.php">+</a>
                            </span>
                        </div>
                    </div>
                    <h3>Create New Technique</h3>
                </div>
                <div class="table-container">
                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th>Technique ID</th>
                                <th>Technique Name</th>
                                <th>Technique Description</th>
                                <th>Technique Feature</th>
                                <th>Media Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $showtechnique = "SELECT * FROM techniquetable";
                            $techniquequery = mysqli_query($dbconnect, $showtechnique);
                            $rowcount = mysqli_num_rows($techniquequery);
                            if ($rowcount > 0) {
                                for ($i = 0; $i < $rowcount; $i++) {
                                    //code
                                    $techniqueaarray = mysqli_fetch_array($techniquequery);
                                    $tid = $techniqueaarray['TechniqueID'];
                                    $tname = $techniqueaarray['TechniqueName'];
                                    $tdesc = $techniqueaarray['Description'];
                                    $tfea = $techniqueaarray['Feature'];
                                    $tmid = $techniqueaarray['mediaID'];
                                    $media = "select * from socialmediatable where MediaID=$tmid";
                                    $mediacon = mysqli_query($dbconnect, $media);
                                    $mediaarr = mysqli_fetch_array($mediacon);
                                    $medianame = $mediaarr['MediaName'];

                                    echo "<tr>";
                                    echo "<td><p>$tid</p></td>";
                                    echo "<td><p>$tname</p></td>";
                                    echo "<td><p>$tdesc</p></td>";
                                    echo "<td><p>$tfea</p></td>";
                                    echo "<td><p>$medianame</p></td>";
                                    echo "<td>
                            <a href='TechniqueUpdate.php?tid=$tid'>Update</a>
                            <a href='TechniqueDelete.php?tid=$tid'>Delete</a>
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
                <div class="technique-list">

                    <div class="technique-card">
                        <h3>Two-Factor Authentication (2FA)</h3>
                        <p>Enhance account security by requiring two different forms of identification before granting access.</p>
                        <ul>
                            <li>SMS-based codes</li>
                            <li>Authenticator apps</li>
                            <li>Hardware tokens</li>
                        </ul>
                        <button class="btn btn-primary"><a href="https://www.microsoft.com/en-ie/security/business/security-101/what-is-two-factor-authentication-2fa">Enable 2FA</a></button>
                    </div>

                    <div class="technique-card">
                        <h3>One-Time Password (OTP)</h3>
                        <p>Use automatically generated, single-use passwords for secure, temporary access.</p>
                        <ul>
                            <li>Time-based OTP (TOTP)</li>
                            <li>HMAC-based OTP (HOTP)</li>
                            <li>Email or SMS delivery</li>
                        </ul>
                        <button class="btn btn-primary"><a href="https://en.wikipedia.org/wiki/One-time_password">Configure OTP</a></button>
                    </div>
                    <div class="technique-card">
                        <h3>Biometric Authentication</h3>
                        <p>Utilize unique physical characteristics for user identification and access control.</p>
                        <ul>
                            <li>Fingerprint scanning</li>
                            <li>Facial recognition</li>
                            <li>Voice recognition</li>
                        </ul>
                        <button class="btn btn-primary"><a href="https://www.innovatrics.com/glossary/biometric-authentication/#:~:text=Biometric%20authentication%20is%20a%20technology,%2C%20DNA%2C%20and%20retinal%20scans.">Set Up Biometrics</a></button>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <script src="script.js"></script>
</body>

</html>