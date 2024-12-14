<?php
include('DBConnect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Campaign Hub</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="UserStyles.css?i=<?php echo time(); ?>">

</head>

<body>
    <!---Nav Bar---->
    <?php include('MemberNav.php') ?>
    <div class="full-page-slider">
        <div class="slide active">
            <div class="slide-overlay"></div>
            <img src="../Image/communication-social-media1.png" alt="Social Media Campaign 1" class="slide-image">
            <div class="slide-content">
                <h2 class="slide-title">Boost Your Social Presence</h2>
                <p class="slide-description">Create engaging campaigns that resonate with your audience</p>
                <a href="#trending" class="button">Explore Campaigns</a>
            </div>
        </div>
        <div class="slide">
            <div class="slide-overlay"></div>
            <img src="../Image/communication-social-media2.jpg" alt="Social Media Campaign 2" class="slide-image">
            <div class="slide-content">
                <h2 class="slide-title">Connect with Your Followers</h2>
                <p class="slide-description">Build lasting relationships with your community</p>
                <a href="#platforms" class="button">Discover Platforms</a>
            </div>
        </div>
        <div class="slide">
            <div class="slide-overlay"></div>
            <img src="../Image/communication-social-media3.jpg" alt="Social Media Campaign 3" class="slide-image">
            <div class="slide-content">
                <h2 class="slide-title">Stay Safe Online</h2>
                <p class="slide-description">Learn best practices for a secure social media experience</p>
                <a href="#safety" class="button">Get Safety Tips</a>
            </div>
        </div>
        <div class="slider-nav"></div>
    </div>

    <main id="main" class="container">
        <aside>
            <h2>The Teen Brain and Social Media</h2>
            <p>
            Teen brains are wired for exploration, social connection, and learning—making social media a powerful tool. However, 
            it’s important to understand the effects these platforms can have on emotional well-being and self-esteem. Constant exposure to curated content, online interactions, 
            and instant gratification can impact a teenager’s developing brain, sometimes leading to anxiety, stress, or even addictive behaviors. 
            </p>
            <h2>Quick Links</h2>
            <ul>
                <li><a href="#trending">Trending Campaigns</a></li>
                <li><a href="#platforms">Popular Platforms</a></li>
                <li><a href="#safety">Online Safety</a></li>
                <li><a href="#stats">Campaign Stats</a></li>
                <li><a href="#testimonials">Success Stories</a></li>
            </ul>
            <h2>Recent Posts</h2>
            <ul>
                <li><a href="#">Top 10 Social Media Trends</a></li>
                <li><a href="#">How to Grow Your Following</a></li>
                <li><a href="#">Mastering Content Creation</a></li>
                <li><a href="#">Effective Hashtag Strategies</a></li>
                <li><a href="#">Engaging with Your Audience</a></li>
            </ul>
            <h2>Resources</h2>
            <ul>
                <li><a href="#">Social Media Calendar Template</a></li>
                <li><a href="#">Content Ideas Generator</a></li>
                <li><a href="#">Analytics Dashboard</a></li>
                <li><a href="#">Influencer Collaboration Guide</a></li>
                <div id="google_translate_element"></div>
                <script>
                    function googleTranslateElementInit() {
                        new google.translate.TranslateElement({
                            pageLanguage: 'en'
                        }, 'google_translate_element');
                    }
                </script>
                <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
                </script>
            </ul>
        </aside>
        <div class="content">
            <section id="search" class="content-section">
                <h2>Find Safety Information</h2>
                <div>
                    <form class="search-container" action="index.php" method="post">
                        <input type="text" class="search-input" name="txtsearch" placeholder="Enter campaign name or media name...">
                        <button class="search-button" type="submit" name="btnsubmit">Search</button>
                    </form>
                </div>
                <p>Access our comprehensive database for the latest safety techniques and information on popular social media platforms.</p>
            </section>
            <?php
            if (isset($_POST['btnsubmit'])) {
                $searchData = "%" . $_POST['txtsearch'] . "%";

                // Search for campaign names
                $searchquery_campaign = "SELECT * FROM campaigntable WHERE CampaignName LIKE ?";
                $stmt_campaign = mysqli_prepare($dbconnect, $searchquery_campaign);
                mysqli_stmt_bind_param($stmt_campaign, "s", $searchData);
                mysqli_stmt_execute($stmt_campaign);
                $result_campaign = mysqli_stmt_get_result($stmt_campaign);
                $count_campaign = mysqli_num_rows($result_campaign);

                // Search for media names
                $searchquery_media = "SELECT * FROM socialmediatable WHERE MediaName LIKE ?";
                $stmt_media = mysqli_prepare($dbconnect, $searchquery_media);
                mysqli_stmt_bind_param($stmt_media, "s", $searchData);
                mysqli_stmt_execute($stmt_media);
                $result_media = mysqli_stmt_get_result($stmt_media);
                $count_media = mysqli_num_rows($result_media);

                if ($count_campaign > 0 || $count_media > 0) {
                    // Display search results
                    if ($count_campaign > 0) {
                        echo "<h2>Campaigns</h2>";
                        while ($campaignArray = mysqli_fetch_array($result_campaign)) {
                            $cname = $campaignArray['CampaignName'];
                            $cvis = $campaignArray['CampaignVision'];
            ?>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><?php echo $cname; ?></h3>
                                </div>
                                <div class="card-content">
                                    <p><?php echo $cvis; ?></p>
                                </div>
                                <div class="card-footer">
                                    <?php displayParticipateButton($campaignArray['CampaignID']); ?>
                                </div>
                            </div>
                        <?php
                        }
                    }

                    if ($count_media > 0) {
                        echo "<h2>Media</h2>";
                        while ($mediaArray = mysqli_fetch_array($result_media)) {
                            $mname = $mediaArray['MediaName'];
                            $mlink = $mediaArray['MediaLink'];
                            $mphoto = $mediaArray['MediaPhoto'];
                        ?>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><?php echo $mname; ?></h3>
                                </div>
                                <div class="card-content">
                                    <?php echo "<img src='$mphoto' alt='Media'>"; ?>
                                </div>
                                <div class="card-footer">
                                    <?php displayLearnMoreButton($mediaArray['MediaID']); ?>
                                </div>
                            </div>
            <?php
                        }
                    }
                } else {
                    echo "<p>No results found for '$searchData'.</p>";
                }
            }
            ?>

            <section id="trending">
                <h2 class="section-title">Trending Campaigns</h2>
                <div class="card-grid">
                    <?php
                    $showcampaign = "SELECT * FROM campaigntable limit 2";
                    $campaignquery = mysqli_query($dbconnect, $showcampaign);
                    $rowcount = mysqli_num_rows($campaignquery);
                    if ($rowcount > 0) {
                        for ($i = 0; $i < $rowcount; $i++) {
                            $campaignarray = mysqli_fetch_array($campaignquery);
                            $cname = $campaignarray['CampaignName'];
                            $cvis = $campaignarray['CampaignVision'];
                    ?>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><?php echo $cname; ?></h3>
                                </div>
                                <div class="card-content">
                                    <p><?php echo $cvis; ?></p>
                                </div>
                                <div class="card-footer">
                                    <?php displayParticipateButton($campaignarray['CampaignID']); ?>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </section>
            <section id="platforms">
                <h2 class="section-title">Popular Social Media Platforms</h2>
                <div class="card-grid">
                    <?php
                    $showsocialmedia = "SELECT * FROM socialmediatable limit 2";
                    $socialmediaquery = mysqli_query($dbconnect, $showsocialmedia);
                    $rowcount = mysqli_num_rows($socialmediaquery);
                    if ($rowcount > 0) {
                        for ($i = 0; $i < $rowcount; $i++) {
                            $socailmediaarray = mysqli_fetch_array($socialmediaquery);

                            $mname = $socailmediaarray['MediaName'];
                            $mlink = $socailmediaarray['MediaLink'];
                            $mphoto = $socailmediaarray['MediaPhoto'];
                    ?>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><?php echo $mname; ?></h3>
                                </div>
                                <div class="card-content">
                                    <?php echo "<img src='$mphoto' alt='Media'>"; ?>
                                </div>
                                <div class="card-footer">
                                    <?php displayLearnMoreButton($socailmediaarray['MediaID']); ?>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>
            </section>

            <?php

            function displayParticipateButton($campaignId)
            {
                if (isLoggedIn()) {
                    echo '<a href="CampaignOverview.php?cid=' . $campaignId . '" class="button">Participate</a>';
                } else {
                    echo '<a href="index.php" class="button">Login to Participate</a>';
                }
            }

            function displayLearnMoreButton($mediaId)
            {
                if (isLoggedIn()) {
                    echo '<a href="SocialMedia.php?mid=' . $mediaId . '" class="button">Learn More</a>';
                } else {
                    echo '<a href="index.php" class="button">Login to Learn More</a>';
                }
            }

            function isLoggedIn()
            {

                return isset($_SESSION['MemberID']);
            }
            ?>

            <section id="stats">
                <h2 class="section-title">Campaign Statistics</h2>
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-number">1M+</div>
                        <div class="stat-label">Participants</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Successful Campaigns</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">50M+</div>
                        <div class="stat-label">Engagements</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">100+</div>
                        <div class="stat-label">Brand Partnerships</div>
                    </div>
                </div>
            </section>

            <section id="testimonials">
                <h2 class="section-title">Success Stories</h2>
                <div class="testimonial-grid">
                    <div class="testimonial-item">
                        <p class="testimonial-content">"The Social Media Hub helped me grow my Instagram following from 1,000 to 100,000 in just six months. Their strategies are game-changing!"</p>
                        <p class="testimonial-author">- Sarah J., Fashion Influencer</p>
                    </div>
                    <div class="testimonial-item">
                        <p class="testimonial-content">"Thanks to the campaign tools provided by Social Media Hub, our non-profit organization reached millions of people and raised awareness for our cause."</p>
                        <p class="testimonial-author">- Mark T., NGO Director</p>
                    </div>
                </div>
            </section>

            <section id="youtube-video">
                <h2 class="section-title">Watch Our Video</h2>
                <div class="video-container">
                <iframe  src="https://www.youtube.com/embed/nVEyG3C-Mqw?si=7DSyxwXAmGj1oavT" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </section>

            <section id="safety">
                <h2 class="section-title">How to Stay Safe Online</h2>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Do's and Don'ts of Online Safety</h3>
                    </div>
                    <div class="card-content">
                        <h4>Do:</h4>
                        <ul class="safety-list">
                            <li class="safety-item">Use strong, unique passwords for each account</li>
                            <li class="safety-item">Enable two-factor authentication when available</li>
                            <li class="safety-item">Be cautious about what personal information you share online</li>
                            <li class="safety-item">Keep your social media profiles private</li>
                            <li class="safety-item">Think twice before clicking on links or downloading attachments</li>
                        </ul>
                        <h4>Don't:</h4>
                        <ul class="safety-list">
                            <li class="safety-item dont">Accept friend requests from strangers</li>
                            <li class="safety-item dont">Share your location publicly</li>
                            <li class="safety-item dont">Post sensitive personal information (e.g., phone number, address)</li>
                            <li class="safety-item dont">Engage in or encourage cyberbullying</li>
                            <li class="safety-item dont">Use public Wi-Fi for sensitive transactions</li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <div class="letter-container" id="newsletterPopup">
        <div class="letter-card">
            <div class="letter-image-container">
                <img src="../image/newletter.jpg" alt="Image" class="image">
            </div>
            <div class="form-container">
                <form id="newsletterForm">
                    <h2>Receive the latest news</h2>
                    <h3>Gamification Marketing Newsletter</h3>
                    <p>Case Studies, Examples and Guides</p>
                    <input type="email" id="emailInput" placeholder="Email Address" required>
                    <button id="subscribeButton">SUBSCRIBE</button>
                </form>
            </div>
            <div class="close-button" id="closePopup">X</div>
        </div>
    </div>
    <div class="overlay" id="overlay"></div>
    <!---Footer Bar---->
    <?php include('MemberFooter.php') ?>
    <script>
        // JavaScript for newsletter popup
        const popup = document.getElementById('newsletterPopup');
        const overlay = document.getElementById('overlay');
        const closePopup = document.getElementById('closePopup');
        const emailInput = document.getElementById('emailInput');
        const subscribeButton = document.getElementById('subscribeButton');
        const newsletterForm = document.getElementById('newsletterForm');

        setTimeout(() => {
            console.log('Popup should be displayed');
            popup.style.display = 'block';
            overlay.style.display = 'block';
        }, 8000);

        closePopup.addEventListener('click', () => {
            popup.style.display = 'none';
            overlay.style.display = 'none';
        });

        newsletterForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const email = emailInput.value;
            if (email) {
                alert(`Thank you for subscribing, ${email}!`);
                popup.style.display = 'none';
                overlay.style.display = 'none';
            } else {
                alert('Please enter a valid email address.');
            }
        });
    </script>
    <script src="script.js"></script>
</body>

</html>