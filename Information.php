<?php
include('DBConnect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information Page</title>
    <link rel="stylesheet" href="UserStyles.css?i=<?php echo time(); ?>">
    <script src="script.js"></script>
</head>

<body>
    <!---Nav Bar---->
    <?php include('MemberNav.php') ?>
    <main class="information-container">
        <section class="hero">
            <div class="hero-content">
                <h2>Empowering Safe Social Media Use</h2>
                <p>Join our mission to create a safer online environment for everyone</p>
            </div>
        </section>

        <section class="information-section">
            <h2>Current Campaigns</h2>
            <div class="campaigns-grid">
                <?php
                $showcampaign = "SELECT * FROM campaigntable";
                $campaignquery = mysqli_query($dbconnect, $showcampaign);
                $rowcount = mysqli_num_rows($campaignquery);
                if ($rowcount > 0) {
                    for ($i = 0; $i < $rowcount; $i++) {
                        $campaignarray = mysqli_fetch_array($campaignquery);
                        $cname = $campaignarray['CampaignName'];
                        $cvis = $campaignarray['CampaignVision'];
                        $cphoto1 = $campaignarray['CampaginPhoto1'];

                ?>
                        <div class="campaign-card">
                            <?php echo "<img src='$cphoto1' alt='Campaign Image' class='campaign-image'>"; ?>
                            <div class="campaign-content">
                                <h3><?php echo $cname; ?></h3>
                                <p><?php echo $cvis; ?></p>
                            </div>
                            <a href="CampaignOverview.php?cid=<?php echo $campaignarray['CampaignID']; ?>" class="campaign-button">Learn More</a>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </section>

        <section class="information-section">
            <h2>Our Impact</h2>
            <div class="stats">
                <div class="stat-item">
                    <div class="stat-number">1M+</div>
                    <div class="stat-label">People Reached</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Schools Partnered</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">50K+</div>
                    <div class="stat-label">Volunteers</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">20+</div>
                    <div class="stat-label">Countries Impacted</div>
                </div>
            </div>
        </section>

        <section class="information-section">
            <h2>Why Our Campaigns Matter</h2>
            <p>In today's digital age, social media has become an integral part of our lives. While it offers numerous benefits, it also presents challenges, especially for young users. Our campaigns are designed to address these challenges head-on, providing education, resources, and support to ensure a safer online experience for all.</p>
            <p>By focusing on key areas such as cyberbullying prevention, digital privacy, responsible sharing, and screen time management, we aim to empower users with the knowledge and tools they need to navigate the digital world confidently and safely.</p>
        </section>

        <section class="information-section">
            <h2>Get Involved</h2>
            <p>There are many ways you can support our mission:</p>
            <ul class="safety-list">
                <li class="safety-item">Volunteer for our campaigns</li>
                <li class="safety-item">Spread awareness on your own social media</li>
                <li class="safety-item">Attend our workshops and webinars</li>
                <li class="safety-item">Partner with us as an organization</li>
                <li class="safety-item">Donate to support our initiatives</li>
            </ul>
            <p>Together, we can create a safer and more positive social media environment for everyone.</p>
        </section>

        <section class="testimonial">
            <h2>What People Say About Our Campaigns</h2>
            <div class="testimonial-content">
                "The cyberbullying prevention campaign has made a significant impact in our school. We've seen a noticeable decrease in online conflicts and an increase in students supporting each other."
            </div>
            <div class="testimonial-author">- Sarah Johnson, High School Principal</div>
        </section>

        <section class="information-section">
            <h2>Upcoming Events</h2>
            <ul class="safety-list">
                <li class="safety-item">Digital Safety Workshop - June 15, 2025</li>
                <li class="safety-item">Social Media Awareness Week - July 10-16, 2025</li>
                <li class="safety-item">Parent-Teacher Conference on Online Safety - August 5, 2025</li>
                <li class="safety-item">Youth Digital Leaders Summit - September 20, 2025</li>
            </ul>
        </section>
    </main>
    <!---Footer Bar---->
    <?php include('MemberFooter.php') ?>
</body>

</html>