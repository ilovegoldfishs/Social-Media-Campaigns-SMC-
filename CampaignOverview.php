<?php
include('DBConnect.php');

// Sanitize the cid input
if (isset($_GET['cid'])) {
    $cid = mysqli_real_escape_string($dbconnect, $_GET['cid']);
} else {
    $cid = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campaign Overview</title>
    <link rel="stylesheet" href="UserStyles.css?i=<?php echo time(); ?>">
    <script src="script.js"></script>
</head>

<body>
    <div class="overview-container">
        <a href="Information.php" class="back-button">&larr; Back to Campaigns</a>

        <header class="campaign-header">
            <?php
            $showcampaign = "SELECT * FROM campaigntable where CampaignID='$cid'";
            $campaignquery = mysqli_query($dbconnect, $showcampaign);
            $rowcount = mysqli_num_rows($campaignquery);
            if ($rowcount > 0) {
                for ($i = 0; $i < $rowcount; $i++) {
                    $campaignarray = mysqli_fetch_array($campaignquery);
                    $cidd = $campaignarray['CampaignID'];
                    $cname = $campaignarray['CampaignName'];
                    $caim = $campaignarray['CampaignAim'];
            ?>
                    <h1 class="campaign-title"><?php echo $cname; ?></h1>
                    <p class="campaign-description"><?php echo $caim; ?></p>

            <?php
                }
            }
            // Send the cid to the Join page
            echo "<a href='Join.php?cid=$cidd' class='join-button'>Join the Campaign</a>";
            ?>
            <div id="countdown"></div>
            <script>
                // Countdown timer
                const countdownElement = document.getElementById('countdown');
                const targetDate = new Date();
                targetDate.setDate(targetDate.getDate() + 30); // Set target date to 30 days from now

                function updateCountdown() {
                    const now = new Date();
                    const timeLeft = targetDate - now;

                    const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

                    countdownElement.textContent = `Campaign ends in: ${days}d ${hours}h ${minutes}m ${seconds}s`;
                }
                setInterval(updateCountdown, 1000);
                updateCountdown(); // Initial call
            </script>
        </header>


        <div class="card">
            <h2 class="card-title">Campaign Overview</h2>
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-value">10,000+</div>
                    <div class="stat-label">Participants</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">5</div>
                    <div class="stat-label">Weekly Challenges</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">100,000+</div>
                    <div class="stat-label">Feedbacks</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">30</div>
                    <div class="stat-label">Days Duration</div>
                </div>
            </div>
            <div class="progress-bar">
                <div class="progress-bar-fill"></div>
            </div>
        </div>

        <div class="content-grid">
            <div class="card">
                <?php
                $showcampaign = "SELECT * FROM campaigntable where CampaignID='$cid'";
                $campaignquery = mysqli_query($dbconnect, $showcampaign);
                $rowcount = mysqli_num_rows($campaignquery);
                if ($rowcount > 0) {
                    for ($i = 0; $i < $rowcount; $i++) {
                        $campaignarray = mysqli_fetch_array($campaignquery);
                        $cname = $campaignarray['CampaignName'];
                        $cdesc = $campaignarray['CampaignDescription'];
                ?>
                        <h2 class="card-title">Description <?php echo $cname; ?></h2>
                        <p><?php echo $cdesc; ?></p>
                <?php
                    }
                }
                ?>

            </div>

            <div class="card">
                <h2 class="card-title">Weekly Challenges</h2>
                <?php
                $showcampaign = "SELECT * FROM campaigntable where CampaignID='$cid'";
                $campaignquery = mysqli_query($dbconnect, $showcampaign);
                $rowcount = mysqli_num_rows($campaignquery);
                if ($rowcount > 0) {
                    for ($i = 0; $i < $rowcount; $i++) {
                        $campaignarray = mysqli_fetch_array($campaignquery);
                        $cweek1 = $campaignarray['Week1'];
                        $cweek2 = $campaignarray['Week2'];
                        $cweek3 = $campaignarray['Week3'];
                        $cweek4 = $campaignarray['Week4'];
                        $cweek5 = $campaignarray['Week5'];
                ?>
                        <ul>
                            <li>Week 1: <?php echo $cweek1; ?></li>
                            <li>Week 2: <?php echo $cweek2; ?></li>
                            <li>Week 3: <?php echo $cweek3; ?></li>
                            <li>Week 4: <?php echo $cweek4; ?></li>
                            <li>Week 5: <?php echo $cweek5; ?></li>
                        </ul>
                <?php
                    }
                }
                ?>

            </div>
        </div>

        <div class="content-grid">
            <div class="card">
                <h2 class="card-title">How to Participate</h2>
                <?php
                $showcampaign = "SELECT * FROM campaigntable where CampaignID='$cid'";
                $campaignquery = mysqli_query($dbconnect, $showcampaign);
                $rowcount = mysqli_num_rows($campaignquery);
                if ($rowcount > 0) {
                    for ($i = 0; $i < $rowcount; $i++) {
                        $campaignarray = mysqli_fetch_array($campaignquery);
                        $cname = $campaignarray['CampaignName'];
                        $cdesc = $campaignarray['CampaignDescription'];
                ?>
                        <ol>
                            <li>Sign up for the <?php echo $cname; ?></li>
                            <li>Follow our social media accounts for daily tips</li>
                            <li>Complete the weekly challenges</li>
                            <li>Share your progress using <?php echo $cname; ?></li>
                            <li>Engage with other participants in our community forum</li>
                        </ol>
                <?php
                    }
                }
                ?>

            </div>

            <div class="card">
                <h2 class="card-title">Campaign Rewards</h2>
                <?php
                $showcampaign = "SELECT * FROM campaigntable where CampaignID='$cid'";
                $campaignquery = mysqli_query($dbconnect, $showcampaign);
                $rowcount = mysqli_num_rows($campaignquery);
                if ($rowcount > 0) {
                    for ($i = 0; $i < $rowcount; $i++) {
                        $campaignarray = mysqli_fetch_array($campaignquery);
                        $crew1 = $campaignarray['Reward1'];
                        $crew2 = $campaignarray['Reward2'];
                        $crew3 = $campaignarray['Reward3'];
                        $crew4 = $campaignarray['Reward4'];
                        $crew5 = $campaignarray['Reward5'];
                ?>
                        <ul>
                            <li><?php echo $crew1; ?></li>
                            <li><?php echo $crew2; ?></li>
                            <li><?php echo $crew3; ?></li>
                            <li><?php echo $crew4; ?></li>
                            <li><?php echo $crew5; ?></li>
                        </ul>
                <?php
                    }
                }
                ?>

            </div>
        </div>

        <div class="content-grid">
            <div class="card">
                <h2 class="card-title">Campaign Location</h2>
                <?php
                $showcampaign = "SELECT * FROM campaigntable where CampaignID='$cid'";
                $campaignquery = mysqli_query($dbconnect, $showcampaign);
                $rowcount = mysqli_num_rows($campaignquery);
                if ($rowcount > 0) {
                    for ($i = 0; $i < $rowcount; $i++) {
                        $campaignarray = mysqli_fetch_array($campaignquery);
                        $location = $campaignarray['CampaignLocation'];
                ?>
                        <?php echo $location; ?>
                <?php
                    }
                }
                ?>
            </div>

            <div class="card">
                <h2 class="card-title">Campaign Type & Budget & Media Name</h2>
                <?php
                $showcampaign = "SELECT * FROM campaigntable where CampaignID='$cid'";
                $campaignquery = mysqli_query($dbconnect, $showcampaign);
                $rowcount = mysqli_num_rows($campaignquery);
                if ($rowcount > 0) {
                    for ($i = 0; $i < $rowcount; $i++) {
                        $campaignarray = mysqli_fetch_array($campaignquery);
                        $ccamtype = $campaignarray['CamTypeID'];
                        $camtype = "select * from campaigntypetble where CamTypeID=$ccamtype";
                        $camtypecon = mysqli_query($dbconnect, $camtype);
                        $camtypearr = mysqli_fetch_array($camtypecon);
                        $camtypename = $camtypearr['CamTypeName'];
                        $camtypeobj = $camtypearr['CamTypeObj'];
                        $cbudget = $campaignarray['Budget'];
                        $cmedia = $campaignarray['MediaID'];
                        $media = "select * from socialmediatable where MediaID=$cmedia";
                        $mediacon = mysqli_query($dbconnect, $media);
                        $mediaarr = mysqli_fetch_array($mediacon);
                        $medianame = $mediaarr['MediaName'];

                ?>
                        <ul>
                            <li>CampaignType Name: <?php echo $camtypename; ?></li>
                            <li>Objective: <?php echo $camtypeobj; ?></li>
                            <li>Budget: <?php echo $cbudget; ?></li>
                            <li>Media Name: <?php echo $medianame; ?></li>
                        </ul>
                <?php
                    }
                }
                ?>
            </div>
        </div>

        <section class="photo-section card">
            <?php
            $showcampaign = "SELECT * FROM campaigntable where CampaignID='$cid'";
            $campaignquery = mysqli_query($dbconnect, $showcampaign);
            $rowcount = mysqli_num_rows($campaignquery);
            if ($rowcount > 0) {
                for ($i = 0; $i < $rowcount; $i++) {
                    $campaignarray = mysqli_fetch_array($campaignquery);
                    $cname   = $campaignarray['CampaignName'];
                    $cphoto1 = $campaignarray['CampaginPhoto1'];
                    $cphoto2 = $campaignarray['CampaginPhoto2'];
                    $cphoto3 = $campaignarray['CampaginPhoto3'];
                    $cphoto4 = $campaignarray['CampaginPhoto4'];
            ?>
                    <h2 class="card-title"><?php echo $cname; ?> Photos</h2>
                    <div class="photo-grid">

                        <div class="photo-item">
                            <img src="<?php echo htmlspecialchars($cphoto1); ?>"  alt="Campaigns Photo" />
                            <div class="photo-caption">Photo 1</div>
                        </div>
                        <div class="photo-item">
                            <img src="<?php echo htmlspecialchars($cphoto2); ?>"  alt="Campaigns Photo" />
                            <div class="photo-caption">Photo 2</div>
                        </div>
                        <div class="photo-item">
                            <img src="<?php echo htmlspecialchars($cphoto3); ?>"  alt="Campaigns Photo" />
                            <div class="photo-caption">Photo 3</div>
                        </div>
                        <div class="photo-item">
                            <img src="<?php echo htmlspecialchars($cphoto4); ?>"  alt="Campaigns Photo" />
                            <div class="photo-caption">Photo 4</div>
                        </div>
                <?php
                }
            }
                ?>
                    </div>
        </section>
    </div>
</body>

</html>