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
    <title>Customer - Customer Dashboard</title>
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
                <li><a href="Technique.php">Security Techniques</a></li>
                <li><a href="Member.php" class="active">Member</a></li>
                <li><a href="Donation.php">Donation</a></li>
            </ul>
        </nav>
        <main>
            <section>
                <h2>User Data Show Form</Form>
                </h2>
                <div class="table-container">
                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th>MemberID</th>
                                <th>FirstName</th>
                                <th>SurName</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Phone</th>
                                <th>signupDate</th>
                                <th>loginDate</th>
                                <th>Comment</th>
                                <th>DateofBirth</th>
                                <th>Gender</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $showuser = "SELECT * FROM membertable";
                            $userquery = mysqli_query($dbconnect, $showuser);
                            $rowcount = mysqli_num_rows($userquery);
                            if ($rowcount > 0) {
                                for ($i = 0; $i < $rowcount; $i++) {
                                    //code
                                    $array = mysqli_fetch_array($userquery);
                                    $id = $array['MemberID'];
                                    $fname = $array['firstname'];
                                    $sname = $array['Surname'];
                                    $email = $array['MemberEmail'];
                                    $pass = $array['MemberPassword'];
                                    $phone = $array['PhoneNo'];
                                    $signup = $array['MembersignupDate'];
                                    $login = $array['MemberloginDate'];
                                    $comm = $array['Comment'];
                                    $dob = $array['DateofBirth'];
                                    $gender = $array['Gender'];
                                    echo "<tr>";
                                    echo "<td><p>$id</p></td>";
                                    echo "<td><p>$fname</p></td>";
                                    echo "<td><p>$sname</p></td>";
                                    echo "<td><p>$email</p></td>";
                                    echo "<td><p>$pass</p></td>";
                                    echo "<td><p>$phone</p></td>";
                                    echo "<td><p>$signup</p></td>";
                                    echo "<td><p>$login</p></td>";
                                    echo "<td><p>$comm</p></td>";
                                    echo "<td><p>$dob</p></td>";
                                    echo "<td><p>$gender</p></td>";
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
            </section>
        </main>
    </div>
    <script src="script.js"></script>
</body>

</html>