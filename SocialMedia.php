<?php
include('DBConnect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Safety: Stay Informed, Stay Protected</title>
    <link rel="stylesheet" href="UserStyles.css?i=<?php echo time(); ?>">
    <script src="script.js"></script>
</head>

<body>
    <!---Nav Bar---->
    <?php include('MemberNav.php') ?>
    <div class="media-container">

        <section id="search" class="content-section">
            <h2>Find Safety Information</h2>
            <div>
                <form class="search-container" action="SocialMedia.php" method="post">
                    <input type="text" class="search-input" name="txtsearch" placeholder="Enter app name or safety concern..." aria-label="Search for safety information">
                    <button class="search-button" type="submit" name="btnsubmit">Search</button>
                </form>
            </div>
            <p>Access our comprehensive database for the latest safety techniques and information on popular social media platforms.</p>
        </section>

        <section id="popular-apps" class="content-section">
            <h2>Popular Social Media Apps</h2>
            <div class="table-container">
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>Media Name</th>
                            <th>Media Link</th>
                            <th>Media Photo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['btnsubmit'])) {
                            $searchData = "%" . $_POST['txtsearch'] . "%";

                            // Before search: validate user input
                            if (empty($searchData)) {
                                echo "<tr>";
                                echo "<td colspan='3'><p>Please enter a search query.</p></td>";
                                echo "</tr>";
                            } else {
                                // Search functionality
                                $searchquery = "SELECT * FROM socialmediatable WHERE MediaName LIKE ?";
                                $stmt = mysqli_prepare($dbconnect, $searchquery);
                                mysqli_stmt_bind_param($stmt, "s", $searchData);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                                $count1 = mysqli_num_rows($result);

                                if ($count1 > 0) {
                                    // After search: display results
                                    while ($mediaArray = mysqli_fetch_array($result)) {
                                        $mid = $mediaArray['MediaID'];
                                        $mname = $mediaArray['MediaName'];
                                        $mlink = $mediaArray['MediaLink'];
                                        $mphoto = $mediaArray['MediaPhoto'];
                                        echo "<tr>";
                                        echo "<td><p>$mname</p></td>";
                                        echo "<td><p>$mlink</p></td>";
                                        echo "<td><img src='$mphoto' alt='Media'></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    // After search: no results found
                                    echo "<tr>";
                                    echo "<td colspan='3'><p>No results found for '$searchData'.</p></td>";
                                    echo "</tr>";
                                }
                            }
                        } else {
                            // Before search: display all data
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
                                    echo "<td><p>$mname</p></td>";
                                    echo "<td><p>$mlink</p></td>";
                                    echo "<td><img src='$mphoto' alt='Media'></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr>";
                                echo "<td colspan='3'><p>No data available</p></td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="popular-apps" class="content-section">
            <h2>Popular Security techniques</h2>
            <div class="table-container">
                <table class="responsive-table">
                    <thead>
                        <tr>
                                
                                <th>Technique Name</th>
                                <th>Technique Description</th>
                                <th>Technique Feature</th>
                                <th>Media Name</th>
                                
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
                                    echo "<td><p>$tname</p></td>";
                                    echo "<td><p>$tdesc</p></td>";
                                    echo "<td><p>$tfea</p></td>";
                                    echo "<td><p>$medianame</p></td>";
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

        <section id="popular-apps" class="content-section">
            <h2>Let More Learn About</h2>
            <div class="app-grid">
                <div class="app-item">
                    <img src="../image/66fd72ceb43db_facebook.png" alt="Facebook Icon" class="app-icon">
                    <a href="Facebook-Content.html"><h3>Facebook</h3></a>
                </div>
                <div class="app-item">
                    <img src="../image/66fe0632d5ae6_instagram.png" alt="Instagram Icon" class="app-icon">
                    <a href="Instragram-Content.html"><h3>Instagram</h3></a>
                </div>
                <div class="app-item">
                    <img src="../image/66fd722c405c9_twitter.png" alt="Twitter Icon" class="app-icon">
                    <h3>Twitter</h3>
                </div>
                <div class="app-item">
                    <img src="../image/66fd735c9b759_snapchat.png" alt="Snapchat Icon" class="app-icon">
                    <a href="Snapchat-Content.html"><h3>Snapchat</h3></a>
                </div>
                <div class="app-item">
                    <img src="../image/66fd735338aea_whatsapp.png" alt="WhatsApp Icon" class="app-icon">
                    <a href="WhatsApp-Content.html"><h3>WhatsApp</h3></a>
                </div>
            </div>
        </section>

        <section id="safety-tips" class="content-section">
            <h2>Essential Safety Tips</h2>
            <div class="featured-tip">
                <h3>Two-Factor Authentication</h3>
                <p>Enable two-factor authentication on all your social media accounts for an extra layer of security. This feature requires a second form of verification, such as a code sent to your phone, in addition to your password.</p>
            </div>
            <div class="featured-tip">
                <h3>Privacy Settings Check</h3>
                <p>Regularly review and update your privacy settings on all social media platforms. Ensure that your personal information is only visible to your intended audience.</p>
            </div>
            <div class="featured-tip">
                <h3>Be Cautious with Links</h3>
                <p>Avoid clicking on suspicious links, even if they appear to be from friends. These could be phishing attempts or lead to malware infections.</p>
            </div>
        </section>

        <section id="updates" class="content-section">
            <h2>Recent Safety Updates</h2>
            <ul class="recent-updates">
                <li><strong>Instagram:</strong> New privacy controls for message requests and improved tools for managing unwanted interactions.</li>
                <li><strong>Facebook:</strong> Updated guidelines for content moderation and enhanced fact-checking processes for shared news articles.</li>
                <li><strong>Twitter:</strong> Enhanced blocking features for multiple accounts and improved algorithms to detect and prevent spam.</li>
                <li><strong>TikTok:</strong> Improved parental controls, screen time management features, and content filtering options for younger users.</li>
                <li><strong>Snapchat:</strong> New safety features including real-time location sharing controls and improved reporting mechanisms.</li>
            </ul>
        </section>

        <section class="content-section">
            <h2>The Impact of Social Media</h2>
            <div class="image-container">
                <img src="../image/social-media-1.jpg" alt="Social media impact illustration">
            </div>
            <p>Social media has revolutionized the way we communicate, share information, and connect with others. While it offers numerous benefits, it also presents challenges in terms of privacy, security, and mental health. Understanding both the positive and negative impacts of social media is crucial for safe and responsible usage.</p>
        </section>

        <section id="statistics" class="content-section">
            <h2>Social Media Usage Statistics</h2>
            <div class="stat-grid">
                <div class="stat-item">
                    <div class="stat-number">4.48B</div>
                    <p>Active social media users worldwide</p>
                </div>
                <div class="stat-item">
                    <div class="stat-number">2h 27m</div>
                    <p>Average daily time spent on social media per user</p>
                </div>
                <div class="stat-item">
                    <div class="stat-number">8.8</div>
                    <p>Average number of social media accounts per user</p>
                </div>
                <div class="stat-item">
                    <div class="stat-number">50%</div>
                    <p>Of the global population uses social media</p>
                </div>
            </div>
        </section>

        <section class="cta-section">
            <h2>Take Control of Your Online Safety</h2>
            <p>Stay informed, protect your privacy, and enjoy a safer social media experience.</p>
            <a href="#" class="cta-button">Learn More About Social Media Safety</a>
        </section>

        <section class="content-section">
            <h2>Stay Informed, Stay Safe</h2>
            <div class="image-container">
                <img src="../image/social-media-3.png" alt="Social Media Safety Illustration">
            </div>
            <p>Social media platforms are constantly evolving, and so are the techniques to stay safe online. Regularly check our database for the latest safety tips and updates. Remember, being informed is your best defense against online threats.</p>
            <p>By staying vigilant and following best practices, you can enjoy the benefits of social media while minimizing risks. Educate yourself and others about online safety to create a more secure digital environment for everyone.</p>
        </section>
    </div>
    <!---Footer Bar---->
    <?php include('MemberFooter.php') ?>
</body>

</html>